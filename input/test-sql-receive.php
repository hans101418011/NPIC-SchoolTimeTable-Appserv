<?php
include("config.php");
$x = md5(Config_Passwd);

if(md5($_POST["user"])!=$x)
{
	phpinfo();
}
else
{
	//echo "<p>".$x."<br>".mb_substr($x,10,11,'utf8')."</p>";
	
	$input_data_array = array(
		"sn"=>$_POST["sn"],
		"name"=>$_POST["name"],
		"sort"=>$_POST["sort"],
		"elective"=>$_POST["elective"],
		"credit"=>$_POST["credit"],
		"semester"=>$_POST["semester"],
		"institution"=>$_POST["institution"],
		"department"=>$_POST["department"],
		"class"=>$_POST["class"],
		"teacher"=>$_POST["teacher"],
		"monday"=>$_POST["monday"],
		"tuesday"=>$_POST["tuesday"],
		"wednesday"=>$_POST["wednesday"],
		"thursday"=>$_POST["thursday"],
		"friday"=>$_POST["friday"],
		"saturday"=>$_POST["saturday"],
		"sunday"=>$_POST["sunday"],
		"student"=>$_POST["student"],
		"room"=>$_POST["room"],
		"web"=>$_POST["web"],
		"annex"=>$_POST["annex"],
		"max"=>$_POST["max"],
		"limit"=>$_POST["limit"],
		"other"=>$_POST["other"],
		"chose"=>$_POST["chose"]
	);



	$sql = "INSERT INTO `subject` (
		`sn`, 
		`name`, 
		`sort`, 
		`elective`, 
		`credit`, 
		`semester`, 
		`institution`, 
		`department`, 
		`class`, 
		`teacher`, 
		`monday`, 
		`tuesday`, 
		`wednesday`, 
		`thursday`, 
		`friday`, 
		`saturday`, 
		`sunday`, 
		`student`, 
		`room`, 
		`web`, 
		`annex`, 
		`max`, 
		`limit`, 
		`other`, 
		`chose`
		) VALUES (
		'".$input_data_array['sn']."',
		'".$input_data_array["name"]."',
		'".$input_data_array['sort']."',
		'".$input_data_array['elective']."',
		'".$input_data_array['credit']."',
		'".$input_data_array["semester"]."',
		'".$input_data_array["institution"]."',
		'".$input_data_array["department"]."',
		'".$input_data_array["class"]."',
		'".$input_data_array["teacher"]."',
		'".$input_data_array["monday"]."',
		'".$input_data_array["tuesday"]."',
		'".$input_data_array["wednesday"]."',
		'".$input_data_array["thursday"]."',
		'".$input_data_array["friday"]."',
		'".$input_data_array["saturday"]."',
		'".$input_data_array["sunday"]."',
		'".$input_data_array["student"]."',
		'".$input_data_array["room"]."',
		'".$input_data_array["web"]."',
		'".$input_data_array["annex"]."',
		'".$input_data_array["max"]."',
		'".$input_data_array["limit"]."',
		'".$input_data_array["other"]."',
		'".$input_data_array["chose"]."');";

	mysql_query($sql,$link) or die("<p>寫入錯誤!</p>\n<pre>".mysql_error()."</pre>"); 
}


?>