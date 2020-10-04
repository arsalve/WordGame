<?php
$highscoreflag = "no";

if ($_GET['q'] == "give")
{
    $servername = "localhost";
    $username = "id14515125_gamescore";
    $password = "Ashish@19961";
    $db = "id14515125_gamedb";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    $query = "SELECT highScore FROM Score WHERE id=1";
    $fetch = mysqli_query($conn, $query);

    $row = $fetch->fetch_assoc();
    echo $row["highScore"];
    return $row["highScore"];
}
if ($_GET['q'] == "take")
{
    $servername = "localhost";
    $username = "id14515125_gamescore";
    $password = "Ashish@19961";
    $db = "id14515125_gamedb";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    $HS = $_POST['HS'];
    
    $highscoreflag = "yes";
    $sql = "UPDATE `Score` 
	SET highScore='".$HS."' WHERE id=1";
	echo $sql;
    if (mysqli_query($conn, $sql))
    {
        echo json_encode(array(
            "statusCode" => 200
        ));
    }
    else
    {
        echo json_encode(array(
            "statusCode" => 201
        ));
    }
    mysqli_close($conn);
}


?>
