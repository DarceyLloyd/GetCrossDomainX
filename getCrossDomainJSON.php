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

$file = file_get_contents($src);


header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
echo($file);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -