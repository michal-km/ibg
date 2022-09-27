<?php

$file = file_get_contents("https://preview.wgrygranie.pl/js/instatest.json");
$data = json_decode($file, true);
print_r ($data);