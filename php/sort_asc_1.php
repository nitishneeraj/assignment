<?php
function short_data($arr)
{
  $length = count($arr);
  for ($i = 0; $i < $length - 1; $i++) {
    for ($j = 0; $j < $length - $i - 1; $j++) {
      if ($arr[$j] > $arr[$j + 1]) {
        $temp = $arr[$j];
        $arr[$j] = $arr[$j + 1];
        $arr[$j + 1] = $temp;
      }
    }
  }
  return $arr;
}

$arr = [64, 34, 25, 12, 22, 11, 90];
$arr_short = short_data($arr);
foreach ($arr_short as $data) {
  echo $data . " ";
}
//print_r($arr_short);