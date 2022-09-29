<?php

namespace IBG\Controllers;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\CookieJar;
//use Symfony\Component\Cache\Adapter\FilesystemAdapter;
//use GuzzleHttp\Client;
use IBG\Controllers\Controller;
use Instagram\Api;

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

  /*
  public function getFeed1() : array {
    $cachePool = new FilesystemAdapter('Instagram', 0, __DIR__.'/../cache');
    $client = new Client([
                         'verify' => false,
    ]);
    $api = new Api($cachePool, $client);
    $api->login('mnowakowski5436@gmail.com', 'OrniCanto24');
    $profile = $api->getProfile('internationalbeautygroup');
    $medias = $profile->getMedias();
    print_r ($medias);
    exit;
  }
  */
  
  public function getFeed() : array {
      //$url = 'https://www.instagram.com/internationalbeautygroup/?__a=1&__d=dis';
      $url = 'https://preview.wgrygranie.pl/js/instatest.json';
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