<?php

$cfg["DatabaseName"]='e-commerce';
$cfg["DatabaseHost"]='localhost';
$cfg["DatabaseUsername"]='root';
$cfg["DatabasePassword"]='';

$db = new sql($cfg["DatabaseUsername"],$cfg["DatabasePassword"],$cfg["DatabaseName"],$cfg["DatabaseHost"]."");

$ana_id=$_POST["ana_id"];

$category_id=$_POST["ana_id"];
if($ana_id==strval(intval($ana_id))) {
	$category=$db->get_results("select * from category where category_parent='$ana_id' order by category_order",ARRAY_A);
	if(strlen($category)>0) {
		echo '<select name="ana_id" id="ana_id" size="5" class="category">';
		//echo '<option value="">Kategori Seçiniz</option>';
	    foreach ($category as $k) {
	      if($category_id==$k["category_id"]) $selected='selected="selected"';
	      else $selected='';
	       echo '<option '.$selected.' value="'.$k["category_id"].'">'.$k["category_id"].'</option>';
		}
		echo '</select>';
	}
	else echo 'no';
}
?>
