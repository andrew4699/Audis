var BAR_COUNT = 40;
var BAR_MAX_HEIGHT = 500;

var max = 0;

$(function()
{
	initPlayer();
});

function initPlayer()
{
	console.log("---- Settings ---");
		console.log("setBars(int n) => change the number of bars (default = 40, REQUIRES RELOAD)");

	if(document.cookie.indexOf("bars=") > -1)
	{
		BAR_COUNT = parseInt(document.cookie.replace("bars=", ""));
	}

	for(var i = 0; i < BAR_COUNT; i++)
	{
		$('#bars').append("<div id='bar-" + i + "'></div>");
	}

	var ctx = new AudioContext();

	var player = $('#audio')[0];
	var src = ctx.createMediaElementSource(player);

	analyzer = ctx.createAnalyser();
	src.connect(analyzer);
	src.connect(ctx.destination);

	//player.play();
	onDataReceived();
}

function onDataReceived()
{
	var freqData = new Uint8Array(analyzer.frequencyBinCount);

	requestAnimationFrame(onDataReceived);
	analyzer.getByteFrequencyData(freqData);

	var bars = [], idx, newLength = freqData.length * (43/64);

	for(var i = 0; i < freqData.length; i++)
	{
		idx = Math.floor((i / newLength) * BAR_COUNT);

		if(!bars[idx])
			bars[idx] = freqData[i];
		else
			bars[idx] += freqData[i];

		if(bars[idx] > max)
			max = bars[idx];
	}

	for(var i = 0; i < bars.length; i++)
	{
		var propHeight = (bars[i] / max) * BAR_MAX_HEIGHT;

		$('#bar-' + i).height(propHeight);
	}

	//console.log(bars);
	//console.log(freqData);
}

function loadSong(title, src)
{
	$('#loader').hide();
	$('#title').text(title);
	$('#title, #bars').show();

	$('#audio')[0].src = src;
	$('#audio')[0].load();
	$('#audio')[0].play();
}

function setBars(n)
{
	document.cookie = "bars=" + n;
}