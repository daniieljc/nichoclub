@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                                            <th scope="col" class="sort" data-sort="articles">Precio</th>
                                            <th scope="col" class="sort" data-sort="articles">Precio con descuento</th>
                                            <th scope="col" class="sort" data-sort="articles">Categoría</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col" style="width: 20px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $prod)
                                            <tr>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm"><a
                                                                    href="{{ $prod->url_product }}"
                                                                    target="_blank">{{ $prod->title }}</a></span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="budget"> {{ $prod->description }} </td>
                                                <td> {{ $prod->price }} </td>
                                                <td> {{ $prod->price_desc }}</td>
                                                <td> {{ $prod->title_category }}</td>
                                                <td> {{ $prod->updated_at }}</td>

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
                    <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data"
                        id="formCreateProduct">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-titulo-producto">Nombre del
                                        producto</label>
                                    <input type="text" name="product_title" id="input-titulo-producto" class="form-control"
                                        placeholder="Título del producto" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-descripcion-producto">Description</label>
                                    <textarea class="form-control" name="product_description"
                                        id="input-descripcion-producto" cols="30" rows="10"
                                        placeholder="Descripción breve de la categoría"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-url-producto">URL del producto</label>
                                    <input type="text" name="product_url" id="input-url-producto" class="form-control"
                                        placeholder="Url del producto" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-precio-producto">Precio</label>
                                    <input type="number" name="product_price" id="input-titulo-producto"
                                        class="form-control" placeholder="Precio del producto" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-precio-des-producto">Precio con
                                        descuento</label>
                                    <input type="number" name="product_price_desc" id="input-titulo-producto"
                                        class="form-control" placeholder="Precio del producto con el descuento">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-product_category">Asignar
                                        categoría</label>
                                    <select class="form-control" id="input-product-category" name="product_category">
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="formCreateProduct.submit()">Añadir
                        Producto</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        dashboard.className = "nav-link"
        productos.className = "nav-link active"

    </script>

@endsection
