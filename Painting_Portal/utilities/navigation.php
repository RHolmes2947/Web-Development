<div id="genreListing">
	<h2>Genres</h2>
	<ul class="secondaryList">
		<?php
		$paintingsData = file("resources/paintings.txt", FILE_IGNORE_NEW_LINES);

		$genres = [];
		foreach ($paintingsData as $painting) {
			$paintingData = explode("~", $painting);
			$genreName = $paintingData[9];

			if (!in_array($genreName, $genres)) {
				$genres[] = $genreName;
				echo "<li><a href=\"index.php?genre=$genreName\">$genreName</a></li>";
			}
		}
		?>
	</ul>
</div>

<div id="artistListing">
	<h2>Artists</h2>
	<ul class="secondaryList">
		<?php
		$artistsData = file("resources/artists.txt", FILE_IGNORE_NEW_LINES);

		$artists = [];
		foreach ($artistsData as $artist) {
			$artistData = explode("~", $artist);
			$artistName = $artistData[1];

			if (!in_array($artistName, $artists)) {
				$artists[] = $artistName;
				echo "<li><a href=\"singleArtist.php?artist_name=$artistName\">$artistName</a></li>";
			}
		}
		?>
	</ul>
</div>
