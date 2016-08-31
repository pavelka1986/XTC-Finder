<?php
$host  = 'localhost';
$user  = 'd00c81e5';
$pass  = '92224dtw';
$dbase = 'd00c81e5';
mysql_connect($host, $user, $pass) or die("Could not connect to database");
mysql_select_db($dbase) or die("Could not select database");
mysql_query("SET NAMES 'utf-8'");
?>
<?php
if($_POST)
{
$q=$_POST['searchword'];
$sql_res=
mysql_query("
SELECT p.products_id AS id, pd.products_name AS name, pd.gm_url_keywords AS url
FROM products p
LEFT JOIN products_description pd ON p.products_id = pd.products_id
LEFT JOIN products_to_categories ptc ON p.products_id = ptc.products_id
where pd.products_name like '%$q%' order by name LIMIT 5


");
while($row=mysql_fetch_array($sql_res) or die(mysql_error()))
{
$fname=$row['name'];


?>
<div class="display_box" align="left">


<?php echo $fname; ?><br />

</div>
<?php
}
}
else
{}
?>