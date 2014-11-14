<?php

include 'Damm.php';

$tester = new Damm;
$number = mt_rand(100000, 999999);

$numberToStore = $tester->prepare($number);

echo "Generated number: $number\n";

if ($tester->validate($numberToStore))
{
    echo 'OK';
}
else
{
    echo 'Not OK';
}

echo "\n\n";
