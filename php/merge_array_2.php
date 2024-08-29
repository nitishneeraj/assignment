<?php
function merge_array(array $arr1, array $arr2): array
{
  $length1 = count($arr1);
  $length2 = count($arr2);
  $mergedArray = [];
  for ($i = 0; $i < $length1; $i++) {
    $mergedArray[] = $arr1[$i];
  }
  for ($i = 0; $i < $length2; $i++) {
    $mergedArray[] = $arr2[$i];
  }
  return $mergedArray;
}

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

$f_array = [1, 3, 5, 7];
$s_array = [2, 4, 6, 8];

$mergedArray = merge_array($f_array, $s_array);
$sorted_data = short_data($mergedArray);
foreach ($sorted_data as $data) {
  echo $data . " ";
}