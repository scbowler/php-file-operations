<?php

$number = 1220;

setlocale(LC_MONETARY, 'en_US.UTF-8');
$money = money_format('%.2n', $number / 100);

echo "<h1>$money</h1>";
