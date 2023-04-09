<?php

function conectarDB() : mysqli {
  $db = new mysqli("localhost", "root", "blondie", "monique_crud");

  if(!$db) {
    echo "No se pudo conectar";
    exit;
  }
  return $db;


}

?>