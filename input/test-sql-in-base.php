<!doctype html>
<html>
<head>
	<title>sql</title>
</head>

<body>
	<?php
		include("../_LIB_http/LIB_http.php");
		include("../_LIB_http/LIB_parse.php");
		include("config.php");
		
		for($i=0;$i<10;$i++)
		{
			$input_data_array = array(
				"sn"=>"s000".$i,
				"name"=>"20",
				"sort"=>"30",
				"elective"=>"40",
				"credit"=>"50",
				"semester"=>"60",
				"institution"=>"70",
				"department"=>"80",
				"class"=>"90",
				"teacher"=>"100",
				"monday"=>"110",
				"tuesday"=>"120",
				"wednesday"=>"130",
				"thursday"=>"140",
				"friday"=>"150",
				"saturday"=>"160",
				"sunday"=>"170",
				"student"=>"180",
				"room"=>"190",
				"web"=>"200",
				"annex"=>"210",
				"max"=>"220",
				"limit"=>"230",
				"other"=>"240",
				"chose"=>"250",
				"user"=>Config_Passwd
			);

			$action = "http://127.0.0.1/curl/input/confidential/test-sql-receive.php";
			$ref = "http://127.0.0.1";
			$method="POST";
			$response = http($target=$action,$ref,$method,$input_data_array,EXCL_HEAD);
			echo($response['FILE']);
		}		
		echo "<p>共".($i)."筆資料input</p>";

	?>	
</body>
</html>