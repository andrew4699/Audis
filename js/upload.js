$(function()
{
	$('#upload_song').on("change", function()
	{
		hideSearch();

		$('#upload_form').ajaxForm(
		{
			complete: function(response, status)
			{
				if(status == "success")
				{
					var data = JSON.parse(response.responseText);

					loadSong(data.title, data.path);
				}
				else alert("There was an error uploading your file.");
			},
			error: function(err)
			{
				alert("There was an error uploading your file.");
			}
		}).submit();
	});
});