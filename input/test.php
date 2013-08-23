<?php

include("_LIB_http/LIB_http.php");
//$action = "http://webs3.npic.edu.tw/selectn/clist.asp";
$action = "http://www.schrenk.com/nostarch/webbots/form_analyzer.php";
//$action = "http://127.0.0.1/curl/LISTING_5_10.php";
$ref = "http://webs3.npic.edu.tw/selectn/search.asp";

$method="POST";

$data_array = array("dept"=>"", "sect"=>"", "grade"=>"", "cscn"=>"", "thname"=>"", "dayinweek"=>"", "selnscode"=>"", "periods"=>"", "room"=>"");

//$data_array["sect"] = "18-資訊工程系";
$data_array["sect"] = "0-通識教育中心";
$data_array["sect"]=iconv("UTF-8","big5",$data_array["sect"]);

$response = http($target=$action,$ref,$method,$data_array,EXCL_HEAD);

echo($response['FILE']);



?>