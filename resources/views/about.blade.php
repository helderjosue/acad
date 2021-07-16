@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header py-7 py-lg-7">
        <div class="container">
            <div class="header-body text-center mt-5 mb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-6" style="color: black;">
                        <h1  style="border-bottom: 1px solid black;">{{ __('Universidade Joaquim Chissano') }}</h1>
                        <h1  style="border-bottom: 1px solid black;">{{ __('Gestão Escolar.') }}</h1>
                        <h2  style="padding-bottom: 1.5em;">Desenvolvido por Aike Ruco, Denilson Mac & Helder Mata</h2>
                        <p>Projeto de sistema web apresentado a disciplina Laboratório de Engenharia de Software.</p>

                        <p>Tecnologias: PHP, JavaScript, HTML5, Laravel e MySQL.</p>
                    </div>
                </div>
            </div>
        </div>
@endsection
