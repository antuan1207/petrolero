<?php

include "../database/db_config.php";

$accion = $_POST['accion'];

if ($accion === 'crear') {
   $nombre = $_POST['nombre'];

   try {
      $stmt = $conn->prepare("INSERT INTO pozos (nombre) VALUES (?)");
      $stmt->bind_param('s', $nombre);
      $stmt->execute();
      
      if ($stmt->affected_rows > 0) {
         $respuesta = array(
            'respuesta' => 'correcto',
            'id_insertado' => $stmt->insert_id,
            'tipo' => $accion,
            'nombre' => $nombre
         );
      } else {
         $respuesta = array(
            'respuesta' => 'error'
         );
      }

      $stmt->close();
      $conn->close();

   } catch (Exception $e) {
      $respuesta = array(
         'error' => $e->getMessage()
      );
   }

   header("Location: ../index.php");
   die();
}