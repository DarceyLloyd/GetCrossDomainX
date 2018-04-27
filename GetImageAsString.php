<?php
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function trace($arg){ echo("<span style='border:1px solid #CCCCCC'>".$arg."</span><br>"); }
function boolToString($arg){
	if ($arg){
		return("true");
	} else {
		return("false");
	}
}
function track($src){
	$filename = "GetImageStats.trk";
	$count = file_get_contents($filename);
	if ($count == null){
		$count = 0;
	}

	$count++;
	$handle = fopen($filename, "w+");
	fwrite($handle, $count);
	fclose($handle);


	$handle = fopen("./log/data.csv", "a");
	$dte = date("d-m-Y H:i:s");
	$ref = $_SERVER['HTTP_REFERER'];
	$ip = $_SERVER['REMOTE_ADDR'];

	$matches = "codepen";
	$match = strpos($matches, $ref);
	// $data = [$count,$dte,gettype($match),boolToString($match),$ref,$src];
	if (strpos($ref,$matches) === false) {
		$data = [$count,$dte,$ip,$ref,$src];
	} else {
		$data = [$count,$dte,$ip,"codepen.io",$src];
	}

	// foreach ($_SERVER as $key => $value) {
	// 	$v = $key . "=" . $value;
	// 	array_push($data,$v);
	// 	// echo($key . " = " . $value . "\n\r");
	// }
	// trace($data);
	fputcsv($handle, $data);
	fclose($handle);
}
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

track($src);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$img = file_get_contents($src);
$type = pathinfo($src, PATHINFO_EXTENSION);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);

header("Access-Control-Allow-Origin: *");
echo($base64);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -