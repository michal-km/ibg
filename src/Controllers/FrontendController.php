<?php
namespace IBG\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use IBG\Controllers\Controller;
use IBG\Controllers\InstagramController;

class FrontendController extends Controller {

  protected function getVariables() {
    $variables = [];
    $variables['messages'] = $_SESSION['site_messages'];
    $_SESSION['site_messages'] = [];
    $variables['instagram'] = [
      'feed' => InstagramController::getInstance()->getFeed(),
    ];
    return $variables;
  }

  public function getFrontPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'   => 'International Beauty Group',
      'classes' => 'front',
    ];
    return $view->render($response, 'index.html.twig', $variables);
  }

  public function getJobsPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'   => 'International Beauty Group',
      'classes' => 'not-front jobs',
    ];
    return $view->render($response, 'jobs.html.twig', $variables);
  }

  public function getContactPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'   => 'International Beauty Group',
      'classes' => 'not-front contact',
    ];
    return $view->render($response, 'contact.html.twig', $variables);
  }

  public function getBrandsPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'   => 'International Beauty Group',
      'classes' => 'not-front brands',
    ];
    return $view->render($response, 'brands.html.twig', $variables);
  }

  public function getPlatformsPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'   => 'International Beauty Group',
      'classes' => 'not-front platforms',
    ];
    return $view->render($response, 'platforms.html.twig', $variables);
  }

  public function getDistributionPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'   => 'International Beauty Group',
      'classes' => 'not-front distribution',
    ];
    return $view->render($response, 'distribution.html.twig', $variables);
  }

  public function formProcessorPage(Request $request, Response $response, $params) {
    $formController = ContactFormController::getInstance();
    try {
      $formController->sendMessage($params);
      return $response
        ->withHeader('Location', 'message-sent')
        ->withStatus(302);
    }
    catch (\Exception $e) {
      return $response
      ->withHeader('Location', 'contact')
      ->withStatus(302);
    }
  }

  public function getMessageSentPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'       => 'International Beauty Group - Message Sent',
      'description' => '',
      'classes'     => 'not-front message-sent',
      'noindex'     => true,
    ];
    return $view->render($response, 'message-sent.html.twig', $variables);
  }

  public function getLoginPage(Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $variables = $this->getVariables();
    $variables['page'] = [
      'title'       => 'International Beauty Group - Login',
      'description' => '',
      'classes'     => 'not-front login',
      'noindex'     => true,
    ];
    return $view->render($response, 'login.html.twig', $variables);
  }
  
}
