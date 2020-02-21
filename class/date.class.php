<?php
$month_name = array( "","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$month_name_short = array( "","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.", "ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$day_name=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");

function FullThaiDateTime($dateTime){
    global $day_name,$month_name;
    $thai_date_return="วัน".$day_name[date("w",$dateTime)];
    $thai_date_return.=	"ที่ ".date("j",$dateTime);
    $thai_date_return.=" เดือน".$month_name[date("n",$dateTime)];
    $thai_date_return.=	" พ.ศ.".(date("Yํ",$dateTime)+543);
    $thai_date_return.=	"  ".date("H:i",$dateTime)." น.";
    return $thai_date_return;
}

function FullThaiDate($dateTime){
    global $day_name,$month_name;
    $thai_date_return="วัน".$day_name[date("w",$dateTime)];
    $thai_date_return.=	"ที่ ".date("j",$dateTime);
    $thai_date_return.=" เดือน".$month_name[date("n",$dateTime)];
    $thai_date_return.=	" พ.ศ.".(date("Yํ",$dateTime)+543);
    return $thai_date_return;
}

function DBThaiDate($d){
    if (!$d) return "";
    if ($d == "0000-00-00") return "";

    $d1=explode("-",$d);
    return $d1[2] . "/" . $d1[1] . "/" . (intval($d1[0]) + 543);
}

function DBThaiLongDate($d){
    global $month_name;
    if (!$d) return "";
    if ($d == "0000-00-00") return "";

    $d1=explode("-",$d);
    return intval($d1[2]) . " " . $month_name[intval($d1[1])] . " " . (intval($d1[0]) + 543);
}

function DBThaiLongDateFull($d){
    global $month_name;
    if (!$d) return "";
    if ($d == "0000-00-00") return "";

    $d1=explode("-",$d);
    return "วันที่ " . intval($d1[2]) . " เดือน " . $month_name[intval($d1[1])] . " พ.ศ. " . (intval($d1[0]) + 543);
}

function DBThaiShortDate($d){
    global $month_name_short;
    if (!$d) return "";
    if ($d == "0000-00-00") return "";

    $d1=explode("-",$d);
    return intval($d1[2]) . " " . $month_name_short[intval($d1[1])] . " " . (intval($d1[0]) + 543);
}

function ThaiDate2DBDate($d){
    if (!$d) return "";
    if ($d == "00-00-0000") return "";

    $d1=explode("/",$d);
    return (intval($d1[2]) - 543) . "-" . $d1[1] . "-" . $d1[0];
}

function Date2DBDate($d){
    if (!$d) return "";
    if ($d == "00-00-0000") return "";

    $d1=explode("/",$d);
    return (intval($d1[0])) . "-" . $d1[1] . "-" . $d1[2];
}

function Diff2LongTime($time_a,$time_b){
    if ($time_a == '' || $time_a == '00:00:00') return "-";
    if ($time_b == '' || $time_b == '00:00:00') return "-";
    $now_time1=strtotime(date("Y-m-d ".$time_a));
    $now_time2=strtotime(date("Y-m-d ".$time_b));
    $time_diff=abs($now_time2-$now_time1);
    $time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน
    $time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน
//    return $time_diff_h." ชั่วโมง ".$time_diff_m." นาที ".$time_diff_s." วินาที";
    return $time_diff_h." ชั่วโมง ".$time_diff_m." นาที ";
}

function Diff2ShortTime($time_a,$time_b){
    if ($time_a == '' || $time_a == '00:00:00') return "-";
    if ($time_b == '' || $time_b == '00:00:00') return "-";
    $now_time1=strtotime(date("Y-m-d ".$time_a));
    $now_time2=strtotime(date("Y-m-d ".$time_b));
    $time_diff=abs($now_time2-$now_time1);
    $time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน
    $time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน
//    return $time_diff_h." ชั่วโมง ".$time_diff_m." นาที ".$time_diff_s." วินาที";
    return $time_diff_h." ชม. ".$time_diff_m." น.";
}

function TimeThai($strTime)
{
    if ($strTime == '') return "-";
    $strHour= date("H",strtotime($strTime));
    $strMinute= date("i",strtotime($strTime));
    $strSeconds= date("s",strtotime($strTime));
    return "$strHour:$strMinute"." น.";
}

function DateTimeThai($strDate)
{
    if (!$strDate) return "";
    if ($strDate == "0000-00-00 00:00:00") return "00-00-0000 00:00:00";
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute"."น";
}

function FullDateTimeThai($strDate)
{
    if (!$strDate) return "";
    if ($strDate == "0000-00-00 00:00:00") return "00-00-0000 00:00:00";
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strMonthCut = Array("","มกราคม.","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];
    return "วันที่ $strDay เดือน $strMonthThai พ.ศ.$strYear เวลา $strHour:$strMinute"."น";
}

function CalDateStartToEnd($dateStart,$dateEnd)
{
    if ($dateStart == "0000-00-00" || $dateEnd == "0000-00-00" || $dateStart == "" || $dateEnd == "") return "";
    list($syear , $smonth , $sady) = explode("-" , $dateStart);
    list($eyear , $emonth , $eday) = explode("-" , $dateEnd);

    if($syear < 1970){
        $yearad =1970 - $syear;
        $syear =1970;
    }
    else
    {
        $yearad = 0;
    }

    $mStart = mktime(0,0,0,$smonth,$sday,$syear);
    $mEnd = mktime(0,0,0,$emonth,$eday,$eyear);

    $num = ($mEnd - $mStart);
    $numDate = (date("Y",$num)-1970 + $yearad)." ปี ".
        (date("m", $num)-1)." เดือน " .
        (date("d", $num)-1)." วัน" ;

    return($numDate);
}

function GetAge($birthday) {
    if ($birthday == "0000-00-00") return "";
    $then = strtotime($birthday);
    return(floor((time()-$then)/31556926));
}

function DateDiff($strDate1,$strDate2){
    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 ) + 1;  // 1 day = 60*60*24
}

function DateThai($strDate)
{
    $strMonth= date("n",strtotime($strDate));
    $strMonthCut = Array("","มกราคม.","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strMonthThai";
}
