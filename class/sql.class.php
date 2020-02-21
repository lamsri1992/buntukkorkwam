<?php

    // Insert Function
    function insertSQL($table,$data){
        global $mysqli; $fields=""; $values=""; $i=1;
            foreach($data as $key=>$val) {
                if($i!=1) { $fields.=", "; $values.=", "; }
                    $fields.="$key";
                    $values.="'$val'";
                    $i++;
            }
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        if($mysqli->query($sql)) {
                return true;
            }else{ 
                die("SQL Error: <br>".$sql."<br>".$mysqli->error);
            return false; 
        }
    }

    // Update Function
    function updateSQL($table,$data,$where){
        global $mysqli; $modifs=""; $i=1;
            foreach($data as $key=>$val){
                if($i!=1){$modifs.=", "; }
                    $modifs.=$key.' = "'.$val.'"'; 
                    $i++;
            }
        $sql = ("UPDATE $table SET $modifs WHERE $where");
        if($mysqli->query($sql)) {
                return true; 
            }else{ 
                die("SQL Error: <br>".$sql."<br>".$mysqli->error); 
            return false; 
        }

    }

    // Delete Function
    function deleteSQL($table, $where){
        global $mysqli;			
        $sql = "DELETE FROM $table WHERE $where";
        if($mysqli->query($sql)) {
                return true;
            }else{ 
                die("SQL Error: <br>".$sql."<br>".$mysqli->error); 
            return false; 
        }
}

?>