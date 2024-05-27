<!-- Modal -->
<div class="modal fade" id="updateEstudiante<?= $estudiante['idEstudiante']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Estudiante <?= $estudiante['nombre']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/estudiante.controller.php" method = "post">
            <input type="hidden" name="modificaEstudiante" value="<?= $estudiante['idEstudiante']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="<?= $estudiante['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telef" class="form-label">Teléfono</label>
                <input type="number" class="form-control" id="telef" name="telef" placeholder="Ingrese el telefono" value="<?= $estudiante['telefono']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" placeholder="Ingrese el curso" value="<?= $estudiante['curso']; ?>" required>
            </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
      </div>
      </form>
    </div>
  </div>
</div>
<br>