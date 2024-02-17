<?php
use Thedudeguy\Rcon;

function connect(){
  require 'model/rcon.php';

  $host = 'localhost';                // Server host name or IP
  $port = 25575;                      // Port rcon is listening on
  $password = ''; 		      // rcon.password setting set in server.properties
  $timeout = 3;                       // How long to timeout.

  return new Rcon($host, $port, $password, $timeout);
}

function sendCommand($cmd){
  $rcon = connect();
  if ($rcon->connect())
  {
    return $rcon->sendCommand($cmd);
  }
}
