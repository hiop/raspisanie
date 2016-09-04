<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keywords" content="jquery, css3, sliding, ugatu, neftekamsk"/>

<link rel="stylesheet" href="../slideshow/mainssh.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
<title>УГАТУ</title>


<style>
.st_div{
vertical-align:middle;
width:800px;
height:50px;
background:#FFFFF0; 
border: 1px #000 solid;
text-align: left;

}

.window{
margin: -1px;
vertical-align:middle;
width:800px;
height:50px;
background:#FFFFFF;
border: 1px #000 solid;
text-align: center;
}

.number{
vertical-align:middle;
width:15px;
text-align: center;
float:left;
}

.time{
vertical-align:middle;
width:100px;
height:50px;
text-align:center;
float:left;text-align:center;
background:#FFFACD;
margin:-7px 0 0 0;
}



body {
font-family: Verdana, Geneva, sans-serif;
color:#494949;
font-size:15px;
height:100%;margin:0;background: url('../images/bg.png') repeat;
overflow-y: scroll;
}

.inmenu_button
{
height:30px;
padding:5px;
text-align:center;

}

#main h2{ text-align: center }
#main div{padding:7px;}
#test div{padding:0px;}
p{text-indent: 1.5em;}




#container
{
width:900px;
height: auto;
margin: 0 auto;
}

#head,#main,#foot
{
margin-bottom:5px;
padding:7px;


}

#head
{

height:140px;
font-size:30px;
text-decoration: none;
 //background-image: url(images/head.png);
}

#head a img {border: none;}

#main
{
margin-top:5px;
background:#FFF;
box-shadow: 0 0 15px rgba(0,0,0,0.5);
}
#foot
{
height:35px;
background:#FFF;
box-shadow: 0 0 15px rgba(0,0,0,0.5);
}


span.reference{
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:12px;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				text-shadow:1px 1px 1px #000;
				margin-right:30px;
			}
			span.reference a:hover{
				color:#ddd;
			}
			ul.sdt_menu{
			}


</style>
</head>
<body>

<div id="container">

<div id="head">
<a href="../" ><img src="../images/head.png" ></a>
</div>

<div id="main">

<div align="center">
 <form action="index.php">
 Курс <input name="kurs" size="1" maxlength="1"
 type="text" value="<?php echo $_GET['kurs']?>"/>
Направление <select name="prof">
 <?PHP
 
$profArr["D"]="МАН-";
$profArr["E"]="ЭЭНН-";
$profArr["F"]="ИВТН-";
$profArr["G"]="ГМУН-";

$keys = array_keys($profArr);

for($i=0;$i<4;$i++)
{
//$profArr[$keys[$i]][strlen($profArr[$keys[$i]])-1] = '';



	if(isset($_GET['prof']))
	{
		if($keys[$i] == $_GET['prof'])
		{
			echo '<option selected value="'.$keys[$i].'">'.mb_substr($profArr[$keys[$i]], 0, -1).'</option>';
		}else
			{
				echo '<option value="'.$keys[$i].'">'.mb_substr($profArr[$keys[$i]], 0, -1).'</option>';
			}
		
	}else
		{
			echo '<option value="'.$keys[$i].'">'.mb_substr($profArr[$keys[$i]], 0, -1).'</option>';
		}
}
 ?>
<!--
  <option value="D">МАН</option>
  <option value="E">ЭЭНН</option>
  <option value="F">ИВТН</option>
  <option value="G">ГМУН</option>
  -->
</select>

 Неделя <input name="w" size="2" maxlength="2"
 type="text" value="0" disabled/>
 <input type="submit" value="Посмотреть" />
 </form>

 <?php
 $summ=0; //kol-vo par
 $days=0;//uchebnih dney
 if($_GET['kurs'] == 1)
 {
	echo '<div align="center"><a href="./xlsdoc/rasp_1.xls">Скачать расписание занятий I курса</a></div>';
 }elseif($_GET['kurs'] == 2)
		{
			echo '<div align="center"><a href="./xlsdoc/rasp_2.xls">Скачать расписание занятий II курса</a></div>';
		}elseif($_GET['kurs'] == 3)
				{
					echo '<div align="center"><a href="./xlsdoc/rasp_3.xls">Скачать расписание занятий III курса</a></div>';
				}
 ?>
