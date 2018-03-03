DOWNLOAD.PHP
<?php
function output_file($file, $name, $mime_type='')
{
if(!is_readable($file)) die('File not found or inaccessible!');
$size = filesize($file);
$name = rawurldecode($name);
$known_mime_types=array(
"pdf" => "application/pdf",
"txt" => "text/plain",
"html" => "text/html",
"htm" => "text/html",
"exe" => "application/octet-stream",
"zip" => "application/zip",
"doc" => "application/msword",
"xls" => "application/vnd.ms-excel",
"ppt" => "application/vnd.ms-powerpoint",
"gif" => "image/gif",
"png" => "image/png",
"jpeg"=> "image/jpg",
"jpg" => "image/jpg",
"php" => "text/plain"
);
if($mime_type==''){
$file_extension = strtolower(substr(strrchr($file,"."),1));
if(array_key_exists($file_extension, $known_mime_types)){
$mime_type=$known_mime_types[$file_extension];
} else {
$mime_type="application/force-download";
};
};

@ob_end_clean();


if(ini_get('zlib.output_compression'))
ini_set('zlib.output_compression', 'Off');
header('Content-Type: ' . $mime_type);
header('Content-Disposition: attachment; filename="'.$name.'"');
header("Content-Transfer-Encoding: binary");
header('Accept-Ranges: bytes');
header("Cache-control: private");
header('Pragma: private');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
if(isset($_SERVER['HTTP_RANGE']))
{
list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
list($range) = explode(",",$range,2);
list($range, $range_end) = explode("-", $range);
$range=intval($range);
if(!$range_end) {
$range_end=$size-1;
} else {
$range_end=intval($range_end);
}
$new_length = $range_end-$range+1;
header("HTTP/1.1 206 Partial Content");
header("Content-Length: $new_length");
header("Content-Range: bytes $range-$range_end/$size");
} else {
$new_length=$size;
header("Content-Length: ".$size);
}
$chunksize = 1*(1024*1024);
$bytes_send = 0;
if ($file = fopen($file, 'r'))
{
if(isset($_SERVER['HTTP_RANGE']))
fseek($file, $range);

while(!feof($file) &&
(!connection_aborted()) &&
($bytes_send<$new_length)
)
{
$buffer = fread($file, $chunksize);
print($buffer);
flush();
$bytes_send += strlen($buffer);
}
fclose($file);
} else

die('Error - can not open file.');
die();
}
set_time_limit(0);
$file_path='files/'.$_REQUEST['filename'];
output_file($file_path, ''.$_REQUEST['filename'].'', 'text/plain');
?>

INDEX.PHP

<?php
$conn=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("admin",$conn) or die(mysql_error());
if(isset($_POST['submit'])!=""){
$name=$_FILES['photo']['name'];
$size=$_FILES['photo']['size'];
$type=$_FILES['photo']['type'];
$temp=$_FILES['photo']['tmp_name'];
$caption1=$_POST['caption'];
$link=$_POST['link'];
move_uploaded_file($temp,"files/".$name);
$insert=mysql_query("insert into upload(name)values('$name')");
if($insert){
header("location:index.php");
}
else{
die(mysql_error());
}
}
?>
<html>
<head>
<title>Upload and Download</title>
</head>
<style>
body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
a{color:#666;}
#table{margin:0 auto;background:#333;box-shadow: 5px 5px 5px #888888;border-radius:10px;color:#CCC;padding:10px;}
#table1{margin:0 auto;}
</style>
<body>
<h3><p align="center">Files Upload And Download</p></h3> 
<form enctype="multipart/form-data" action="" name="form" method="post">
<table border="0" cellspacing="0" cellpadding="5" id="table">
<tr>
<th >Chosse Files</th>
<td ><label for="photo"></label><input type="file" name="photo" id="photo" /></td>
</tr>
<tr>
<th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
</tr>
</table>
</form>
<br />
<br />
<table border="1" align="center" id="table1" cellpadding="0" cellspacing="0">
<tr><td align="center">Click to Download</td></tr>
<?php
$select=mysql_query("select * from upload order by id desc");
while($row1=mysql_fetch_array($select)){
$name=$row1['name'];
?>
<tr>
<td width="300">
<img src="tick.png" width="14" height="14"><a href="download.php?filename=<?php echo $name;?>"><?php echo $name ;?></a>
</td>
</tr>
<?php }?>
</table>
</body>
</html>
