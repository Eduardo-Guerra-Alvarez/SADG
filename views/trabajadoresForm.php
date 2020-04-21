<!-- Button trigger modal -->
<button type="button" class="btn btn-aqua" data-toggle="modal" data-target="#exampleModalCenter">
  Agregar Trabajador
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Agregar Trabajador</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controllers/addTrabajadores.php" method="POST">
                <div class="form-groupl">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" autofocus required>
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
                        <option value="">Administrador</option>
                        <option value="">Secretari@</option>
                        <option value="">Gestor de Proyectos</option>
                        <option value="">Diseñador Grafico</option>
                    </select>
                </div>
                <div class="form-groupl pt-3">
                    <button type="submit" class="btn btn-aqua">Agregar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>
