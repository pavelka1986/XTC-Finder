<?php
$host  = 'localhost';
$user  = 'd00c81e5';
$pass  = '92224dtw';
$dbase = 'd00c81e5';
mysql_connect($host, $user, $pass) or die("Could not connect to database");
mysql_select_db($dbase) or die("Could not select database");
mysql_query("SET NAMES 'utf-8'");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>        
  <head>            
    <meta http-equiv="content-type" content="text/html; charset=utf-8">      
    <meta name="robots" content="nofollow,noindex">
    <title>Finder         
    </title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
  //kategorie change
  $(".kategorie").change(function()
  {
    var id=$(this).val();
    var dataString = 'id='+ id;
  $.ajax
  ({
  type: "POST",
  url: "finder_sub.php",
  data: dataString,
  cache: false,
  success: function(html)
  {
    $(".sub_kategorie").html(html);
    } 
  });
 });
 
 //kategorie change
  $(".sub_kategorie").change(function()
  {
    var id=$(this).val();
    var dataString = 'id='+ id;
  $.ajax
  ({
  type: "POST",
  url: "finder_det.php",
  data: dataString,
  cache: false,
  success: function(html)
  {
    $(".detail").html(html);
    } 
  });
 });

}); 
</script>         
  </head>        
  <body>
  


Kategorie :
<select name="kategorie" class="kategorie">
<option selected="selected">--wahlen--</option>
<?php

$sql = mysql_query("
 SELECT c.categories_id AS id, cd.categories_name AS name, cd.gm_url_keywords AS keyword
  FROM categories c
LEFT JOIN categories_description cd ON c.categories_id = cd.categories_id 
WHERE c.categories_id < 3 
");
while ($row = mysql_fetch_array($sql)) {
		$id = $row['id'];
		$data = $row['name'];
		echo '<option value="'.$id.'">'.$data.'</option>';
}?>
</select> <br /><br />

Subkategorie :
<select name="sub_kategorie" class="sub_kategorie">
<option selected="selected">--wahlen--</option>
</select>  <br /><br />

Detail :
<select name="detail" class="detail" onchange="location.href=this.options[this.selectedIndex].value">
<option selected="selected">--wahlen--</option>
</select>

