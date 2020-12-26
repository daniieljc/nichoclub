@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Artículos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Artículos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <form action="{{ route('article.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nombre-article">Nombre del actículo</label>
                                    <input type="text" name="input-nombre-article" id="input-nombre-article"
                                        class="form-control" placeholder="Nombre del actículo" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-body-article">Cuerpo del actículo</label>
                                    <textarea name="input-body-article" id="input-body-article" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-cover">Imagen de
                                        portada</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="cover_image" id="input-cover"
                                            lang="en">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nombre-article">Asignar categoría</label>
                                    <select class="form-control" id="input-product-category" name="product_category">
                                        <option disabled selected>Seleccione una categoría</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nombre-article">Asignar producto</label>
                                    <select class="form-control" id="input-product-category" name="product_category">
                                        <option disabled selected>Seleccione un producto</option>
                                        @foreach ($product as $prod)
                                            <option value="{{ $prod->id }}">{{ $prod->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-meta-title">Título</label>
                                    <input type="text" name="input-meta-title" id="input-meta-title" class="form-control"
                                        placeholder="Meta etiqueta título">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-meta-keywords">Keywords</label>
                                    <input type="text" name="input-meta-keywords" id="input-meta-keywords"
                                        class="form-control" placeholder="Meta etiqueta keywords">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-meta-description">Descripción</label>
                                    <input type="text" name="input-meta-description" id="input-meta-description"
                                        class="form-control" placeholder="Meta etiqueta descripción">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="submit" value="Crear" class="btn btn-primary my-2">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.tiny.cloud/1/gp830uvzuhs9x8km3hknwjcy32gnlq37e6y8mr8rsifgoz21/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak autosave save imagetools wordcount',
            toolbar_mode: 'floating',
        });


        dashboard.className = "nav-link"
        article_li.className = "nav-item menu-open"
        articles_nav.className = "nav-link active"
        articles_nav_create.className = "nav-link active"

    </script>
@endsection
