<?php

session_start();

require 'controller/Location.php';
require 'controller/CommandRcon.php';

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'ListPlayer';
      echo json_encode(GlistToJson());
      break;

    default:
      home();
      break;
  }
}else {
  header('Location: /');
}
