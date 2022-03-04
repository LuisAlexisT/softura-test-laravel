<div class="modal fade" id="modalMovie" tabindex="-1" role="dialog" aria-labelledby="modalmovieTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="form-new-movie">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMovieTitle">Registrar Pelicula Nueva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="movieName">Nombre de la Pelicula</label>
            <input type="text" class="form-control" id="movieName" placeholder="Nombre">
            <div class="alert alert-danger" role="alert" id="validation_name" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
          <div class="form-group mt-4">
            <label for="duration">Duracion en minutos</label>
            <input type="number" class="form-control" id="duration" placeholder="Duración">
            <div class="alert alert-danger" role="alert" id="valdiation_duration" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
          <div class="form-group mt-4">
            <label for="sinopsis">Sinopsis</label>
            <textarea type="text" class="form-control" id="sinopsis" placeholder="Sinopsis"></textarea>
            <div class="alert alert-danger" role="alert" id="valdiation_sinopsis" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
          <div class="form-group mt-4">
            <label for="poster">Poster</label>
            <input type="file" class="form-control" id="poster" accept="image/x-png,image/gif,image/jpeg">
            <div class="alert alert-danger" role="alert" id="valdiation_poster" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
          <div class="form-group mt-4">
            <label class="form-check-label" for="clasif">Clasificación</label>
            <select class="form-control" name="clasificacion[]" id="clasif" style="width: 100%;">
              <option value="">Seleccióna una opción.</option>
              <option value="G">G</option>
              <option value="PG">PG</option>
              <option value="PG-13">PG-13</option>
              <option value="R">R</option>
              <option value="NC">NC</option>
            </select>
            <div class="alert alert-danger" role="alert" id="valdiationCourse" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-save-movie">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>