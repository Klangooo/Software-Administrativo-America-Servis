@extends('layouts.template_base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color:  #032066>
                    <div class="card-header">{{ __('Painel de Controle') }}</div></div>

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