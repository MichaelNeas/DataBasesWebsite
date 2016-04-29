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


<form method="post" action="">
  First name: <input type="text" name="fname"><br>
  Last name: <input type="text" name="lname"><br>
  <input type="submit" name="submit" value="Search For Person">
</form>


<?php
$query = "SELECT FirstName,LastName FROM person ";
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
<?php   
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        echo "connected";
    }
    echo "<br>";
    if(isset($_POST["submit"])){
        echo "<br>";
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
            $query = "SELECT FirstName,LastName FROM person WHERE FirstName = ? AND LastName = ? ";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param( "ss", $firstName, $lastName); 
            $stmt->execute();
            $stmt->store_result();
            printf("Number of rows: %d.\n", $stmt->num_rows);
            $stmt->bind_result($fname, $lname);
            $stmt->fetch();
            printf("%s %s\n", $fname, $lname);
            if($stmt->num_rows > 0) {
                echo "Found Them!"; // The record(s) do exist
            }
            else{
                echo "didn't find them";
            }
            $stmt -> close();
        }
        else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
    }
?>

</table>
</div>


