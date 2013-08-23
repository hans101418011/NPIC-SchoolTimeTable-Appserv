<?php
	include("_LIB_http/LIB_http.php");
	include("_LIB_http/LIB_parse.php");

	echo "<table border=\"1px\"><tr><td>\n";

	$td_tag_array[$num_td]="55/55/適用101(企管、不動、行銷、商管)、100(企管、不動、休閒、行銷、商管)、99(企管、不動、休閒";
	echo $td_tag_array[$num_td]."\n";
	echo "</td></tr>\n";

	$td_21 = explode("/",$td_tag_array[$num_td]);
	echo "<tr><td>\n";
	echo $td_21[2]."\n";
	echo "</td></tr>\n";
	$td_21_o = str_replace("適用" , ")、" , $td_21[2]);
	$td_21_o .=")";
	echo "<tr><td>\n";
	echo $td_21_o."\n";
	echo "</td></tr>\n";

	echo "<tr><td>\n";
	echo "<pre>\n";
	$td_21_year = parse_array($td_21_o,"\)","\(");
	print_r($td_21_year);
	echo "</pre>\n";
	echo "</td></tr>\n";

	echo "<tr><td>\n";
	echo "<pre>\n";
	$td_21_class = parse_array($td_21_o,"\(","\)");
	print_r($td_21_class);
	echo "</pre>\n";
	echo "</td></tr>\n";

	echo "<tr><td>\n";
	echo "<pre>\n";
	for($h=0;$h<count($td_21_class);$h++)
	{
		$td_21_c[$h] = explode("、",$td_21_class[$h]);
	}
	print_r($td_21_c);
	echo "</pre>\n";
	echo "</td></tr>\n";

	$x=0;
	for($i=0;$i<count($td_21_year);$i++)
	{
		$td_21_year[$i] = str_replace(")、" , "" , $td_21_year[$i]);
		$td_21_year[$i] = str_replace("(" , "" , $td_21_year[$i]);
		for($j=0;$j<count($td_21_c[$i]);$j++)
		{
			$td_21_c[$i][$j] = str_replace(")" , "" , $td_21_c[$i][$j]);
			$td_21_c[$i][$j] = str_replace("(" , "" , $td_21_c[$i][$j]);
			$td_yc[$x++]=$td_21_year[$i].$td_21_c[$i][$j];
		}
	}
	
	echo "<tr><td>\n";
	for($k=0;$k<count($td_yc);$k++)
	{
		echo $td_yc[$k]."<br>\n";
	}
	echo "</td></tr>\n";
	echo "</table>";
?>