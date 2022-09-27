<?php

$file = file_get_contents("https://preview.wgrygranie.pl/js/instatest.json");
$data = json_decode($file);
$graphQL = $data->graphql->user->edge_owner_to_timeline_media;
print_r ($graphQL);