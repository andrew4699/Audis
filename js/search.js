var searchTimer = -1;
var SEARCH_DELAY = 300;

$(function()
{
	$('#title')
	.on("mouseenter", function()
	{
		$('#choose').show();
	})
	.on("mouseleave", function()
	{
		if(!$('#choose').is(":hover"))
		{
			$('#choose').hide();
		}
	});

	$('#choose')
	.on("click", function(event)
	{
		var target = $(event.target);

		if(target.attr("id") == "choose" || target.is("#choose > h1"))
		{
			$('#choose').addClass("open");
		}
	})
	.on("mouseleave", function()
	{
		if(!$('#choose').hasClass("open"))
		{
			$(this).hide();
		}
	});

	$('#chooseClose').on("click", function()
	{
		$('#choose').removeClass("open").hide();
	});

	$('#search_query').on("keyup", function()
	{
		if(searchTimer != -1)
		{
			clearInterval(searchTimer);
		}

		searchTimer = setInterval(function()
		{
			clearInterval(searchTimer);
			searchTimer = -1;

			if($('#search_query').val())
			{
				performSearch();
			}
		}, SEARCH_DELAY);
	});
});

function performSearch()
{
	$.get
	(
		"https://www.googleapis.com/youtube/v3/search",
		{
			part: "snippet",
			type: "video",
			maxResults: 5,
			key: "AIzaSyAgn2GaULAvfTKUH8MxWTB_b_LlyiaafBA",
			q: $('#search_query').val()
		},
		function(data)
		{
			unbindSearchResults();
			$('#search_results').empty();

			for(var i = 0; i < data.items.length; i++)
			{
				$('#search_results').append("<div data-title='" + data.items[i].snippet.title + "' data-video='" + data.items[i].id.videoId + "'> \
					<img src='" + data.items[i].snippet.thumbnails.medium.url + "'> \
					\
					<div> \
						<h3>" + data.items[i].snippet.title + "</h3> \
						<h4>by " + data.items[i].snippet.channelTitle + "</h4> \
					</div> \
				</div>");
			}

			bindSearchResults();
		}
	);
}

function bindSearchResults()
{
	$('#search_results > div').on("click", function()
	{
		var that = this;
		hideSearch();

		$.post
		(
			"ajax/download.php",
			{video: $(this).data("video")},
			function(response)
			{
				console.log(response);
				var data = JSON.parse(response);

				loadSong($(that).data("title"), "_downloads/" + data.fileName + ".mp3");
			}
		);
	});
}

function unbindSearchResults()
{
	$('#search_results > div').unbind("click");
}

function hideSearch()
{
	$('#loader').show();
	$('#choose').removeClass("open").hide();
	$('#title, #bars').hide();
}