<?php
function connect()
{
    $db_config=array(
        "host"=>"localhost",
        "user"=>"root",
        "pass"=>"",
        "dbname"=>"note_db",
        "charset"=>"utf8"
    );
    $mysqli = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);
    if(mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        exit;
    }
    if(!$mysqli->set_charset($db_config["charset"])) {
        printf("Error loading character set utf8: %sn", $mysqli->error);
    }
    return $mysqli;
    $mysqli->close();
}
?>