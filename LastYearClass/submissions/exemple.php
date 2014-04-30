<?

require_once("zip.lib.php");
set_time_limit(100);

if(!$arch || !file_exists($arch))
 die('<html><body><form action="exemple.php">
Entrez le chemin de l\'archive : <input type=text name=arch><br><br><input type=submit>
</form></body></html>');

$z = new Zip;
$l=$z->get_list($arch);
?>
<html>
<head><title>ZipExplorer | <?=basename($arch)?> </title>
</head>
<body bgcolor="#333366">
<Table border=2 cellspadding=8 cellspacing=0 bgcolor="#9999CC" align=center bordercolor="#CCCCCC" width="100%" height="100%">
<tr><td><br>
<h2 align="center">Navigateur Zip</h2>
<table align="center" bgcolor="#CCCCCC" cellspacing=0 cellpadding=3 border=2 bordercolor="#000000" width="97%">
<tr bgcolor="#999999"><td><b>Nom</b></td>
<td width="130"><b>Dossier</b></td><td width="120"><b>Taille</b></td><td width="120"><b>Compréssé</b></td>
<td width="90"><b>Ratio</b></td></tr>
<?
for($k=0;isset($l[$k]);$k++){
  $h=$l[$k];  $name=$h[stored_filename]; $isdir=$h[folder]; $id=$h[index]; $sub=""; $mdir = dirname($name)."/";
if(!$h[folder]){ $s=$h[size]; $cs=$h[compressed_size]; $un="Bytes"; $uni="Bytes"; $ext=strtolower(substr($name,-4));if($ext==".gif"||$ext==".jpg"||$ext==".png"||$ext==".bmp"){}
$ratio=@intval($cs/($s/100)+0,00001);
if($s>1000){$s=substr($s/1000,0,5); $un="Kb"; }if($s>1000){$s=substr($s/1000,0,5); $un="Mb"; }if($s>1000){$s=substr($s/1000,0,5); $un="Gb"; }
if($cs>1000){$cs=substr($cs/1000,0,5); $uni="Kb"; }if($cs>1000){$cs=substr($cs/1000,0,5); $uni="Mb"; }if($cs>1000){$cs=substr($cs/1000,0,5); $uni="Gb"; } ?>

<tr><td style="padding-left:12px;"><?=$name?></td><td><?=$sub?><?=$mdir?></td><td align=center><?=$s?> <?=$un?></td><td align=center><?=$cs?> <?=$uni?></td>
<td align=center><?=$ratio?> %</td></tr>
<? }}if($k==0){ ?><tr><td colspan="7" align=center><b>= Archive vide =</b></td></tr><? } ?>
</table><br></td></tr></table>
</html>