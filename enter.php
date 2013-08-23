<!doctype html>
<?php
	include("config.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>非官方課程查詢系統</title>
		<link href="reset.css" rel="stylesheet" type="text/css" />
		<link href="base.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header>
			<br>
		</header>
		<div id="search">
			<form>
				年制
				<select>
					<option></option>
					<option>產學專班</option>
					<option>碩專班</option>
					<option>日四技</option>
					<option>夜四技</option>
					<option>研究所</option>
				</select>
				系所
				<select>
					<option></option>
					<option>通識教育中心</option>
					<optgroup label="產學專班">
						<option>行銷與流通管理系</option>
					</optgroup>
					<optgroup label="碩專班">
						<option>國際企業研究所</option>
					</optgroup>
					<optgroup label="日四技">
						<option>國際貿易系</option>
						<option>應用日語系</option>
						<option>行銷與流通管理系</option>
						<option>商業自動化與管理系</option>
						<option>電腦與通訊系</option>
						<option>資訊工程系</option>
						<option>企業管理系</option>
						<option>應用英語系</option>
						<option>財務金融系</option>
						<option>會計系</option>
						<option>不動產經營系</option>
						<option>資訊管理系</option>
						<option>休閒事業經營系</option>
					</optgroup>
					<optgroup label="夜四技">
						<option>國際貿易系</option>
						<option>企業管理系</option>
						<option>財務金融系</option>
						<option>資訊管理系</option>
					</optgroup>
					<optgroup label="研究所">
						<option>休閒遊憩與創意產業管理研究所</option>
						<option>國際企業研究所</option>
						<option>經營管理研究所</option>
						<option>企業電子化研究所</option>
						<option>行銷與流通管理研究所</option>
						<option>資訊工程研究所</option>
						<option>財務金融研究所</option>
						<option>資訊管理研究所</option>
						<option>應用英語研究所</option>
						<option>不動產經營研究所</option>
					</optgroup>
				</select>
				年級
				<select>
					<option></option>
					<option value="1">一</option>
					<option value="2">二</option>
					<option value="3">三</option>
					<option value="4">四</option>
				</select>
				<input type="submit" value="查詢">
				<input type="reset" value="清除">
			</form>
		</div>
		<div id="result">
			<div id="table">
				<table>
					<tr>
						<td></td>
						<td>一</td>
						<td>二</td>
						<td>三</td>
						<td>四</td>
						<td>五</td>
						<td>六</td>
						<td>日</td>
					</tr>
					<tr>
						<td>8:10~9:00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>9:10~10:00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>10:10~11:00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>11:10~12:00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>12:20~13:10	</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>13:20~14:10</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>14:20~15:10</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>15:20~16:10</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>16:20~17:10</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>17:20~18:10</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>18:30~19:20</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>19:25~20:15</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>20:20~21:10</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>21:15~22:05</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<div id="chose">
				<form>
					<div id="function">
						<span>全選</span>
						<span>預設值</span>
					</div>
					<fieldset>
						<legend>必修</legend>
						<ul>
							<li><input type="checkbox" name="class[]" value="" checked></li>
							<li><input type="checkbox" name="class[]" value="" checked></li>
							<li><input type="checkbox" name="class[]" value="" checked></li>
							<li><input type="checkbox" name="class[]" value="" checked></li>
							<li><input type="checkbox" name="class[]" value="" checked></li>
							<li><input type="checkbox" name="class[]" value="" checked></li>
						</ul>
					</fieldset>
					<fieldset>
						<legend>選修</legend>
						<ul>
							<li><input type="checkbox" name="class[]" value="" checked></li>
							<li><input type="checkbox" name="class[]" value="" checked></li>
							<li><input type="checkbox" name="class[]" value="" checked></li>
						</ul>
					</fieldset>
					<fieldset>
						<legend>通識</legend>
						<ul>
							<li><input type="checkbox" name="class[]" value=""></li>
							<li><input type="checkbox" name="class[]" value=""></li>
						</ul>
					</fieldset>
					<fieldset>
						<legend>體育</legend>
						<ul>
							<li><input type="checkbox" name="class[]" value=""></li>
							<li><input type="checkbox" name="class[]" value=""></li>
							<li><input type="checkbox" name="class[]" value=""></li>
							<li><input type="checkbox" name="class[]" value=""></li>
						</ul>
					</fieldset>
				</form>
			</div>
			<div id="list">
				<table>
					<thead></thead>
					<tbody>
						<tr>
							<td rowspan="2">通識<br>領域</td>
							<td rowspan="2">課程名稱</td>
							<td rowspan="2">必選修</td>
							<td rowspan="2">學<br>分</td>
							<td rowspan="2">開課<br>年班</td>
							<td rowspan="2">教授</td>
							<td colspan="7">上課時間</td>
							<td rowspan="2">教室</td>
							<td rowspan="2">已修<br>人數</td>
							<td rowspan="2">選課<br>限額</td>
							<td rowspan="2">教學<br>網站</td>
							<td rowspan="2">教學<br>附件</td>
							<td rowspan="2">備註</td>
						</tr>
						<tr>
							<td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td><td>日</td>
						</tr>
						<?php
						$sql = 'SELECT * FROM `subject` LIMIT 0, 50';
						$result = mysql_query($sql,$link);
						while($data=mysql_fetch_assoc($result)):

							//$data['name'] = str_replace("(" , "<br>(" , $data['name']);
						?>
							<tr>
								<td class="sort"><?=$data['sort']?></td>
								<td class="name"><?=$data['name']?></td>
								<td class="elec"><?=$data['elective']?></td>
								<td class="cred"><?=$data['credit']?></td>
								<td class="clas"><?=$data['class']?></td>
								<td class="teac"><?=$data['teacher']?></td>
								<td class="mon"><?=$data['monday']?></td>
								<td class="tue"><?=$data['tuesday']?></td>
								<td class="wed"><?=$data['wednesday']?></td>
								<td class="thu"><?=$data['thursday']?></td>
								<td class="fri"><?=$data['friday']?></td>
								<td class="sat"><?=$data['saturday']?></td>
								<td class="sun"><?=$data['sunday']?></td>
								<td class="room"><?=$data['room']?></td>
								<td class="stud"><?=$data['student']?></td>
								<td class="max"><?=$data['max']?></td>
								<td class="web"><?=$data['web']?></td>
								<td class="anne"><?=$data['annex']?></td>
								<td class="othe"><?=$data['other']?></td>
							</tr>
						<?php
						endwhile;
						?>
					</tbody>
				</table>
			</div>
		</div>
		<footer>
			本站最佳解析度為 1024*768 以上<br />最佳瀏覽器為&nbsp;
			<a href="http://moztw.org/firefox/" title="下載最新Firefox" target="_blank" rel="external">Firefox 3↑</a>&nbsp;
			<a href="http://www.google.com/chrome/" title="下載最新Chrome" target="_blank" rel="external">Chrome 9↑</a>&nbsp;
			<a href="http://www.opera.com/download/" title="下載最新Opera" target="_blank" rel="external">Opera 11↑</a>&nbsp;
			<br />
			Copyright&copy;2013&nbsp;CSIE&nbsp;Hans&nbsp;&nbsp;Some&nbsp;Rights&nbsp;Reserved
		</footer>
	</body>
</html>