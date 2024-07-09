<?php
require_once('controllers/baseController.php');

class dashboardController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function index()
  {
    $this->render('dashboard');
  }

 
}