<?php

	if(!defined("INCLUDE_FILE"))
		exit;

?>

<div id='player'>
	<audio id='audio' src='' controls></audio>

	<svg id='loader' width="300px" height="200px" viewBox="0 0 187.3 93.7" preserveAspectRatio="xMidYMid meet" style="left: 50%; top: 50%; position: absolute; transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);">
		<path stroke="#ededed" id="outline" fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
		<path id="outline-bg" opacity="0.05" fill="none" stroke="#ededed" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
	</svg>

	<div id='banner'>
		<span class='title'>Audis</span>

		<a href='http://anguterman.com' target='_blank'>
			<span class='name'>Andrew Guterman</span>
		</a>
	</div>

	<div id='title'>Click here to choose a song</div>

	<div id='choose'>
		<h1>Choose Song</h1>
		<div id='chooseClose'>X</div>

		<div class='inner'>
			<div>
				<div>
					<i class='ion ion-upload'></i>
					<h2>Upload Song</h2>

					<form id='upload_form' action='ajax/upload.php' method='POST' enctype='multipart/form-data'>
						<label for='upload_song'>
							<input type='file' id='upload_song' name='song'>
							Choose File
						</label>
					</form>
				</div>

				<div>
					<i class='ion ion-ios-search-strong'></i>
					<h2>Web Search</h2>

					<input type='text' id='search_query' placeholder='Dillon Francis - Need You' spellcheck='false'>
				</div>
			</div>

			<div style='flex: 3'>
				<div id='search_results'></div>
			</div>
		</div>
	</div>

	<div id='bars'></div>
</div>