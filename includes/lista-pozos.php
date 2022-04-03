<?php
   $pozos = obtenerPozos();
?>


<div class="col-3">
   <div class="card">
      <h5>Lista de pozos</h5>

      <div class="card-body">
         <?php foreach ($pozos as $pozo) : ?>
            <a
               href="index.php?pozo=<?= $pozo['id'] ?>"
               class="elemento-lista <?= (isset($_GET['pozo']) && $_GET['pozo'] == $pozo['id']) ? 'activo' : '' ?>"
            >
               <?= $pozo['nombre'] ?>
            </a>
         <?php endforeach; ?>
      </div>
   </div>

   <div class="mt-2 d-flex justify-content-end">
      <?php if (isset($_GET['pozo'])) : ?>
         <a href="nuevo-registro.php?pozo=<?=$_GET['pozo']?>" class="btn btn-secondary">Registrar medición</a>
      <?php endif; ?>

      <a href="nuevo-pozo.php" class="btn btn-secondary">Nuevo pozo</a>
   </div>
</div>