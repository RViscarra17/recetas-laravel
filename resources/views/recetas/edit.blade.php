@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a class="btn btn-primary mr-2" href="{{ route('recetas.index') }}">Volver</a>
@endsection

@section('content')

    <h2 class="text-center mb-5">Editar receta: {{ $receta->titulo }}</h2>
    
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('recetas.update', $receta->id) }}" enctype="multipart/form-data" method="post" novalidate>
                @csrf
                
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Titulo Receta" value="{{ $receta->titulo }}"/>
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    
                    <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">--Seleccione--</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preparacion">Preparacion</label>
                    <input type="hidden" name="preparacion" id="preparacion" value="{{ $receta->preparacion }}">
                    
                    <trix-editor class="@error('preparacion') is-invalid @enderror" input="preparacion"></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{ $receta->ingredientes }}">
                    <trix-editor class="@error('ingredientes') is-invalid @enderror" input="ingredientes"></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Elige la imagen</label>
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" id="imagen"/>

                    <div class="mt-4">
                        <p>Imagen Actual:</p>
                        <img src="/storage/{{ $receta->imagen }}" width="300px"/>
                    </div>

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" value="Agregar Receta" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
@endsection

