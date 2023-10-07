<x-app-layout>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">
                            <a class="nav-link" >
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-add"></i></div>
                                <button type="button"  class="btn" style="color: white;"
                                     data-bs-toggle="modal" data-bs-target="#cadastro">Cadastrar
                               </button>
                            </a>
                            

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <h1 class="mt-4" style="text-align: center; color: rgb(216, 121, 126); box-shadow: 0px 0px 20px green; border-radius: 20px;">SIIP</h1>
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
<!--Inicio Modal-->
<div class="modal fade" id="cadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Funcionarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('funcionario.store') }}"  method="POST" class="row g-3">
                @csrf
                <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Funcionario</label>
                    <select id="inputState" class="form-select" name="nivel">
                    <option value="2" selected>Funcionario</option>
                    <option value="2">Funcionario</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Nivel de Acesso</label>
                    <select id="inputState" class="form-select" name="caso">
                    <option value="2" selected>Privilegios</option>
                    <option value="0">Chefe de Secretaria</option>
                    <option value="1">Funcionario de secretaria</option>
                    <option value="2">Professor</option>
                    
                    </select>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
    <!--Fim Modal-->            
                    <div class="container-fluid px-4">
                       <table class="table table-hover caption-top">
                       <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Funcionarios</h2></caption>
                            <thead>
                                <th>Id</th><th>Nome</th><th>Email</th><th>Permissao</th>
                            </thead>
                            <tbody>
                                @foreach($funcionarios as $lista)
                                <tr>
                                    <td>{{$lista->id}}</td>
                                    <td>{{$lista->name}}</td>
                                    <td>{{$lista->email}}</td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        @can('RSA')
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar{{$lista->id}}"><i class="bi bi-trash3-fill"></i></button>
                                        @endcan
                                
<!--Inicio Modal-->
<div class="modal fade" id="apagar{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletando Funcionario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('funcionario.destroy',$lista->id) }}"  method="DELETE" class="row g-3" style="background-color: black;">
                @csrf
                
                    <h3 style="color: red;">Deseja Ilimimar {{$lista->name}} ?</h3>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
                <!--bottom actualizar
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actualizar{{$lista->id}}"><i class="bi bi-person-fill-check"></i></button>
nicio Modal actualizar
<div class="modal fade" id="actualizar{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Funcionarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('funcionario.update',$lista->id) }}"  method="PUT" class="row g-3">
                @csrf
                <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$lista->name}}" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$lista->email}}" required autocomplete="username" />
            </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Nivel de Acesso</label>
                    <select id="inputState" class="form-select" name="caso">
                    <option value="2" selected>Privilegios</option>
                    <option value="0">Chefe de Secretaria</option>
                    <option value="1">Funcionario de secretaria</option>
                    
                    </select>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
    Fim Modal actualizar-->       

                </div>                  
</td>
                                </tr>
                                @endforeach
                            </tbody>
                       </table>

                       
                    </div>
                </main>



        </div>
    </div>
    

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SIIP</div>
                            <div>
                                <a href="#">Nós</a>
                                &middot;
                                <a href="#"> Sobre &amp; SIIP</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>


   
</x-app-layout>
