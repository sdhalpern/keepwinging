<?php
$max = 5;

$width = 1000;

$num = count($points);

var_dump($points);

foreach ($points as $date => $point) {
    $axis[] = $point;
}

$max = max($axis);

$max += $max / 2;

$axis_str = implode(',', $axis);
var_dump($axis_str);

$url = 'http://chart.apis.google.com/chart?chf=a,s,00000087&chxr=0,0,' . $max . '&chxt=y&chs=1000x300';
$url .= '&cht=lc&chco=3D7930,FF9900&chd=t:' . $axis_str .'&chg=30,-1,1,1';
$url .- '&chls=5,4,0|1&chm=B,C5D4B5BB,0,0,0&chtt=wings+over+time';
?>
<img src="<?php echo $url; ?>" alt="Wings over time" />
