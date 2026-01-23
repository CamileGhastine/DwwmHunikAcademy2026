<?php

// Exercice 1
// 1)

$data = ['John', 'rouge', 22, false];

var_dump($data);
echo '<br>';

// )
echo $data[1];
echo '<br>';

// 3)
$data[] = 12.3;
var_dump($data);
echo '<br>';

// 4)
$data[10] = "chat";
var_dump($data);
echo '<br>';

// 5)
$data[1] = 112;
var_dump($data);
echo '<br>';

// 6) John a 112 chat
echo $data[0] . ' a ' .$data[1] . ' ' . $data[10] .'s';
