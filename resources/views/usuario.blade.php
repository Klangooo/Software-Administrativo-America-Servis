@extends('layouts.template_base')

@section('content')

<?php
use App\User;
?>

<style>
  .primeiralinha {
    background-color:#032066;
    color: white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .escrita {
    color: black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .titulo{
    /*background-color: #b5d8e6;*/
    color: #032066;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .botao {
    background-color: #032066;
    color: white;
    float: right;
    border-color: white;
  }

  .botao:hover {
    background-color: white;
    color: #032066;
    border-color: #032066;
  }

  .centraliza {
    text-align: center;
  }

  .icone:hover {
    transform: scale(1.3);
    color: #48555a;
  }

  .icone {
    transform: scale(1.5);
    margin-top: 9px;
    cursor: pointer;
    color: #032066;
  }


</style>

<div style="background-color: #e5e6e7">
  <div class="titulo">
    <div class="container">
      <h1 class="display-4">Usuários</h1>
      <p class="lead">Administração de usuários.</p>
    </div>
  </div>

  <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalExemplo">
    Criar novo
  </button>
  <br><br>
  <?php
  $contador = User::count();
  $contador_id = 1;
  ?>
  <table class="table centraliza table-striped">
    <thead class="primeiralinha">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col"> </th>
      </tr>
    </thead>
    
    
      <tbody class="escritas">
        @if($contador == 0)
            <tr> 
              <td>
                Nenhum usuário cadastrado. 
              </td>
            </tr>
        @else
            @foreach($usuario as $usuario)
            <tr>
              <th scope="row">{{$contador_id}}</th>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->email}}</td>
              <td>
                <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar{{$usuario->id}}"></i>
                <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir{{$usuario->id}}"></i>
              </td>
          
              @if($contador>0)
              <?php /*

              <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
              <div class="modal fade escrita" id="modalEditar{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#032066; color:white">
                        <h5 class="modal-title" id="exampleModalLabel">Editar usuário</h5>
                        <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                        {!! Form::open(['action' => ['UsuarioController@update', $usuario->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('nome', 'Nome')}}
                            {{Form::text('name', $usuario->name, ['class' => 'form-control', 'placeholder' => 'Nome'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::text('email', $usuario->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                        </div>
                        <div class="form-group">
                          {{Form::label('password', 'Senha')}}
                          {{Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Nova senha'])}}
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
                          {{Form::hidden('_method', 'PUT')}}
                          {{Form::submit('Salvar Mudanças', ['class'=>'btn btn-secondary rounded-pill botao'])}}
                          {!! Form::close() !!}
                      </div>
                  </div>
                  </div>
                </div>
                <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                */ ?>

                <!-- ABERTURA DO MODAL CONFIRMAR EXCLUSÃO -->
                <div class="modal fade escrita" id="modalExcluir{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                          <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
                          <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Fechar">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Deseja excluir o usuário?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>

                          {!!Form::open(['action' => ['UsuarioController@destroy', $usuario->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Confirmar', ['class' => 'btn btn-primary rounded-pill botao'])}}
                            {!!Form::close()!!}
                      </div>
                      </div>
                  </div>
                  </div>
                <!--FIM DO MODAL CONFIRMAR EXCLUSÃO -->
                @endif  
              
            <?php $contador_id = $contador_id + 1; ?>
            @endforeach
        @endif
      </tbody>

    </table>

  </div>


<!-- ABERTURA DO MODAL CRIAR NOVO -->
<div class="modal fade escrita" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header" style="background-color:#032066; color:white">
          <h5 class="modal-title" id="exampleModalLabel">Criar novo usuário</h5>
          <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group">
              <label for="name">{{ __('Nome') }}</label>

              <div>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group">
              <label for="email">{{ __('E-Mail') }}</label>

              <div>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group">
              <label for="password">{{ __('Senha') }}</label>

              <div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group">
              <label for="password-confirm">{{ __('Confirme a senha') }}</label>

              <div>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
          </div>

          <div class="form-group modal-footer">
              <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-secondary rounded-pill botao">Criar usuário</button>
          </div>
      </form>
      </div>
      </div>
  </div>
</div>
<!--FIM DO MODAL CRIAR NOVO -->

@endsection