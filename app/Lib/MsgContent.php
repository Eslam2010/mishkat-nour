<?php


namespace App\Lib;


class MsgContent
{
  public $phone,$email,$content,$name;

  public function __construct($phone,$email,$content,$name)
  {
      $this->email = $email;
      $this->phone = $phone;
      $this->content = $content;
      $this->name = $name;
  }
}
