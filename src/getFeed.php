<?php
header('Content-Type: application/json; charset=utf-8');
$images = [];
try {
  $file = file_get_contents("https://preview.wgrygranie.pl/js/instatest.json");
  $data = json_decode($file);
  $graphQL = $data->graphql->user->edge_owner_to_timeline_media->edges;
  foreach ($graphQL as $edge) {
      if ($edge->node->__typename == "GraphImage") {
          $shortCode = $edge->node->shortcode;
          $displayURL = $edge->node->display_url;
          $images[] = [
                       'image' => $displayURL,
                       'link'  => 'https://www.instagram.com/p/'.$shortCode.'/',
                      ];
      }
  }
}
catch (\Exception $e) {
}
$json = json_encode($images);
print $json;