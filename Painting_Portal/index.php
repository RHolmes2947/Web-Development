<!DOCTYPE html>
<html>
<head>
<title>Assign2-Home Page of Art Gallery</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960.css" />
<link rel="stylesheet" href="css/assign2.css" />
<style>
.painting-container {
    display: flex;
    align-items: center;
    gap: 10px;
}
.painting-image {
    width: 150px;
}
.painting-details {
    flex-grow: 1;
}
</style>
</head>
<body>
<div class="container_12">
	<?php require_once("utilities/header.php"); ?>
	<div class="grid_3">
		<?php require_once("utilities/navigation.php"); ?>
	</div>
	<div class="grid_9">
		<?php
		$paintingsData = file("resources/paintings.txt", FILE_IGNORE_NEW_LINES);
		$artistsData = file("resources/artists.txt", FILE_IGNORE_NEW_LINES);

		$paintings = [];
		foreach ($paintingsData as $painting) {
			$paintingData = explode("~", $painting);
			$paintingId = $paintingData[0];
			$artistName = $paintingData[1];
			$title = $paintingData[2];
			$genre = $paintingData[9];
			$imageFilename = "resources/paintings/medium/" . str_pad($paintingId, 5, '0', STR_PAD_LEFT) . ".jpg";

			$paintings[] = [
				"id" => $paintingId,
				"title" => $title,
				"artist" => $artistName,
				"genre" => $genre,
				"image" => $imageFilename
			];
		}
		if (isset($_GET['genre'])) {
			$selectedGenre = $_GET['genre'];
			$filteredPaintings = array_filter($paintings, function ($painting) use ($selectedGenre) {
				return $painting['genre'] === $selectedGenre;
			});
		} else {
			$filteredPaintings = $paintings;
		}

		
		foreach ($filteredPaintings as $painting) {
			$paintingId = $painting['id'];
			$title = $painting['title'];
			$artistName = $painting['artist'];
			$imageFilename = $painting['image'];

			echo "<div class='painting-container'>";
			echo "<a href=\"singlePainting.php?painting_id=$paintingId\"><img class='painting-image' src=\"$imageFilename\" alt=\"$title\" /></a>";
			echo "<div class='painting-details'>";
			echo "<h3><a href=\"singlePainting.php?painting_id=$paintingId\">$title</a></h3>";
			echo "<p>Artist: <a href=\"singleArtist.php?artist_name=$artistName\">$artistName</a></p>";
			echo "</div>";
			echo "</div>";
		}
		?>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>
