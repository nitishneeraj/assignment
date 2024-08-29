<?php

class longest_subString
{
  function larage_substring($s)
  {
    $left = 0;
    $right = 0;
    $set = [];
    $max = 0;

    while ($right < strlen($s)) {
      $c = $s[$right];

      if (!isset($set[$c])) {
        $set[$c] = true;
        $max = max($max, $right - $left + 1);
        $right++;
      } else {
        while ($s[$left] != $c) {
          unset($set[$s[$left]]);
          $left++;
        }
        unset($set[$c]);
        $left++;
      }
    }

    return $max;
  }
}

$word = "abcabcbb";
$longest_subString = new longest_subString();
$result = $longest_subString->larage_substring($word);
echo "The length of the longest substring: " . $result;
