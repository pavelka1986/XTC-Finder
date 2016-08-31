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

SELECT
c.parent_id AS c_parent_id,
cd1.gm_url_keywords AS cd1_gm_url_keywords,cd.gm_url_keywords AS cd_gm_url_keywords,pd.gm_url_keywords AS pd_gm_url_keywords,
c.categories_id AS c_categories_id, pd.products_name AS pd_products_name
 
FROM categories c 
LEFT JOIN categories_description cd ON cd.categories_id = c.categories_id
LEFT JOIN products_to_categories ptc ON cd.categories_id = ptc.categories_id 
LEFT JOIN products_description pd ON ptc.products_id = pd.products_id
LEFT JOIN categories_description cd1 ON c.parent_id = cd1.categories_id
WHERE c.parent_id <> 0
AND c.categories_id ='$id'




");
    echo '<option selected="selected">--wahlen--</option>';
		while ($row = mysql_fetch_array($sql)) {
				$id = $row['c_categories_id'];
				$data = $row['pd_products_name'];
				echo '<option value="http://www.tintenpatronen-toner-24.de/'.$row['cd1_gm_url_keywords'].'/'.$row['cd_gm_url_keywords'].'/'.$row['pd_gm_url_keywords'].'.html'.'">'.$data.'</option>';
		}
}
?>