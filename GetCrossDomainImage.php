<?php
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function trace($arg){ echo("<span style='border:1px solid #CCCCCC'>".$arg."</span><br>"); }
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$src;
$img;

if (isset($_GET["src"])){
	$src = $_GET["src"];
} else {
	echo("please use script correctly!");
	die();
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


$img = file_get_contents($src);
$type = pathinfo($src, PATHINFO_EXTENSION);
//$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
//$type = 'image/jpeg';
header("Access-Control-Allow-Origin: *");
// header('Content-Type:'.$type);
// header('Content-Length: ' . filesize($file));
echo($img);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -