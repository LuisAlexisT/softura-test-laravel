<div class="modal fade" id="modalMovieEdit" tabindex="-1" role="dialog" aria-labelledby="modalmovieTitleEdit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="form-edit-movie">
        <input type="hidden" id="id_movie_edit" value="">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMovieTitleEdit">Registrar Pelicula Nueva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="movieName">Nombre de la Pelicula</label>
            <input type="text" class="form-control" id="movieNameEdit" placeholder="Nombre">
            <div class="alert alert-danger" role="alert" id="validation_nameEdit" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
          <div class="form-group mt-4">
            <label for="duration">Duracion en minutos</label>
            <input type="number" class="form-control" id="durationEdit" placeholder="Duración">
            <div class="alert alert-danger" role="alert" id="valdiation_durationEdit" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
          <div class="form-group mt-4">
            <label for="sinopsis">Sinopsis</label>
            <textarea type="text" class="form-control" id="sinopsisEdit" placeholder="Sinopsis"></textarea>
            <div class="alert alert-danger" role="alert" id="valdiation_sinopsisEdit" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
          </div>
          <div class="form-group mt-4">
            <label class="form-check-label" for="clasifEdit">Clasificación</label>
            <select class="form-control" name="clasificacion[]" id="clasifEdit" style="width: 100%;">
              <option value="">Seleccióna una opción.</option>
              <option value="G">G</option>
              <option value="PG">PG</option>
              <option value="PG-13">PG-13</option>
              <option value="R">R</option>
              <option value="NC">NC</option>
            </select>
            <div class="alert alert-danger" role="alert" id="valdiationCourseEdit" style="padding: 5px 10px;margin-top: 10px;display: none;"></div>
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