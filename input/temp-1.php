<!doctype html>
<html>
<head>
	<title>cURL 2</title>
</head>


<body>
	<?php
		include("_LIB_http/LIB_http.php");
		include("_LIB_http/LIB_parse.php");
		
		// $target = "http://webs3.npic.edu.tw/selectn/search.asp";
		
		// $str=iconv("big5","UTF-8",$str); 
		// mb_convert_encoding ( string $str , string $to_encoding [, mixed $from_encoding ] )

		$target = "http://127.0.0.1/curl/input/sample/test_b5.html";
		$web_page = http_get($target,$ref);
		$web_page['FILE']=iconv("big5","UTF-8",$web_page['FILE']); 

		$table_tag_array = parse_array($web_page['FILE'],"<table","</table>");
		$tr_tag_array = parse_array($table_tag_array[0],"<tr","</tr>");

		for($num_tr=0;$num_tr<count($tr_tag_array);$num_tr++)
		{
			echo "<div>".$num_tr." ";
			$td_tag_array = parse_array($tr_tag_array[$num_tr],"<td>","</td>");

			for($num_td=0;$num_td<22;$num_td++)
			{
				$td_tag_array[$num_td]=str_replace("<TD>" , "" , $td_tag_array[$num_td]);
				$td_tag_array[$num_td]=str_replace("</TD>" , "" , $td_tag_array[$num_td]);
				$td_tag_array[$num_td]=Noformat($td_tag_array[$num_td]);

				if($num_td==21)
				{
					$td_21 = explode("/",$td_tag_array[$num_td]);
					echo $td_21[0]."-".$td_21[1]."-".$td_21[2];
				}
				else
				{
					echo $td_tag_array[$num_td]." ";
				}
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
	//</pre>
	?>	
</body>
</html>