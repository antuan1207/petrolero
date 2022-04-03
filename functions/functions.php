<?php


function obtenerPozos() {
   include 'database/db_config.php';

   try {
      return $conn->query('SELECT * FROM pozos');
   } catch (Exception $e) {
      echo "Error: ".$e->getMessage();
      return false;
   }
}

function obtenerRegistrosPozo($id_pozo) {
   include 'database/db_config.php';
   
   try {
      return $conn->query('SELECT * FROM registros WHERE id_pozo = '.$id_pozo.' ORDER BY fecha');
   } catch (Exception $e) {
      echo "Error: ".$e->getMessage();
      return false;
   }
}