<?php

Class watchan {

    function getTravel(){
        $sql = "SELECT * FROM tb_travel";
                global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    function getTravelPrint($id){
        $sql = "SELECT * 
                FROM tb_travel
                WHERE travel_id = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;   
    }
}

?>