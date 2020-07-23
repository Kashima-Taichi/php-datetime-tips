<?php


echo "----------";
echo "<br>";

$date = '2015-12'; //本来はformからのリクエストなので動的
$begin = new DateTime(date('Y-m-d', strtotime('first day of '. $date)));
$end = new Datetime(date('Y-m-d', strtotime('first day of next month '. $date)));
echo "<br>";
echo var_dump($end);
echo "<br>";
echo "<br>";
// echo $end->date;
// echo "<br>";
$interval = new DateInterval('P1D');
echo var_dump($interval);
echo "<br>";
echo "<br>";

$daterange = new DatePeriod($begin, $interval, $end);
echo var_dump($daterange);
echo "<br>";
echo "<br>";

foreach($daterange as $date){
    echo $date->format("Y-m-d-w") . "<br>";
}

echo "----------";
echo "<br>";

echo "strtotimeから";
echo "<br>";
echo "参考URL; http://bashalog.c-brains.jp/14/04/02-100000.php";
echo "<br>";
echo "参考URL; https://qiita.com/shuntaro_tamura/items/b7908e6db527e1543837";
echo "<br>";
echo "参考URL; https://www.php.net/manual/ja/datetime.formats.relative.php";
echo "<br>";
echo date("Y-m-d", strtotime("today"));
echo "<br>";
echo date("Y-m-d", strtotime("yesterday"));
echo "<br>";


$interval = new DateInterval('P1D');
echo var_dump($interval);
echo "<br>";



?>