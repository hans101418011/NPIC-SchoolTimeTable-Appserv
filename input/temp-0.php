<!doctype html>
<html>
<head>
	<title>cURL</title>
</head>
<body>
	<?php
		include("_LIB_http/LIB_http.php");
		include("_LIB_http/LIB_parse.php");
		
		// $target = "http://webs3.npic.edu.tw/selectn/search.asp";
		
		$target = "http://127.0.0.1/curl/input/sample/search.asp";
		$web_page = http_get($target,$ref);

		$select_tag_array = parse_array($web_page['FILE'],"<select","</select>");
	?>
	<?php
	//<pre>
	// $str=iconv("big5","UTF-8",$str); 
	// mb_convert_encoding ( string $str , string $to_encoding [, mixed $from_encoding ] )
		for($yy=0;$yy<count($select_tag_array);$yy++)
		{
			$name = get_attribute($select_tag_array[$yy],$attribute="name");
			$name = Noformat($name);
			echo $name."<br /> \n";

			$option_tag_array = parse_array($select_tag_array[$yy],">","<");
			for($xx=0;$xx<count($option_tag_array);$xx++)
			{
				$option_tag_array[$xx] = Noformat($option_tag_array[$xx]);
				if(strlen($option_tag_array[$xx])>0)
				{
					echo $option_tag_array[$xx]." - ".$xx."<br /> \n";
				}
			}

		}

		function Noformat($in_string)
		{
			$in_string=str_replace(">" , "" , $in_string);
			$in_string=str_replace("<" , "" , $in_string);
			$in_string=str_replace("\t" , "" , $in_string);
			$in_string=str_replace(" " , "" , $in_string);
			$in_string=str_replace("\r\n" , "" , $in_string);
			$in_string=str_replace("\n" , "" , $in_string);
			return $in_string;
		}
	//</pre>
	?>	
</body>
</html>