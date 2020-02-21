<?php
include ('config/database.php');
include ('class/sql.class.php');
include ('class/date.class.php');

$mysqli = connect();
$op = $_REQUEST['op'];

if($op == 'add'){
    $emp = mysqli_real_escape_string($mysqli,$_REQUEST['create_name']);
    $place = mysqli_real_escape_string($mysqli,$_REQUEST['place']);
    $title = mysqli_real_escape_string($mysqli,$_REQUEST['title']);
    $list = mysqli_real_escape_string($mysqli,$_REQUEST['ename']);
    $dstr = Date2DBDate($_REQUEST['dstart']);
    $dend = Date2DBDate($_REQUEST['dend']);
    $data = array(
        "travel_emp"=>$emp,
        "travel_list"=>$list,
        "travel_place"=>$place,
        "travel_title"=>$title,
        "travel_start"=>$dstr,
        "travel_end"=>$dend
    );
    insertSQL("tb_travel",$data);
}
?>