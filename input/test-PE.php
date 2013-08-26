<?php
	include("_LIB_http/LIB_http.php");
	include("_LIB_http/LIB_parse.php");


	$target = "http://127.0.0.1/curl/input/sample/sample-PE.htm";
	$web_page = http_get($target,$ref);
	$web_page['FILE']=iconv("big5","UTF-8",$web_page['FILE']); 



	$table_tag_array = parse_array($web_page['FILE'],"<table","</table>");	//擷取table內的內容
	$tr_tag_array = parse_array($table_tag_array[0],"<tr","</tr>");			//擷取tr內的內容，依tr個數編成陣列

	for($num_tr=1;$num_tr<count($tr_tag_array);$num_tr++)		//跑tr陣列的內容
	{
		echo "<div> ";
		$td_tag_array = parse_array($tr_tag_array[$num_tr],"<td>","</td>");	//將tr內多個td編成陣列

		for($num_td=0;$num_td<22;$num_td++)		//最多21個td
		{
			$td_tag_array[$num_td]=str_replace("<TD>" , "" , $td_tag_array[$num_td]);	//將td標籤去掉
			$td_tag_array[$num_td]=str_replace("</TD>" , "" , $td_tag_array[$num_td]);	
			$td_tag_array[$num_td]=Noformat($td_tag_array[$num_td]);	//將td裡的多餘空白換行等格式去掉

			if($num_td==21)		//額外處理第21個的td內容
			{
				$td_21 = explode("/",$td_tag_array[$num_td]);		//以斜線分割成陣列(3個)
				if(strlen($td_tag_array[$num_td])>=130)
				{
					$td_21_o .=")";									//字串結尾加上再加上括號 (因為有些會缺)
				}

				str_replace('體育' , "" , $td_tag_array[1],$class_PE);
				if($class_PE)
				{
					$td_21_chose = td21_PE(4,$td_21[2]);
				}
				
				echo $td_21[0]." ".$td_21[1]." ".$td_21[2]." ".$td_21_chose;
				unset($td_21_chose);
			}
			else
			{
				
				str_replace('href=http' , "" , $td_tag_array[$num_td],$a);
				if($a)
				{
					$td_tag_array[$num_td]=str_replace('href=http' , 'href="http' , $td_tag_array[$num_td],$a);
					$td_tag_array[$num_td]=str_replace(' target' , '" target' , $td_tag_array[$num_td],$a);
				}
				$td_tag_array[$num_td] = str_replace('"' , "\"" , $td_tag_array[$num_td]);
				echo $td_tag_array[$num_td]." ";	//印出td內的內容
				
			}
		}
		echo "</div>\n";
	}

	function Noformat($in_string)
	{
		$in_string=str_replace("\t" , "" , $in_string);
		$in_string=str_replace("\r\n" , "" , $in_string);
		$in_string=str_replace("\n" , "" , $in_string);
		return $in_string;
	}

	function td21_PE($num_dept,$string)
	{
		if($num_dept==3)
		{
			$x = str_replace("選項" , "" , $string);
			$x = str_replace("進四" , "" , $x);
			$x = parse_array($x,"\(","\)");
			$x = str_replace(")" , "" , $x[0]);
			$x = str_replace("(" , "" , $x);
			$y = explode("、",$x);

			for($num=0;$num<count($y);$num++)
			{
				if($num==count($y)-1)
				{
					$td_21_chose.=$y[$num];;
				}
				else
				{
					$td_21_chose.=$y[$num].",";
				}
			}
		}
		if($num_dept==4)
		{
			str_replace('102' , "" , $string,$grade102);
			if($grade102)
			{
				$x = parse_array($string,"\(","\)");
				$x = str_replace(")" , "" , $x[0]);
				$x = str_replace("(" , "" , $x);
				$x = str_replace('102' , "、" ,$x);
				$y = explode("、",$x);
				for($num=1;$num<count($y);$num++)
				{
					if($num==count($y)-1)
					{
						$td_21_chose.="102".$y[$num];;
					}
					else
					{
						$td_21_chose.="102".$y[$num].",";
					}
				}
			}
		}
		return $td_21_chose;
	}

/*
	$string = "桌球(進四貿一、企一選項)活動中心二樓";
	$x = str_replace("選項" , "" , $string);
	$x = str_replace("進四" , "" , $x);
	$x = parse_array($x,"\(","\)");
	$x = str_replace(")" , "" , $x[0]);
	$x = str_replace("(" , "" , $x);
	$y = explode("、",$x);

	for($num=0;$num<count($y);$num++)
	{
		if($num==count($y)-1)
		{
			$td_21_chose.=$y[$num];;
		}
		else
		{
			$td_21_chose.=$y[$num].",";
		}
	}
	echo $td_21_chose;
*/
?>