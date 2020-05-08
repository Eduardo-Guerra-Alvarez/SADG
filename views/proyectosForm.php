<!-- Boton para abrir formulario -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#P<?= str_replace(' ', '',$cliente['nombre'].$cliente['apellidos']) ?>">
  <span class="fas fa-drafting-compass"></span>
</button>

<!-- Modal -->
<div class="modal fade" data-toggle="modal" id="P<?= str_replace(' ', '',$cliente['nombre'].$cliente['apellidos']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Crear Proyecto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Formulario de Proyectos-->
        <form action="../controllers/addProyecto.php" method="POST">
                <div class="form-groupl">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" autofocus required>
                </div>
                <div class="form-groupl">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" required min="<?php echo date('Y/m/d')?>">
                </div>
                <div class="form-groupl">
                    <label for="fecha_final">Fecha Final</label>
                    <input type="date" name="fecha_final" class="form-control" required min="min=<?php $hoy=date("Y-m-d"); echo $hoy;?>">
                </div>
                <div class="form-groupl">
                    <label for="coste">Costo</label>
                    <input type="text" name="coste" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                </div>
                <input type="hidden" name="id_cliente" value="<?= $cliente['id']; ?>">
                <div class="form-groupl pt-3">
                    <button type="submit" class="btn btn-aqua"><span class="fas fa-user-plus"></span> Agregar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-user-times"></span> Cancelar</button>
                </div>
        </form> <!--Fin formulario-->
      </div>
    </div>
  </div>
</div>
