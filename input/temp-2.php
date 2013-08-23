<!doctype html>
<html>
<head>
	<title>cURL 3</title>
</head>

<body>
	<?php
		include("_LIB_http/LIB_http.php");
		include("_LIB_http/LIB_parse.php");
		
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
					echo $td_21[0]." ".$td_21[1]." ";
					$td_21_o = str_replace("適用" , ")、" , $td_21[2]);	//將前面分割陣列最後一個內容 適用 這詞取代

					if(strlen($td_tag_array[$num_td])>=130)
					{
						$td_21_o .=")";									//字串結尾加上再加上括號 (因為有些會缺)
					}
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
							echo $td_yc[$k];
						}
						else
						{
							echo $td_yc[$k].",";
						}
					}

					$td_other = explode(")",$td_21_o);	//印出額外註記
					if($td_other[count($td_other)-1])
					{
						echo "，(".$td_other[count($td_other)-1].")";
					}
				}
				else
				{
					echo $td_tag_array[$num_td]." ";	//印出td內的內容
				}
				unset($td_yc);
			}
			echo "</div>\n";
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