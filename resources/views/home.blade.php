@extends('layouts.template_base')

@section('content')

<style>
    .primeiralinha {
      background-color:#032066;
      color: white;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="primeiralinha">
            <div class="card">
                <div class="card-header">{{ __('Painel de Controle') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="images/LogoCompleta.png" class="img-fluid" alt="Imagem responsiva">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection