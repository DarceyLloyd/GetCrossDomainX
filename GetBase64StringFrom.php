<?php
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function trace($arg){ echo("<span style='border:1px solid #CCCCCC'>".$arg."</span><br>"); }
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$src;
$mime;
$file_data;

if (isset($_GET["src"])){
	$src = $_GET["src"];
} else {
	echo("Where's the src? I need the src!");
	die();
}

if (isset($_GET["mime"])){
	$mime = $_GET["mime"];
	if (strlen($mime) < 3){
		echo("If your going to manually set the mime type, at least set it to something valid!");
		die();
	}
} else {
	$info = new SplFileInfo($src);
	$ext = $info->getExtension();
	switch($ext){
		case "css": $mime = "text/css"; break;
		case "avi": $mime = "video/avi"; break;
		case "exe": $mime = "application/octet-stream"; break;
		case "gif": $mime = "image/gif"; break;
		case "mp3": $mime = "audio/mpeg"; break;
		case "mpeg": $mime = "video/mpeg"; break;
		case "ogg": $mime = "audio/vorbis"; break;
		case "pdf": $mime = "application/pdf"; break;
		case "png": $mime = "image/png"; break;
		case "svg": $mime = "image/svg"; break;
		case "doc": $mime = "application/msword"; break;
		case "htm": $mime = "text/html"; break;
		case "html": $mime = "text/html"; break;
		case "txt": $mime = "text/plain"; break;
		case "wav": $mime = "audio/wav"; break;
		case "xml": $mime = "application/xml"; break;
		case "zip": $mime = "application/zip"; break;
		case "swf": $mime = "application/x-shockwave-flash"; break;
		case "rtf": $mime = "application/rtf"; break;
		case "js": $mime = "application/x-javascript"; break;
		case "jpeg": $mime = "image/jpeg"; break;
		case "jpg": $mime = "image/jpeg"; break;
		case "midi": $mime = "audio/x-midi"; break;
		case "ogv": $mime = "video/ogg"; break;
		case "oga": $mime = "audio/ogg"; break;
		case "tif": $mime = "image/tiff"; break;
		case "tiff": $mime = "image/tiff"; break;
		case "ttf": $mime = "font/ttf"; break;
		case "woff": $mime = "font/woff"; break;
		case "woff2": $mime = "font/woff2"; break;
		case "3gp": $mime = "video/3gpp"; break;
		case "tga": $mime = "image/tga"; break;
		case "otf": $mime = "font/opentype"; break;
		case "json": $mime = "application/json"; break;
		case "csv": $mime = "text/csv"; break;
		case "tsv": $mime = "text/tsv"; break;

		default:
			echo("Unsupoorted file extensions, please set the mime type manually via the mime parameter...");
			die();
		break;
	}
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$file_data = file_get_contents($src);
$type = pathinfo($src, PATHINFO_EXTENSION);
$base64 = 'data:' . $mime . ';base64,' . base64_encode($file_data);

header("Access-Control-Allow-Origin: *");
echo($base64);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -