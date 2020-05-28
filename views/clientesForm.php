<!-- Boton para abrir formulario -->
<button type="button" class="btn btn-aqua btn-shadow" data-toggle="modal" data-target="#exampleModalCenter">
  <span class="fas fa-user-plus"></span> Agregar Cliente
</button>

<!-- Modal -->
<div class="modal fade" data-toggle="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Agregar Cliente</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Formulario de Clientes-->
        <form action="../controllers/addCliente.php" method="POST">
                <div class="form-groupl">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" autofocus required pattern="([A-Za-z]+\s?){1,5}">
                </div>
                <div class="form-groupl">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" required pattern="([A-Za-z]+\s?){1,5}">
                </div>
                <div class="form-groupl">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="direccion">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" required>
                </div>
                <div class="form-groupl">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" required maxlength="10">
                </div>
                <div class="form-groupl">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" class="form-control" required pattern="^[a-zA-Z0-9._-]+@[a-zA-Z]+(\.[a-z]{2,4}){1,3}$">
                </div>
                <div class="form-groupl pt-3">
                    <button type="submit" class="btn btn-aqua"><span class="fas fa-user-plus"></span> Agregar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-user-times"></span> Cancelar</button>
                </div>
        </form> <!--Fin formulario-->
      </div>
    </div>
  </div>
</div>
