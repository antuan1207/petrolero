<?php

include "../database/db_config.php";

$accion = $_POST['accion'];

if ($accion === 'crear') {
   $medicion = $_POST['medicion'];
   $id_pozo = $_POST['id_pozo'];
   $fecha = $_POST['fecha'];

   try {
      $stmt = $conn->prepare("INSERT INTO registros (medicion, id_pozo, fecha) VALUES (?, ?, ?)");
      $stmt->bind_param('dis', $medicion, $id_pozo, $fecha);
      $stmt->execute();
      
      if ($stmt->affected_rows > 0) {
         $respuesta = array(
            'respuesta' => 'correcto',
            'id_insertado' => $stmt->insert_id,
            'tipo' => $accion,
            'medicion' => $medicion
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

   header("Location: ../index.php?pozo=".$id_pozo);
   die();
}