<?php
error_reporting(-1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
header("Content-Type: text/html; charset=utf-8");
$conn = mysqli_connect("localhost", "USER", "PASSWD","YOURDATABASE");
if (!$conn) {
  die('Not connected : ' . mysql_error($conn));
}
mysqli_set_charset($conn, 'utf8');
$ypx=($_SERVER['REMOTE_ADDR']);
$yypx=$ypx;
$ypx = ip2long($ypx);
$xypx=strval($ypx);
$yback=long2ip($xypx);
$xxxipx=get_client_ip();
var_dump($xxxipx);
$ipx = ip2long($xxxipx);
$xipx=strval($ipx);
##http://ipinfo.io/91.12.92.170/
##https://ipapi.co/91.12.92.170
$xback=long2ip($ipx);
$timestamp = date("Y-m-d H:i:s");
$ip = $xback;
$latt=file_get_contents("https://ipapi.co/$xback/latitude/"); 
$lott=file_get_contents("https://ipapi.co/$xback/longitude/"); 
#var_dump($ipx);
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$wert=$details->loc;
$lx=strstr($wert, ',');
$lx=str_replace(',',' ',$lx);
#$lon=floatval($lx);
#$lat=floatval(strstr($wert, ',', true));
$lon=floatval($lott);
$lat=floatval($latt);
$xxxipx='http://'.$xxxipx;
var_dump($xxxipx);
$zeit='K'.date("Y-m-d H");
$sql ="INSERT INTO ipadr ( ipbin,lip,ipstring,lipstring,wann,lat,lng,type,status,name,local) VALUES ($ipx,$ypx, $xipx, $xypx,now(),$lat,$lon,'$xxxipx','K','$zeit','$yypx')";
if ($conn->query($sql) === TRUE) {
    #echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>