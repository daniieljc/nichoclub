@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categorias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Categorias</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-header border-0">
                            @if (session()->has('message'))
                                <div role="alert" class="alert alert-success alert-dismissible">
                                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-inner--text">{{ session()->get('message') }}</span>
                                    <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                                            aria-hidden="true">×</span></button>
                                    <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            @endif

                            <div class="row align-items-center">
                                <div class="col-lg-6 col-7">
                                </div>
                                <div class="col-lg-6 col-5 text-right">
                                    <a data-toggle="modal" data-target="#createUser"
                                        class="btn btn-sm btn-primary text-white">Nueva categoría</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-0">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Nombre</th>
                                            <th scope="col" class="sort" data-sort="description">Descripción</th>
                                            <th scope="col" class="sort" data-sort="articles">Artículos</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col" style="width: 20px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $cat)
                                            <tr>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm">{{ $cat->title }}</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="budget">
                                                    {{ $cat->description }}
                                                </td>
                                                <td> {{ $cat->articulos }} </td>
                                                <td> {{ $cat->updated_at }}</td>
                                                <td class="text-right">
                                                    <a href=""><i class="far fa-edit"></i></a>
                                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer border-0">
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right mb-0">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUserModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.create') }}" method="post" enctype="multipart/form-data"
                        id="formCreateCategory">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-titulo-categoria">Nombre de la
                                        categoría</label>
                                    <input type="text" name="category_title" id="input-titulo-categoria"
                                        class="form-control" placeholder="Título de la categoría" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-descripcion-categoria">Description</label>
                                    <textarea class="form-control" name="category_description"
                                        id="input-descripcion-categoria" cols="30" rows="3"
                                        placeholder="Descripción breve de la categoría"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="formCreateCategory.submit()">Crear
                        Categoría</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        dashboard.className = "nav-link"
        categorias.className = "nav-link active"

    </script>
@endsection
