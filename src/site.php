<?php
function getInstagramFeed() {
  $images = [];
  try {
    $url = 'https://www.instagram.com/internationalbeautygroup/?__a=1&__d=dis';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0(Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/66.0');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'dnt' => '1',
      'upgrade-insecure-requests' => '1',
      'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36',
      'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
      'sec-fetch-site' => 'none',
      'sec-fetch-mode' => 'navigate',
      'sec-fetch-user' => '?1',
      'sec-fetch-dest' => 'document',
      'accept-language' => 'en-GB,en-US;q=0.9,en;q=0.8',
      'Accept-Encoding' => 'gzip',
    ]);
    
    $file = curl_exec($ch);
    curl_close($ch);
    print_r ($file);
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