<?php
    function product($x, $y){
        $result = $x*$y;
        echo $x.'*'.$y.'='.$result.'&emsp;'; // 곱셈 출력
    }

    $loop = 0;

    for ($k=1; $k<4; $k++)
    {
        for ($j=1; $j<4; $j++)
        {
            for ($i = $loop; $i < $loop+3; $i++)
            {
                if($i<8)
                {
                    product($i + 2, $j);
                }
            }
            echo '<br>';
        }
        echo '<br>';
        $loop = $loop+3;
    }
?>
