<?php
   $registros;
   $max = 0;

   if (isset($_GET['pozo'])) {
      $registros = obtenerRegistrosPozo($_GET['pozo']);

      foreach ($registros as $reg) {
         if ($reg['medicion'] > $max) {
            $max = $reg['medicion'];
         }
      }
   }
?>

<div class="col">
   <div class="card">
      <h5>Histórico de mediciones</h5>

      <div class="card-body">
         <div class="contenedor-grafica">
            <?php if (isset($_GET['pozo'])) : ?>
               <?php if ($registros->num_rows > 0) : ?>
                  <?php foreach ($registros as $registro) : ?>
                     <div class="barra">
                        <p class="data mb-0">
                           <span class="text-primary me-1">
                              <?= $registro['medicion'] ?>
                           </span> - <?= date_format(date_create($registro['fecha']), "d/m/Y") ?>
                        </p>

                        <div class="contenedor-barra" title="<?= $registro['medicion'] ?>">
                           <?php $porcentaje = ($registro['medicion'] / $max) * 100 ?>
                           <div class="porcentaje" style="width: <?= $porcentaje ?>%;"></div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               <?php else : ?>
                     <div class="lista-vacia">
                        No hay registros para mostrar...
                     </div>
               <?php endif; ?>
            <?php else : ?>
                  <div class="lista-vacia">
                     Seleccione un pozo para visualizar sus registros
                  </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
</div>