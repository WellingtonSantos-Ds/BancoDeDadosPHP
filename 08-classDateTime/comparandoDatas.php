<?php

$date1 = new DateTime('2020-1-1');
$date2 = new DateTime('2020-1-3');

if($date1 > $date2)
{
  echo 'Date1 é mair que Date2';
}
else
{
  echo 'Date2 é maior que Date1';
}