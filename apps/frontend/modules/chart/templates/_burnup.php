<?php
$num = count($points);

foreach ($points as $date => $point) {
    $axis[] = rand(0,30);
}
$axis_str = implode(',', $axis);

// Calculate the max on the table
$max = max($axis);
$max += $max / 2;



$url = 'http://chart.apis.google.com/chart?chxr=0,0,' . $max . '&chxt=y';
$url .= '&chs=610x300&cht=lc&chco=0099FF&chds=0,1000&chd=t:' . $axis_str;
$url .= '&chg=14.3,-1,1,1&chls=2,4,0&chm=B,D4EDFD,0,0,0'

?>
<img id="chart_burnup" src="<?php echo $url; ?>" alt="Wings over time" />
