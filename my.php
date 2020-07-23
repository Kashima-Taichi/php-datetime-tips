<?

$weekdays = ["日", "月", "火", "水", "木", "金", "土"];
$date = '2020-4'; //本来はformからのリクエストなので動的
$begin = new DateTime(date('Y-m-d', strtotime('first day of '. $date)));
$end = new Datetime(date('Y-m-d', strtotime('first day of next month '. $date)));
$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval, $end);
foreach($daterange as $date){
    // Function name must be a string 
    // $weekdays[ 原因はこのドル→ $date("w", $date->format("Y-m-d"))]
    echo $date->format("Y-m-d") . " / " . $weekdays[date("w", strtotime($date->format("Y-m-d")))] . "<br>";
}

// $weekdays[$date("w", $date->format("Y-m-d"))]

echo "<br>";
echo "<br>";
echo var_dump($begin);
echo "<br>";
echo "<br>";
echo var_dump($end);
echo "<br>";
echo "<br>";
echo var_dump($interval);
echo "<br>";
echo "<br>";
echo var_dump($daterange);
