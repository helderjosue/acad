@extends('layouts.app', ['title' => __('Edição de cadastro'), "current" => "semestres"])

@section('content')
    @include('layouts.headers.header')
    @if(isset($error))
        <?php $error = 0; ?>
    @endif
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Semestres Registrados')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('home') }}" class="btn btn-sm btn-primary">{{ __('Menu Principal') }}</a>
                                <a href="{{ route('semestre.create') }}" class="btn btn-sm btn-primary">{{ __('Registrar semestre') }}</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('semestre.indexSearch') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="row" style="margin-left: 0.5em;">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input id="input_nameOrCpf" class="form-control" name="nomeMatricula" placeholder="Procurar por semestre" type="text"
                                        value="@if(isset($request)){{$request->nomeMatricula}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-icon btn-3 btn-secondary" type="submit">
                                    <span class="btn-inner--icon"><i class="fas fa-search" style="top: 0px;"></i></span>
                                    <span class="btn-inner--text">Buscar</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert
                            @if($_GET['error'] == 1) alert-warning @else alert-success @endif
                            alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive" id="tbody">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Semestre') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @csrf
                                @method('put')
                                @foreach ($semestres as $semestre)

                                    <tr>
                                        <td style="white-space: pre-wrap;">{{ $semestre->ANO}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <a class="dropdown-item" href="{{ route('semestre.edit', $semestre) }}">{{ __('Editar') }}
                                                    </a>

                                                    <a style="color: red;" class="dropdown-item" href="{{ route('semestre.destroy', $semestre) }}">{{ __('Deletar') }}
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(sizeof($semestres) == 0)
                        <div style="width: 100%; text-align: center;">
                            <span style="color: red;">Não foram encontrados resultados.</span>
                        </div>
                        @endif
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $semestres->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
