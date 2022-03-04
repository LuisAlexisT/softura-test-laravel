@extends('layouts.app')
@section('css')
<style type="text/css">
    .btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
.select2{
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    background-color: #f8fafc;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: none;
}
.select2-container--default .select2-selection--multiple {
    background-color: #f8fafc;
    border: none;
}
.text-hidden-content{
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.card-p1{
    padding: 10px 20px;
}
.close{
    background-color: transparent;
    border: 0;
    -webkit-appearance: none;
    position: absolute;
    top: 0;
    right: 0;
    padding: 0.75rem 1.25rem;
    color: inherit;
    font-size: 20px;
}
.alert-toggle-js{
    float: right;
    position: absolute;
    display: flex;
    z-index: 9999999;
    margin-left: 40px;
}
.courses-list{
    display: ;
    position: absolute;
    z-index: 9999;
    background: transparent;
    width: 400px;
    height: auto;
}
.course-item{
    background-color: #cfe2ff;
    padding: 1px 5px;
    border-radius: 15px;
    box-shadow: 4px 4px 6px 0px rgb(0 0 0 / 13%);
    margin-right: 3px;
    display: none;
}

.info-courses:hover .course-item {
    display: flex;
}
.cursor-pointer{
    cursor: pointer;
}
</style>
@endsection
@section('content')
<div class="col-5 alert-toggle-js" id="alert-toggle-js">
    
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Lista de peliculas') }}
                    <button class="btn btn-success" data-toggle="modal" data-target="#modalMovie" style="float: right; height: 30px; font-size:11px;">
                        <i class="fa fa-plus"></i> 
                    </button>
                </div>

                <div class="card-body">
                    <div id="movie_list">
                        @if(count($movies)<=0)
                            <p>No hay peliculas registradas</p>
                            <small>Da click en el botón con el símbolo de más, para añadir una nueva pelicula.</small>
                        @else
                        @foreach($movies as $movie)
                        <div class="card card-p1 mt-2" id="movie-item-{{$movie->id}}">
                            <div class="row">
                                <div class="col-3" id="movie-poster-{{$movie->id}}">
                                    <img src="{{asset('/img/movie/poster/'.$movie->poster)}}" width="100" height="150" style="object-fit: cover;">
                                </div>
                                <div class="col-7" id="movie-data-{{$movie->id}}">
                                    <strong>{!! $movie->name !!}</strong>
                                    <p>{!! $movie->clasificacion !!}</p>
                                    <p>Duracion: <strong>{!! $movie->duration !!}</strong> mins.</p>
                                    <p class="text-hidden-content">Sinopsis: {!! $movie->sinopsis !!}</p>
                                </div>
                                <div class="col-2" id="buttons-movie-{{$movie->id}}">
                                    <button type="button" class="btn btn-success btn-circle btn-edit-modal" data-toggle="modal" data-target="#modalMovieEdit" data-id="{{$movie->id}}" data-nombre="{!! $movie->name !!}" data-clasificacion="{!! $movie->clasificacion !!}" data-duracion="{!! $movie->duration !!}" data-sinopsis="{{$movie->sinopsis}}"><i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-circle btn-remove-movie" data-id="{{$movie->id}}" data-name="{!! $movie->name !!}"><i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@include('modals.modal_movie_add')
@include('modals.modal_movie_edit')
@endsection
@section('scripts')
<script type="text/javascript">
    $( "#form-new-movie").on( "submit", function(e) {
        var validate_flag=0;
        if($("#movieName").val()==""){
            $("#validation_name").text('El nombre no debe estar vació.');
            $("#validation_name").css("display", "block");
            validate_flag++;
        }
        if($("#duration").val()==""){
            $("#valdiation_duration").text('La duracion no debe estar vacia.');
            $("#valdiation_duration").css("display", "block");
            validate_flag++;
        }
        if($("#sinopsis").val()==""){
            $("#valdiation_sinopsis").text('La sinopsis no debe estar vacia.');
            $("#valdiation_sinopsis").css("display", "block");
            validate_flag++;
        }
        if($("#poster").val()==""){
            $("#valdiation_poster").text('El poster no debe estar vació.');
            $("#valdiation_poster").css("display", "block");
            validate_flag++;
        }

        if($("#clasif").val()==""){
            $("#valdiationCourse").text('La Clasificación no debe estar vació.');
            $("#valdiationCourse").css("display", "block");
            validate_flag++;
        }

        if(validate_flag>0){
            $('.alert-danger').delay(2000).fadeOut();
            e.preventDefault();
            return false;
        }
        else{
            e.preventDefault();
            var name = $("#movieName").val();
            var duration = $("#duration").val();
            var poster = $("#poster")[0].files;
            var clasif = $("#clasif").val();
            var sinopsis = $("#sinopsis").val();

            var fd = new FormData();
            fd.append('name',name);
            fd.append('duration',duration);
            fd.append('poster',poster[0]);
            fd.append('clasif',clasif);
            fd.append('sinopsis',sinopsis);
            fd.append('_token','{{ csrf_token() }}');

            
            $.ajax({
                url: `{{route('movie.register')}}`,
                method: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result) {
                        $('#movie_list').append(`
                            <div class="card card-p1 mt-2">
                            <div class="row">
                                <div class="col-3" id="movie-poster-${result.id}">
                                    <img src="{{asset('/img/movie/poster/')}}/${result.poster}" width="100" height="150" style="object-fit: cover;">
                                </div>
                                <div class="col-7">
                                    <strong>${result.name}</strong>
                                    <p>${result.clasificacion}</p>
                                    <p>Duracion: <strong>${result.duration}</strong> mins.</p>
                                    <p class="text-hidden-content">Sinopsis: ${result.sinopsis}</p>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-success btn-circle btn-edit-modal" data-toggle="modal" data-target="#modalMovieEdit" data-id="${result.id}" data-nombre="${result.name}" data-clasificacion="${result.clasificacion}" data-duracion="${result.duration}" data-sinopsis="${result.sinopsis}"><i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-circle btn-remove-movie" data-id="${result.id}" data-name="${result.name}"><i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        `);
                        $("#movieName").val('');
                        $("#duration").val('');
                        $("#poster").val('');
                        $("#clasif").val('');
                        $("#sinopsis").val('');
                        $('#modalMovie .close-modal').click();
                        document.getElementById('alert-toggle-js').innerHTML = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Guardado!</strong> 
                              Has guardado la pelicula <strong>${result.name}</strong> con exito.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        `;
                        $(".alert-toggle-js").css("display", "flex");
                        $('.alert-toggle-js').delay(2000).fadeOut();
                    }

                },
                error: function() {
                    console.log('error');
                }
            });
        }
    });

    $(document).on("click", '.btn-remove-movie', function(e) {
        var id = $(this).attr('data-id');
        var fullName = $(this).attr('data-name');
        $.ajax({
                url: `{{route('movie.delete')}}`,
                type: 'POST',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                success: function(result) {
                    if (result) {
                        $("#movie-item-"+id).remove();
                        document.getElementById('alert-toggle-js').innerHTML = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Borrado!</strong> 
                              Has borrado a <strong>${name}</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        `;
                        $(".alert-toggle-js").css("display", "flex");
                        $('.alert-toggle-js').delay(2000).fadeOut();
                        if(result<=0){
                            document.getElementById('movie_list').innerHTML=`<p>Sin datos de Peliculas</p>
                            <small>Da click en el botón con el símbolo de más, para añadir una pelicula.</small>`;
                        }
                    }

                },
                error: function() {
                    alert("No");
                }
            });
    });

    $(document).on("click", '.btn-edit-modal', function(e) {
        var id = $(this).attr('data-id');
        var nombre = $(this).attr('data-nombre');
        var clasificacion = $(this).attr('data-clasificacion');
        var sinopsis = $(this).attr('data-sinopsis');
        var duracion = $(this).attr('data-duracion');

        
        $('#id_movie_edit').val(id);
        $('#movieNameEdit').val(nombre);
        $('#durationEdit').val(duracion);
        $('#sinopsisEdit').val(sinopsis);
        $('#clasifEdit').val(clasificacion);
    });

    $( "#form-edit-movie").on( "submit", function(e) {
        var validate_flag=0;
        if($("#movieNameEdit").val()==""){
            $("#validation_nameEdit").text('El nombre no debe estar vació.');
            $("#validation_nameEdit").css("display", "block");
            validate_flag++;
        }
        if($("#durationEdit").val()==""){
            $("#valdiation_durationEdit").text('La duracion no debe estar vacia.');
            $("#valdiation_durationEdit").css("display", "block");
            validate_flag++;
        }
        if($("#sinopsisEdit").val()==""){
            $("#valdiation_sinopsisEdit").text('La sinopsis no debe estar vacia.');
            $("#valdiation_sinopsisEdit").css("display", "block");
            validate_flag++;
        }

        if($("#clasifEdit").val()==""){
            $("#valdiationCourseEdit").text('La Clasificación no debe estar vació.');
            $("#valdiationCourseEdit").css("display", "block");
            validate_flag++;
        }

        if(validate_flag>0){
            $('.alert-danger').delay(2000).fadeOut();
            e.preventDefault();
            return false;
        }
        else{
            e.preventDefault();
            var name = $("#movieNameEdit").val();
            var duration = $("#durationEdit").val();
            var clasif = $("#clasifEdit").val();
            var sinopsis = $("#sinopsisEdit").val();
            var id = $("#id_movie_edit").val();

            var fd = new FormData();
            fd.append('name',name);
            fd.append('duration',duration);
            fd.append('clasif',clasif);
            fd.append('id',id);
            fd.append('sinopsis',sinopsis);
            fd.append('_token','{{ csrf_token() }}');

            $.ajax({
                url: `{{route('movie.update')}}`,
                method: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result) {
                        document.getElementById('movie-poster-'+id).innerHTML = `
                            <img src="{{asset('/img/movie/poster/')}}/${result.poster}" width="100" height="150" style="object-fit: cover;">
                        `;
                        document.getElementById('movie-data-'+id).innerHTML = `
                            <strong>${result.name}</strong>
                            <p>${result.clasificacion}</p>
                            <p>Duracion: <strong>${result.duration}</strong> mins.</p>
                            <p class="text-hidden-content">Sinopsis: ${result.sinopsis}</p>
                        `;
                        
                        document.getElementById('buttons-movie-'+id).innerHTML = `
                            <button type="button" class="btn btn-success btn-circle btn-edit-modal" data-toggle="modal" data-target="#modalMovieEdit" data-id="${result.id}" data-nombre="${result.name}" data-clasificacion="${result.clasificacion}" data-duracion="${result.duration}" data-sinopsis="${result.sinopsis}"><i class="fa fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-circle btn-remove-movie" data-id="${result.id}" data-name="${result.name}"><i class="fa fa-trash"></i>
                            </button>
                        `;

                        document.getElementById('alert-toggle-js').innerHTML = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Guardado!</strong> 
                              Información de <strong>${result.name}</strong> actualizado con exito.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        `;
                        $(".alert-toggle-js").css("display", "flex");
                        $('.alert-toggle-js').delay(2000).fadeOut();
                        $('#modalMovieEdit .close-modal').click();
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
        }
    });
</script>
@endsection