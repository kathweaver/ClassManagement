<?php
function GetFileExtention($filename) { 
    $ext = explode(".", $filename); 
    $extention = ""; 
    for($i=1;$i<=sizeof($ext)-1;$i++) { 
        if($ext) { 
            $extention .= ".".$ext[$i]; 
        } 
    } 
    return $extention; 
} 

function GetFileName($path) { 
    $slash = explode("/",$path); 
    $filename = $slash[sizeof($slash)-1]; 
    return $filename; 
} 

/* This script takes a variable named $path strips off the last 3 characters to see what the extension is, 
and processes it accordingly */
$base_path = "/home/kweavus/";
$path = $base_path.$path;
$extension = GetFileExtention($path);
$filename=GetFileName($path);
if($extension == ".jpg"){
header("Content-type: image/jpeg");
}elseif($extension == ".gif"){ 
header("Content-type: image/gif");
}elseif($extension == ".pdf"){
header("Content-type: application/pdf");
}elseif($extension == ".doc"){
header("Content-Type: application/download-script-by-hex\n"); 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Transfer-Encoding: ascii");
}elseif($extension == ".htm"){
header("Content-type: text/html");
}elseif($extension == ".exe"){
header("Content-Type: application/download-script-by-hex\n"); 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Transfer-Encoding: ascii");
}elseif($extension == ".java"){
header("Content-Type: application/download-script-by-hex\n"); 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Transfer-Encoding: ascii");
}elseif($extension == ".class"){
header("Content-Type: application/download-script-by-hex\n"); 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Transfer-Encoding: ascii");
}
else {
header("Content-Type: application/download-script-by-hex\n"); 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Transfer-Encoding: ascii");
}

/* YOU COULD ADD MORE HERE TO SEND ERRORS IF YOU RECEIVE A WEIRD IMAGE TYPE! */
@readfile("$path");
?>
