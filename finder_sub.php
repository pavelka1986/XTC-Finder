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
if ($_POST['id']) {
		$id = $_POST['id'];
		$sql = mysql_query("

SELECT c.categories_id AS id, cd.categories_name AS name, cd.gm_url_keywords AS keyword , c.parent_id AS c_parent_id
FROM categories c
LEFT JOIN categories_description cd ON c.categories_id = cd.categories_id 
WHERE c.categories_id > 2
AND c.parent_id ='$id'




");
		echo '<option selected="selected">--wahlen--</option>';
    while ($row = mysql_fetch_array($sql)) {
				$id = $row['id'];
				$data = $row['name'];
				echo '<option value="'.$id.'">'.$data.'</option>';
		}
}
?>