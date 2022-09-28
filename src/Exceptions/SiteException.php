<?php
namespace IBG\Exceptions;

use Exception;

class SiteException extends Exception {
  public function __construct($message = '', $code = 0, Throwable $previous = null) {
    if (!isset($_SESSION['site_messages'])) {
      $_SESSION['site_messages'] = [];
    }
    $_SESSION['site_messages'][] = $message;
    parent::__construct ($message, $code, $previous);
  }
}