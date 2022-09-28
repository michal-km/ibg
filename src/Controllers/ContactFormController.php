<?php

namespace IBG\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use IBG\Controllers\Controller;
use IBG\Exceptions\SiteException;

class ContactFormController extends Controller {

  private $params;

  private function getParam($name) {
    if (empty($this->params[$name])) {
      throw new SiteException("Missing ".$name." field.");
    }
    return $this->params[$name];
  }

  private function checkString($name) {
    $value = $this->getParam($name);
    $value = filter_var(trim($value), FILTER_SANITIZE_STRING);
    if (empty($value)) {
     throw new SiteException("Field \"".$name."\" cannot be empty."); 
    }
    return $value;
  }

  private function checkEmail($name) {
    $value = $this->checkString($name);
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      throw new SiteException("Invalid email format.");
    }
    return $value;
  }

  private function sendMail($name, $surname, $subject, $message, $email) {
    $to      = 'michal.kazmierczak@wgrygranie.pl';
    $headers = 'From: '.$name.' '.$surname."\r\n" .
      'Reply-To: '.$email. "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    if (!mail($to, $subject, $message, $headers))
    {
     throw new SiteException("Mail not sent.");
    }
  }
  
  public function sendMessage ($params) {
    if (empty($params)) {
      throw new SiteException("Form values are empty.");
    }
    $this->params = $params;
    $name = $this->checkString('name');
    $surname = $this->checkString('surname');
    $subject = $this->checkString('subject');
    $message = $this->checkString('message');
    $email = $this->checkString('email');
    $this->sendMail($name, $surname, $subject, $message, $email);
  }
}