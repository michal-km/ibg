<?php
function getInstagramFeed() {
  $images = [];
  try {
    $file = file_get_contents("https://preview.wgrygranie.pl/js/instatest.json"); // https://www.instagram.com/internationalbeautygroup/?__a=1&__d=dis
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
 return $images;
}

function instagramFeed() {
  $feed = getInstagramFeed();
  print "        <div id=\"footer-images\">\n";
  foreach ($feed as $image) {
    print "          <div class=\"footer-block\">\n";  
    print "          <a href=\"".$image['link']."\"><img src=\"src/_parts/image.php?url=".rawurlencode($image['image'])."\" /></a>\n";  
    print "          </div>\n";  
  }
  print "        </div>\n";
}