<!--<h3 style="background:red;color:#fff"> Расписание на 18-ю неделю неточное и скорее всего ИЗМЕНИТСЯ!</h3>-->

</div>

<div align="center">
<?php
//exit();
if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
{
    /**
     * mb_ucfirst - преобразует первый символ в верхний регистр
     * @param string $str - строка
     * @param string $encoding - кодировка, по-умолчанию UTF-8
     * @return string
     */
    function mb_ucfirst($str, $encoding='UTF-8')
    {
        $str = mb_ereg_replace('^[\ ]+', '', $str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
               mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;
    }
}
/*
$profArr["D"]="МАН-";
$profArr["E"]="ЭЭНН-";
$profArr["F"]="ИВТН-";
$profArr["G"]="ГМУН-";
*/

if($_GET['kurs'] AND $_GET['prof'])
{
if (!file_exists("./xlsdoc/rasp_".$_GET['kurs'].".xls")) {
	exit("<div>Расписание отсутствует.</div><img src='./justus.jpg'/>\n");
}

if($_GET['prof'] != 'D' AND $_GET['prof'] != 'E' AND $_GET['prof'] != 'F' AND $_GET['prof'] != 'G')
{
	exit("Извините, но для этого Направления нет раписания.");
}

require_once('../lib/PHPExcel.php');
$objReader = new PHPExcel_Reader_Excel5();
$objPHPExcel = $objReader->load("./xlsdoc/rasp_".$_GET['kurs'].".xls");
$all_sheets = $objPHPExcel->getSheetCount()-1;
//echo date('z');
//$week_now = floor(date('z')/9.06);
	/*if(is_numeric($_GET['w']) AND $_GET['w']!=0){
		$all_sheets =$all_sheets-$_GET['w'];
		if($all_sheets < 0){
			$all_sheets=0;
		}
	}else{
			$all_sheets=0;
		 }*/
		 
$all_sheets=0;
$objPHPExcel->setActiveSheetIndex($all_sheets);
$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow();

$row = 1;
$lastColumn = $objWorksheet->getHighestColumn();
$lastRow = $objWorksheet->getHighestRow();
$lastColumn++;
$lastRow++;

for ($row = 1; $row != $lastRow; $row++)
		{
	for ($column = 'A'; $column != $lastColumn; $column++)
	{
		
			$cell = $objWorksheet->getCell($column.$row);
			if(substr_count($cell, $profArr[$_GET['prof']])!= false)
			{
				$gRow = $row;
				//$gRow;
				$gColumn = $column;
			}
			
			if($cell == "д/н")
			{
				$dRow = $row;
				$dRow ++;
				$dColumn = $column;
			}
			
			if($cell == "время")
			{
				$tRow = $row;
				$tColumn = $column;
			
			}
			
			if(substr_count($cell, "диспетчер"))
			{
				$stopRow = $row;
				$stopColumn = $column;
			}
			
			
			
		}

	}
	
if(!empty($gRow) OR !empty($gColumn))
{
//echo '<h1>'.$objWorksheet->getCell("B"."B").'</h1>';

echo '<h1>'.$objWorksheet->getCell($gColumn.$gRow).'</h1>';

$gRow++;
$tRow++;
//echo $stopRow.$stopColumn;
$mode='table';
	if($mode == 'table')
	{
		$k=1;
		for($i=0;$i<100;$i++){

			if($stopRow==$dRow+$i)
			{break;}
			
			$space = $objWorksheet->getCell($dColumn.($dRow+$i))->getValue();

			
			$time = $objWorksheet->getCell($tColumn.($tRow+$i))->getValue();
				if(strlen($space)>0)
				{
					echo "<h2>",mb_ucfirst($space),"</h2>","\n";
					$days++;
					$k=1;
					
				}

			$cell = $objWorksheet->getCell($gColumn.($gRow+$i));

			$objWorksheet->mergedCellsRange = $objWorksheet->getMergeCells();
			foreach($objWorksheet->mergedCellsRange as $currMergedRange) {
				if($cell->isInRange($currMergedRange)) 
				{
						$currMergedCellsArray = PHPExcel_Cell::splitRange($currMergedRange);
						$cell = $objWorksheet->getCell($currMergedCellsArray[0][0]);
						break;
					}
				}

			if(strlen($cell)>0){
			$summ++;
				echo "<div class='st_div'>","<div class='number'>",$k,"</div>","<div class='time'>",$time,"</div>",$cell,"</div>","\n";
			}
			else
				{
				echo "<div class='window'>","</div>","\n";
				}
				
				$k++;
		}
	}elseif($mode=='text')
		{
			$k=1;
		for($i=0;$i<100;$i++){

			if($stopRow==$dRow+$i)
			{break;}
			
			$space = $objWorksheet->getCell($dColumn.($dRow+$i))->getValue();

			
			$time = $objWorksheet->getCell($tColumn.($tRow+$i))->getValue();
				if(strlen($space)>0)
				{
					echo mb_ucfirst($space),"<br><br>";
					$days++;
					$k=1;
				}

			$cell = $objWorksheet->getCell($gColumn.($gRow+$i));

			$objWorksheet->mergedCellsRange = $objWorksheet->getMergeCells();
			foreach($objWorksheet->mergedCellsRange as $currMergedRange) {
				if($cell->isInRange($currMergedRange)) 
				{
						$currMergedCellsArray = PHPExcel_Cell::splitRange($currMergedRange);
						$cell = $objWorksheet->getCell($currMergedCellsArray[0][0]);
						break;
					}
				}

			if(strlen($cell)>0){
			$summ++;
				echo "<div class='st_div'>","<div class='number'>",$k,"</div>","<div class='time'>",$time,"</div>",$cell,"</div>","\n";
			}
			else
				{
				echo "<div class='window'>","</div>","\n";
				}
				
				$k++;
		}
		}
		
	}else{exit("Извините, но для этого Направления нет раписания.");}
	}else{exit("В запросе отсутствует часть данных.\n");}

$objPHPExcel->disconnectWorksheets(); //Закрываем файл прайслиста
unset($objPHPExcel);

$fday = round($summ/$days);



//echo $stop-$start;

//echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB";
?>

</div>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["gauge"]});
      google.setOnLoadCallback(drawChart);

	  
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Пары', 0]
        ]);

        var options = {
          width: 400, 
		  height: 200,
          redFrom: 6, redTo: 7,
          yellowFrom:4, yellowTo: 6,

          minorTicks: 5,majorTicks: [0,1,2,3,4,5,6,7],
		  min:0,max:7
		  
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

		data.setValue(0, 1, 
		<?php
			echo round($summ/$days,2);
		?>);  
		chart.draw(data, options);
		

    
      }
    </script>
<center id="test">
<h2>Загруженность на этой неделе</h2>
<h3>Пар в день: <?php echo round($summ/$days,2);?></h3>
<div id="chart_div" style="width: 400px; height: 200px;"></div>
<div id="description">Описание: "<?php	
		$daydiscription[0] = "Спим крч";
		$daydiscription[1] = "Халява";
		$daydiscription[2] = "Халява";
		$daydiscription[3] = "Может без обеда?";
		$daydiscription[4] = "Домой в 15:40 ;(";
		$daydiscription[5] = "Может с 5-й отпустит?";
		$daydiscription[6] = "АПОКАЛИПСИС!!!";
		$daydiscription[7] = "В УНИВЕРЕ МОЖНО ОСТАТЬСЯ СПАТЬ!!!";
echo $daydiscription[$fday];?>"</div>
</center>
</div>


<div id="foot"><p align="center">©2013 - <?php echo date("Y"); ?> <a href="https://vk.com/id114162174"/>by HioP</a></p></div>
</div>
</tr></table>

</body>
</html>