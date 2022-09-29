<?php

namespace IBG\Controllers;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\CookieJar;
use IBG\Controllers\Controller;

class InstagramController extends Controller {

  private function parseGraph($data) {
    $images = [];
    $graphQL = $data->graphql->user->edge_owner_to_timeline_media->edges;
    foreach ($graphQL as $edge) {
      if ($edge->node->__typename == "GraphImage") {
        $images[] = [
          'image' => rawurlencode($edge->node->display_url),
          'link'  => 'https://www.instagram.com/p/'.$edge->node->shortcode.'/',
        ];
      }
    }
    return $images;
  }
  
  public function getFeed() : array {
      $url = 'https://www.instagram.com/internationalbeautygroup/?__a=1&__d=dis';
      //$url = 'https://preview.wgrygranie.pl/js/instatest.json';
      $jar = new CookieJar();
      $client = HttpClient::create(
        [
          'headers' => [
            'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-GB,en-US;q=0.9,en;q=0.8',
            'upgrade-insecure-requests' => '1',
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36',
            'connection' => 'keep-alive'
          ],
          'timeout' => 5,
          'verify_peer' => false,
        ]
      );
      $browser = new HttpBrowser($client, null, $jar);
      $browser->request('GET', $url);
      $data = json_decode($browser->getResponse()->getContent());
      return $this->parseGraph($data);
  }
}