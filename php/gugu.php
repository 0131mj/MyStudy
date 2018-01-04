<?php

$dan = 2;       //시작단
$dan_end = 9;   //끝나는 단
$gob = 1;       //시작하는 곱
$gob_end = 3;   //끝나는 곱
$col = 3;       //줄 수

function product($x, $y)
{
    $result = $x * $y;
    echo $x.'*'.$y.'='.$result.'&emsp;'; // 곱셈 출력
}

while($dan < $dan_end)
{
    for ($j = $gob; $j <= $gob_end; $j++)
    {
        for ($i = $dan; $i < $dan+$col; $i++)
        {
            if($i <= $dan_end)
            {
                product($i, $j);
            }
        }
        echo '<br>';
    }
    echo '<br>';
    $dan = $dan+$col;
}
