<!-- Boton para abrir formulario -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?= str_replace(' ', '',$trabajador['nombre'].$trabajador['apellidos']) ?>">
  <span class="fas fa-user-edit"></span>
</button>

<!-- Modal -->
<div class="modal fade" data-toggle="modal" id="<?= str_replace(' ', '',$trabajador['nombre'].$trabajador['apellidos']) ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="edit">Editar Trabajador</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Formulario de Trabajadores-->
        <form action="../controllers/updateTrabajador.php" method="POST">
                <input type="hidden" name="id" value="<?= $trabajador['id'] ?>">
                <div class="form-groupl">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required value="<?= $trabajador['nombre'] ?>">
                </div>
                <div class="form-groupl">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" required value="<?= $trabajador['apellidos'] ?>">
                </div>
                <div class="form-groupl">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" required value="<?= $trabajador['direccion'] ?>">
                </div>
                <div class="form-groupl">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" required maxlength="10" value="<?= $trabajador['telefono'] ?>">
                </div>
                <div class="form-groupl">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" class="form-control" required value="<?= $trabajador['correo'] ?>">
                </div>
                <div class="form-groupl">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-groupl">
                    <label for="salario">Salario</label>
                    <input type="number" name="salario" class="form-control" required value="<?= $trabajador['salario'] ?>">
                </div>
                <div class="form-groupl">
                    <label for="rol">Rol</label>
                    <select name="rol" class="form-control">
                    <?php $rol = ['administrador', 'secretaria', 'gestor', 'diseñador'];?>
                    <?php foreach($rol as $roles) : ?>
                      <option value="<?= $roles ?>" <?php if($trabajador['rol'] == $roles) : echo "selected"; endif;?>><?= $roles ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-groupl pt-3">
                    <button type="submit" class="btn btn-aqua"><span class="fas fa-user-plus"></span> Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-user-times"></span> Cancelar </button>
                </div>
        </form> <!--Fin formulario-->
      </div>
    </div>
  </div>
</div>
