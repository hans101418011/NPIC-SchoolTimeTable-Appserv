<?php
header("Content-type: text/html; charset=utf-8");
include("config.php");

$sql = 'INSERT INTO `npic_ subject`.`subject` (`sn`, `name`, `sort`, `elective`, `credit`, `semester`, `institution`, `department`, `class`, `teacher`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `student`, `room`, `web`, `annex`, `max`, `limit`, `other`, `chose`) VALUES ("040999", "<a href=http://webs7.npic.edu.tw/docin/pdoc.aspx?uid=040896 target=\"_blank\" title=\"課程大綱\">通識課程(生命教育)</a>", "社會", "1必修", "2", "1", "夜四技", "<a href=http://web.ge.npic.edu.tw/bin/home.php target=_blank title=\"系所網站\">通識</a>", "99通識", "<a href=mailto:a73002@gmail.com title=\"研究室館別及號碼：通識中心，Office Hour：週一5-6，電子信箱請按\">陳麗珊</a>", "AB", NULL, NULL, NULL, NULL, NULL, NULL, "56", "N2302", "無", "無", "56", "56", "適用進四(企三、企四、資三、資四)", "進四企三,進四企四,進四資三,進四資四");';
/*
$sql = "INSERT INTO `activity` (`sn`, `location`, `name`, `email`, `cellphone`, `id`, `connect`) VALUES (NULL, ".$location." , ".$connect." , ".$email.", ".$cellphone.", ".$id.", ".$connect.");";
*/
mysql_query($sql,$link) or die("寫入錯誤! ".mysql_error());

?>