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
                                    <a href="{{ route('admin.articles_create') }}"
                                        class="btn btn-sm btn-primary text-white">Nuevo artículo</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-0">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Nombre</th>
                                            <th scope="col" class="sort" data-sort="meta_title">Meta título</th>
                                            <th scope="col" class="sort" data-sort="meta_description">Meta descripción</th>
                                            <th scope="col" class="sort" data-sort="meta_keyword">Meta keywords</th>
                                            <th scope="col" class="sort" data-sort="articles">Categoría relacionado</th>
                                            <th scope="col" class="sort" data-sort="articles">Producto relacionado</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col" style="width: 20px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $art)
                                            <tr>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm"><a
                                                                    href="{{ $art->url_product }}"
                                                                    target="_blank">{{ $art->title }}</a></span>
                                                        </div>
                                                    </div>
                                                </th>
                                                @if ($art->title_meta)
                                                    <td>{{ $art->title_meta }}</td>
                                                @else
                                                    <td><em>Ningun dato</em></td>
                                                @endif

                                                @if ($art->keywords_meta)
                                                    <td>{{ $art->keywords_meta }}</td>
                                                @else
                                                    <td><em>Ningun dato</em></td>
                                                @endif

                                                @if ($art->description_meta)
                                                    <td>{{ $art->description_meta }}</td>
                                                @else
                                                    <td><em>Ningun dato</em></td>
                                                @endif

                                                @if ($art->id_category)
                                                    <td>{{ $art->title_category }}</td>
                                                @else
                                                    <td><em>Ningun producto</em></td>
                                                @endif

                                                @if ($art->id_post)
                                                    <td>{{ $art->title_product }}</td>
                                                @else
                                                    <td><em>Ningun producto</em></td>
                                                @endif

                                                <td>{{ $art->updated_at }}</td>

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

    <script>
        dashboard.className = "nav-link"
        article_li.className = "nav-item menu-open"
        articles_nav.className = "nav-link active"
        articles_nav_view.className = "nav-link active"

    </script>

@endsection
