<!doctype html>
<html>
<head>
	<title>cURL 3</title>
</head>

<body>
	<?php
		include("_LIB_http/LIB_http.php");
		include("_LIB_http/LIB_parse.php");

		include("config.php");

		// $target = "http://webs3.npic.edu.tw/selectn/search.asp";
		
		// $str=iconv("big5","UTF-8",$str); 
		// mb_convert_encoding ( string $str , string $to_encoding [, mixed $from_encoding ] )

		$target = "http://127.0.0.1/curl/test2_b5.html";
		$web_page = http_get($target,$ref);
		$web_page['FILE']=iconv("big5","UTF-8",$web_page['FILE']); 

		$table_tag_array = parse_array($web_page['FILE'],"<table","</table>");	//擷取table內的內容
		$tr_tag_array = parse_array($table_tag_array[0],"<tr","</tr>");			//擷取tr內的內容，依tr個數編成陣列


		for($num_tr=1;$num_tr<count($tr_tag_array);$num_tr++)		//跑tr陣列的內容
		{
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
						$td_21[2] .=")";									//字串結尾加上再加上括號 (因為有些會缺)
					}
					$td_21_o = str_replace("適用" , ")、" , $td_21[2]);	//將前面分割陣列最後一個內容 適用 這詞取代
					$td_21_year = parse_array($td_21_o,"\)","\(");		//擷取多個右括和左刮中的入學年存為陣列(反斜線是因為正規表達式)
					$td_21_class = parse_array($td_21_o,"\(","\)");		//擷取多個左刮和右括中的系所存為陣列(反斜線是因為正規表達式)
					for($h=0;$h<count($td_21_class);$h++)				//跑迴圈
					{
						$td_21_c[$h] = explode("、",$td_21_class[$h]);	//分割系所
					}
					$x=0;
					for($i=0;$i<count($td_21_year);$i++)				
					{
						$td_21_year[$i] = str_replace(")、" , "" , $td_21_year[$i]);	//將用來分割的字串刪掉
						$td_21_year[$i] = str_replace("(" , "" , $td_21_year[$i]);		//將用來分割的字串刪掉
						for($j=0;$j<count($td_21_c[$i]);$j++)
						{
							$td_21_c[$i][$j] = str_replace(")" , "" , $td_21_c[$i][$j]);	//將用來分割的字串刪掉
							$td_21_c[$i][$j] = str_replace("(" , "" , $td_21_c[$i][$j]);	//將用來分割的字串刪掉
							$td_yc[$x++]=$td_21_year[$i].$td_21_c[$i][$j];			//新創陣列將入學年和系所合併
						}
					}
					for($k=0;$k<count($td_yc);$k++)		//印出第21個td處裡過後的內容
					{
						if($k==count($td_yc)-1)
						{
							$td_21_chose.=$td_yc[$k];
						}
						else
						{
							$td_21_chose.=$td_yc[$k].",";
						}
					}

					$td_other = explode(")",$td_21_o);	//印出額外註記
					if($td_other[count($td_other)-1])
					{
						$td_21_chose.="，(".$td_other[count($td_other)-1].")";
					}
				}
				else
				{
					$td_tag_array[$num_td] = str_replace('"' , "\"" , $td_tag_array[$num_td]);
				}
				unset($td_yc);
			}
			$input_data_array = array(
				"sn"=>$td_tag_array[0],
				"name"=>$td_tag_array[1],
				"sort"=>$td_tag_array[2],
				"elective"=>$td_tag_array[3],
				"credit"=>$td_tag_array[4],
				"semester"=>$td_tag_array[5],
				"institution"=>$td_tag_array[6],
				"department"=>$td_tag_array[7],
				"class"=>$td_tag_array[8],
				"teacher"=>$td_tag_array[9],
				"monday"=>$td_tag_array[10],
				"tuesday"=>$td_tag_array[11],
				"wednesday"=>$td_tag_array[12],
				"thursday"=>$td_tag_array[13],
				"friday"=>$td_tag_array[14],
				"saturday"=>$td_tag_array[15],
				"sunday"=>$td_tag_array[16],
				"student"=>$td_tag_array[17],
				"room"=>$td_tag_array[18],
				"web"=>$td_tag_array[19],
				"annex"=>$td_tag_array[20],
				"max"=>$td_21[0],
				"limit"=>$td_21[1],
				"other"=>$td_21[2],
				"chose"=>$td_21_chose);

			echo"<pre>";
			print_r($input_data_array);
			echo"</pre>";

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
				".$input_data_array['credit'].",
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
			mysql_query($sql,$link) or die("寫入錯誤!<br>".mysql_error());

			unset($td_21_chose);
		}

		function Noformat($in_string)
		{
			/*$in_string=str_replace(">" , "" , $in_string);
			$in_string=str_replace("<" , "" , $in_string);*/
			$in_string=str_replace("\t" , "" , $in_string);
			//$in_string=str_replace(" " , "" , $in_string);
			$in_string=str_replace("\r\n" , "" , $in_string);
			$in_string=str_replace("\n" , "" , $in_string);
			return $in_string;
		}
	?>	
</body>
</html>