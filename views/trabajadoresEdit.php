<!-- Boton para abrir formulario -->
<button id="userId" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editTrabajador">
  <span class="fas fa-user-edit"></span>
</button>

<!-- Modal -->
<div class="modal fade" data-toggle="modal" id="editTrabajador" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="edit"><?= $trabajador['nombre'] ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Formulario de Trabajadores-->
        <form action="../controllers/addTrabajador.php" method="POST">
                <div class="form-groupl">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required >
                </div>
                <div class="form-groupl">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="salario">Salario</label>
                    <input type="number" name="salario" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="rol">Rol</label>
                    <select name="rol" class="form-control">
                        <option value="administrador">Administrador</option>
                        <option value="secretaria">Secretari@</option>
                        <option value="gestor">Gestor de Proyectos</option>
                        <option value="diseñador">Diseñador Grafico</option>
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
