<?php
switch ($stats) {
case "bestArtists":
/*Top Artists*/
$query = "Select artist.name from (artist,track,album)  where album.ArtistId = artist.ArtistId AND track.AlbumId = album.AlbumId group by artist.name Order by count(*) DESC limit 0,25";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
        //printf("%s\n", $name);
    }
    $stmt->close();
}
break;



case "worstArtist":
}
/*Worst Artists*/
$query = "Select artist.name from (artist,track,album)  where album.ArtistId = artist.ArtistId AND track.AlbumId = album.AlbumId group by artist.name Order by count(*) ASC limit 0,25";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
        //printf("%s\n", $name);
    }
    $stmt->close();
}
break;

case "green":
/*Top Genre*/
$query = "Select genre.name from genre join track on track.genreid = genre.GenreId join playlisttrack on playlisttrack.TrackId = track.trackid group by genre.name ORDER by count(*) DESC limit 0,5";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
        //printf("%s\n", $name);
    }
    $stmt->close();
}

/*Worst Genre*/
$query = "Select genre.name from genre join track on track.genreid = genre.GenreId join playlisttrack on playlisttrack.TrackId = track.trackid group by genre.name ORDER by count(*) ASC limit 0,5";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
        //printf("%s\n", $name);
    }
    $stmt->close();
}

/*Top Album*/
$query = "Select Artist.name,album.title from album join track on track.AlbumId = album.AlbumId join artist on album.artistid = artist.artistid join playlisttrack on playlisttrack.TrackId = track.trackid group by album.title Order by count(*) DESC limit 0,25";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $title);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $name, $title);
    }
    $stmt->close();
}


$query = "Select Artist.name,album.title from album join track on track.AlbumId = album.AlbumId join artist on album.artistid = artist.artistid join playlisttrack on playlisttrack.TrackId = track.trackid group by album.title Order by count(*) ASC limit 0,25";

/*Worst Album*/
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $title);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $name, $title);
    }
    $stmt->close();
}


$query = "Select Playlist.name from playlist join playlisttrack on playlist.playlistid = playlisttrack.PlaylistId group by Playlist.name Order by count(*) DESC limit 0,5";

/*Top Playlist*/
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
        //printf("%s\n", $name);
    }
    $stmt->close();
}

/*Worst Playlist*/
$query = "Select Playlist.name from playlist join playlisttrack on playlist.playlistid = playlisttrack.PlaylistId group by Playlist.name Order by count(*) ASC limit 0,5";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
        //printf("%s\n", $name);
    }
    $stmt->close();
}


/*Top Tracks*/
$query = "Select Artist.name, track.name from track join album on album.AlbumId = track.AlbumId join artist on artist.artistid = album.artistid join playlisttrack on track.trackid = playlisttrack.trackid group by track.name Order by count(*) DESC limit 0,25";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $name1);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $name, $name1);
    }
    $stmt->close();
}


$query = "Select Artist.name, track.name from track join album on album.AlbumId = track.AlbumId join artist on artist.artistid = album.artistid join playlisttrack on track.trackid = playlisttrack.trackid group by track.name Order by count(*) ASC limit 0,25";

/*Worst Tracks*/
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $name1);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $name, $name1);
    }
    $stmt->close();
}


/*Total Downloads*/

$query = "CREATE TEMPORARY TABLE downloads ( 	Total_Downloads INT(11) )";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $field1, $field2);
    }
    $stmt->close();
}

$query = "INSERT INTO downloads (Total_Downloads) select count(track.trackid) from track join invoiceline on invoiceline.trackid = track.trackid";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($trackid);
    while ($stmt->fetch()) {
        //printf("%s\n", $trackid);
    }
    $stmt->close();
}

$query = "Select Total_Downloads from downloads";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($Total_Downloads);
    while ($stmt->fetch()) {
        //printf("%s\n", $Total_Downloads);
    }
    $stmt->close();
}

$query = "drop table downloads";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $field1, $field2);
    }
    $stmt->close();
}



/*Total Plays*/

$query = "CREATE TEMPORARY TABLE plays ( 	total_plays INT(11) )";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $field1, $field2);
    }
    $stmt->close();
}

$query = "INSERT INTO plays (total_Plays) SELECT count(playlisttrack.trackid) * count(distinct customer.customerid) from (playlisttrack,customer) join track on track.trackid = playlisttrack.trackid";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($trackid);
    while ($stmt->fetch()) {
        //printf("%s\n", $trackid);
    }
    $stmt->close();
}


$query = "select total_plays from plays";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($total_plays);
    while ($stmt->fetch()) {
        //printf("%s\n", $total_plays);
    }
    $stmt->close();
}


$query = "drop table plays";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $field1, $field2);
    }
    $stmt->close();
}


    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
?>
