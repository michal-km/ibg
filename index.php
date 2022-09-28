<?php
namespace IBG;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Slim\Factory\AppFactory;
use IBG\Controllers\FrontendController;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$twig = Twig::create('templates', ['cache' => false]);
$app->addRoutingMiddleware();
$app->add(TwigMiddleware::create($app, $twig));

/**
* Add Error Middleware
*
* @param bool                  $displayErrorDetails -> Should be set to false in production
* @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
* @param bool                  $logErrorDetails -> Display error details in error log
* @param LoggerInterface|null  $logger -> Optional PSR-3 Logger
*
* Note: This middleware should be added last. It will not handle any exceptions/errors
* for middleware added after it.
*/
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
  $controller = FrontendController::getInstance();
  return $controller->getFrontPage($request, $response, $args);
});

$app->get('/jobs', function (Request $request, Response $response, $args) {
  $controller = FrontendController::getInstance();
  return $controller->getJobsPage($request, $response, $args);
});

$app->get('/contact', function (Request $request, Response $response, $args) {
  $controller = FrontendController::getInstance();
  return $controller->getContactPage($request, $response, $args);
});

$app->get('/brands', function (Request $request, Response $response, $args) {
  $controller = FrontendController::getInstance();
  return $controller->getBrandsPage($request, $response, $args);
});

$app->get('/platforms', function (Request $request, Response $response, $args) {
  $controller = FrontendController::getInstance();
  return $controller->getPlatformsPage($request, $response, $args);
});

$app->get('/distribution', function (Request $request, Response $response, $args) {
  $controller = FrontendController::getInstance();
  return $controller->getDistributionPage($request, $response, $args);
});

$app->post('/send-message', function (Request $request, Response $response, $args) {
  $controller = FrontendController::getInstance();
  return $controller->formProcessorPage($request, $response, $args);
});

$app->run();
