<?php
$greeting = 'Hello World!';
echo "$greeting";

echo '<br /><br />';

const NAME = 'Creighton';
echo 'Hello ' . NAME . '!';
echo '<br /><br />';

$test = [0,1,2,3,4,5];
$trial1 = $test | array_pop();
echo $trial1;