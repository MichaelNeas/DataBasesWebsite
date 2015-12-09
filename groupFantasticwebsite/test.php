<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="neas_SQL_server";
$dbname="chinook";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
    echo "Succesful!";
?>
	<div style="padding-left:20px; text-align: center; background:cyan;">
    <a href="tportal.html">
        <div style="  
            border: 0 none;
            border-radius: 36px;
            padding: 12px 45px;
            margin: 0 10px;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            color: #fff;
            text-transform: none;
            -webkit-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            background: blue;
            color: #FFFFFF;
            margin:10px;">Back To Portal Master</div></a>
            <br>

<?php
$query = "SELECT `FirstName`,`LastName` FROM `person` ORDER BY `person`.`LastName` ASC";
//$query = "SELECT `AlbumId` FROM `chinook`.`Album"

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($FirstName, $LastName);
?>
    <table style="margin: 0 auto;">

<?php
    while ($stmt->fetch()) {
        ?>
        <tr style="border: 1px solid black;"> <td style="border: 1px solid black;">
        <?php
    	printf("%s\n", $FirstName);
        printf("%s\n", $LastName);
        ?>

        </td></tr>
        <?php
    }
    $stmt->close();
}
//$con->close();
?>
</table>
</div>


