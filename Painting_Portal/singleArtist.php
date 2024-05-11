<!DOCTYPE html>
<html>
<head>
<title>Assign2 - Single Artist</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960.css" />
<link rel="stylesheet" href="css/assign2.css" />
</head>
<body>

<div class="container_12">
	<?php require_once("utilities/header.php"); ?>
	<div class="grid_3">
		<?php require_once("utilities/navigation.php"); ?>
	</div>
	<div class="grid_9">
		<?php
		if (isset($_GET['artist_name'])) {
			$artistName = $_GET['artist_name'];

		
			$artistsData = file("resources/artists.txt", FILE_IGNORE_NEW_LINES);
			$paintingsData = file("resources/paintings.txt", FILE_IGNORE_NEW_LINES);

			$artist = null;
			foreach ($artistsData as $artistData) {
				$artistDataArray = explode("~", $artistData);
				if ($artistDataArray[1] === $artistName) {
					$artist = $artistDataArray;
					break;
				}
			}

			if ($artist !== null) {
				$artistId = $artist[0];
				$nationality = $artist[2];
				$yearOfBirth = $artist[3];
				$yearOfDeath = $artist[4];
				$description = $artist[5];
				$wikipediaLink = $artist[6];
				$imageFilename = "resources/artists/medium/" . $artistId . ".jpg";

				
				$artistPaintings = [];
				foreach ($paintingsData as $paintingData) {
					$paintingDataArray = explode("~", $paintingData);
					if ($paintingDataArray[1] === $artistName) {
						$paintingId = $paintingDataArray[0];
						$paintingTitle = $paintingDataArray[2];
						$artistPaintings[] = [
							"id" => $paintingId,
							"title" => $paintingTitle
						];
					}
				}

		
				echo "<img src=\"$imageFilename\" alt=\"$artistName\" />";
				echo "<h2>$artistName</h2>";
				echo "<p>Nationality: $nationality</p>";
				echo "<p>Year of Birth: $yearOfBirth</p>";
				echo "<p>Year of Death: $yearOfDeath</p>";
				echo "<p>Description: $description</p>";
				echo "<p>Wikipedia Link: <a href=\"$wikipediaLink\">$artistName</a></p>";

		
				echo "<h3>Paintings:</h3>";
				if (count($artistPaintings) > 0) {
					echo "<ul>";
					foreach ($artistPaintings as $painting) {
						$paintingId = $painting['id'];
						$paintingTitle = $painting['title'];
						echo "<li><a href=\"singlePainting.php?painting_id=$paintingId\">$paintingTitle</a></li>";
					}
					echo "</ul>";
				} else {
					echo "<p>No paintings found for this artist.</p>";
				}
			} else {
				echo "<p>Artist not found.</p>";
			}
		} else {
			echo "<p>Artist name not provided.</p>";
		}
		?>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>
