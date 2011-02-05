<?php
$max = 5;

$width = 1000;

$num = count($points);

var_dump($points);

foreach ($points as $date => $point) {
    $axis[] = $point;
}

$max = max($axis);

$axis_str = implode(',', $axis);

$url = 'http://chart.apis.google.com/chart?chxr=0,0,' . $max . '&chxt=y&chs=1000x225';
$url .= '&cht=lc&chco=3D7930,FF9900&chd=t:' . $axis_str .'&chg=14.3,-1,1,1';
$url .- '&chls=5,4,0|1&chm=B,C5D4B5BB,0,0,0&chtt=wings+over+time';
?>
<img src="<?php echo $url; ?>" alt="Wings over time" />
