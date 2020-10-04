<?php
     
    if ( isset($_POST["sc"])&&isset($_POST["name"])){
    $servername = "localhost";
    $username = "id14515125_gamescore";
    $password = "Ashish@19961";
    $db = "id14515125_gamedb";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
  echo $_GET["sc"];
  echo $_GET["name"];
   $score=$_POST["sc"];
    $name=$_POST["name"];
    $sql = "INSERT INTO GameData ( PlayerName, Report, IsHighScore) VALUES ('".$name."','".$score."','NA')";
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