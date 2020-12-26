@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ajustes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Ajustes</li>
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

                <form action="{{ route('setting.updated') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nombre-sitio">Nombre del sitio</label>
                                    <input type="text" name="sitename" id="input-nombre-sitio" class="form-control"
                                        placeholder="Nombre del sitio" required value="{{ $setting->name_page }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-logo">Logo del sitio</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="sitelogo" id="input-logo"
                                            lang="en">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-favicon">Favicon del sitio</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="faviconSite" id="input-favicon"
                                            lang="en">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email-contact">Email de
                                        contacto</label>
                                    <input type="text" name="emailContact" id="input-email-contact" class="form-control"
                                        placeholder="Email de contacto" required value="{{ $setting->contact_email }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="input-primary-color" class="form-control-label">Color primerio</label>
                                    <input class="form-control" type="color" value="{{ $setting->color_primary }}"
                                        id="input-primary-color" name="primarycolor">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="input-secundary-color" class="form-control-label">Color
                                        secundario</label>
                                    <input class="form-control" type="color" value="{{ $setting->secondary_color }}"
                                        id="input-secundary-color" name="secundarycolor">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-token-nicho">Token Nicho Club</label>
                                    <input type="text" name="token_nicho" id="input-token-nicho" class="form-control"
                                        placeholder="Token Nicho Club" required value="{{ $setting->token_nichoclub }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-tag-amazon">TAG Amazon</label>
                                    <input type="text" name="tag_amazon" id="input-tag-amazon" class="form-control"
                                        placeholder="TAG de Amazon" required value="{{ $setting->id_amazon }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-google-analytics">ID Google
                                        Analytics</label>
                                    <input type="text" name="google_analytics" id="input-google-analytics"
                                        class="form-control" placeholder="ID Google Analytics" required
                                        value="{{ $setting->id_analytics }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <input type="submit" value="Actualizar" class="btn btn-primary my-2">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        dashboard.className = "nav-link"
        ajustes.className = "nav-link active"

    </script>

@endsection
