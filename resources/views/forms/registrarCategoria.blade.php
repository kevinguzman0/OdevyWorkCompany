@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')

<!-- Categories -->
 <div class="row col-md-12">

      <div class="row col-md-12 mt-5 ml-5">
          <h3>REGISTRO DE CATEGORIAS</h3>
      </div>

      <div class="row col-md-11 mt-5 ml-5">

          <form class="col-md-12"
                action="{{ route('ingresar.categoria') }}" 
                method="POST"
                enctype="multipart/form-data">

              @csrf

                @if ($mensaje = Session::get('mensajeVerde'))
                    <div class="form-row col-md-12 alert alert-success estilo-success alert-dismissible fade show estilo-mensaje-verde" role="alert">
                        {{ $mensaje }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @isset($categorias)

                  <div class="form-row">
                    
                    <div class="col-md-6">

                      <div class="form-group col-md-12">

                        <label class="label-margin">Nombre</label>
                        <input type="text" maxlength="100" name="nombre" class="form-control">

                      </div>

                      <div class="form-group col-md-12">

                        <label class="label-margin">Subir imagen</label>
                        <input type="file" class="form-control-file" name="imagenes[]" id="imagenes[]" multiple accept="image/*">

                      </div>

                    </div>
                    
                    <div class="col-md-6">

                      <div class="form-group col-md-12">

                        <label class="label-margin">Descripción de la caracteristica</label>
                        <textarea maxlength="200" rows="4" name="descripcion" class="form-control" placeholder="descripción de la categoria"></textarea>

                      </div>

                    </div>

                </div> 

              @endisset      

              @if ($errors->any())
                  <div class="alert alert-danger col-md-12 mt-3 mb-1 pl-3 pr-3 alert-dismissible fade show">
                      <ol class="estilo-lista-errores">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ol>
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>
              @endif

                <div class="row col-md-12 mt-3 mb-5">

                      <label></label>
                      <input type="submit" value="Grabar" name="btnGrabarCategoria" class="form-control btn btn-info">

                </div>              
              
          </form>

      </div>

  </div>
@endsection