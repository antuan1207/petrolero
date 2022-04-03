<?php include "includes/header.php"; ?>

<div class="container-fluid">
   <div class="row mt-5">
      <div class="col-3 mx-auto">
         <div class="card">
            <h5>Registrar</h5>

            <form class="card-body" method="POST" action="functions/modelo-pozo.php">
               <label for="nombre" class="form-label">Nombre del Pozo</label>

               <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off">

               <input type="hidden" name="accion" value="crear">

               <div class="d-flex justify-content-end mt-2">
                  <button type="submit" class="btn btn-secondary">Crear</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?php include "includes/footer.php"; ?>