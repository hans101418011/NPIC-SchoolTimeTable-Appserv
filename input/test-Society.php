<?php
	$string = "60/100/102/11/1-103/1/31";
	$td_21 = explode("/",$string);

	for($td21_society=3;$td21_society<count($td_21);$td21_society++)
	{
		$td_21[2].="/".$td_21[$td21_society];
	}
	

	echo $td_21[2];
?>