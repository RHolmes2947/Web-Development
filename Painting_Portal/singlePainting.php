<!DOCTYPE html>
<html>
<head>
<title>Assign2 - Single Painting</title>
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
	
		if (isset($_GET['painting_id'])) {
			$paintingId = $_GET['painting_id'];

	
			$paintingsData = file("resources/paintings.txt", FILE_IGNORE_NEW_LINES);
			$artistsData = file("resources/artists.txt", FILE_IGNORE_NEW_LINES);

			$painting = null;
			foreach ($paintingsData as $paintingData) {
				$paintingDataArray = explode("~", $paintingData);
				if ($paintingDataArray[0] === $paintingId) {
					$painting = $paintingDataArray;
					break;
				}
			}

			if ($painting !== null) {
				$artistName = $painting[1];
				$title = $painting[2];
				$year = $painting[3];
				$width = $painting[4];
				$height = $painting[5];
				$genreName = $painting[9];
				$description = $painting[7];
				$wikipediaLink = $painting[8];
				$imageFilename = "resources/paintings/medium/" . str_pad($paintingId, 5, '0', STR_PAD_LEFT) . ".jpg";

				// Retrieve artist information
				$artist = null;
				foreach ($artistsData as $artistData) {
					$artistDataArray = explode("~", $artistData);
					if ($artistDataArray[1] === $artistName) {
						$artist = $artistDataArray;
						break;
					}
				}

				if ($artist !== null) {
					$artistNationality = $artist[2];

				
					echo "<img src=\"$imageFilename\" alt=\"$title\" />";
					echo "<h2>$title</h2>";
					echo "<p>Artist: $artistName ($artistNationality)</p>";
					echo "<p>Year: $year</p>";
					echo "<p>Dimensions: $width x $height</p>";
					echo "<p>Genre: $genreName</p>";
					echo "<p>Description: $description</p>";
					echo "<p>Wikipedia Link: <a href=\"$wikipediaLink\">$title</a></p>";
				} else {
					echo "<p>Artist information not found.</p>";
				}
			} else {
				echo "<p>Painting not found.</p>";
			}
		} else {
			echo "<p>Painting ID not provided.</p>";
		}
		?>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>
