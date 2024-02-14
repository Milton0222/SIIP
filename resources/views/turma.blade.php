<x-app-layout>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                        <a class="nav-link" >
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-add"></i></div>
                                <button type="button"  class="btn" style="color: white;"
                                     data-bs-toggle="modal" data-bs-target="#Inscrição">Registo
                               </button>
                        </a>

                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <h1 class="mt-4" style="text-align: center; color: rgb(216, 121, 126); box-shadow: 0px 0px 20px green; border-radius: 20px;">SIIP</h1>
                    </div>
                </nav>
            </div>

<!--Inicio Modal inserir turma-->
<div class="modal fade" id="Inscrição" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario de inscrição</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('turma.store') }}"  method="POST" class="row g-3">
                @csrf
                  <div>
                    <x-label for="name" value="{{ __('Nome') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="nome"  required autofocus autocomplete="nome" />
                  </div>
                  <div>
                    <x-label for="name" value="{{ __('Quantidade') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="quantidade"  required autofocus autocomplete="quantidade" />
                  </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Periodo</label>
                    <select id="inputState" class="form-select" name="periodo">
                    <option value="Regular" selected>Selecionar</option>
                    <option value="Regular">Regular</option>
                    <option value="Pós laboral">Pós laboral</option>
                    
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Classe</label>
                    <select id="inputState" class="form-select" name="classe">
                    <option value="1º ano" selected>Selecionar</option>
                    <option value="1º ano">1º ano</option>
                    <option value="2º ano">2º ano</option>
                    <option value="3º ano">3º ano</option>
                    <option value="4º ano">4º ano</option>
                    <option value="5º ano">5º ano</option>
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
    <!--Fim Modal fim inserir-->


            <div id="layoutSidenav_content">
                <main>
                
                    <div class="container-fluid px-4">
                        <table class="table table-hover caption-top">
                                <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Turmas</h2></caption>
                                <thead>
                                    <th>ID</th>
                                    <th>DESCRIÇÃO</th>
                                    <th>CLASSE</th>
                                    <th>PERIODO</th>
                                    <th>CAPACIDADE</th>
                                    <th>DATA</th>
                                    <th>METODO</th>
                                </thead>
                                <TBody>
                            @foreach($turmas as $turma)
                                    <TR>
                                        <TD>{{$turma->id}}</TD>
                                        <td>{{$turma->nome}}</td>
                                        <td>{{$turma->classe}}</td>
                                        <td>{{$turma->periodo}}</td>
                                        <td>{{$turma->quantidade}}</td>
                                        <td>{{$turma->created_at}}</td>
                                        <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            @can('RSA')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar{{$turma->id}}"><i class="bi bi-trash3-fill"></i></button>
                                       @endcan
                                        <!--Inicio Modal apagar-->
<div class="modal fade" id="apagar{{$turma->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletando {{$turma->nome}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('turma.destroy',$turma->id) }}"  method="DELETE" class="row g-3" style="background-color: black;">
                @csrf
                
                    <h3 style="color: red;">Deseja Ilimimar {{$turma->name}} ?</h3>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actualizar{{$turma->id}}"><i class="bi bi-pencil-square"></i></button>

                                        <!--Inicio Modal inserir turma-->
<div class="modal fade" id="actualizar{{$turma->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario de inscrição</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('turma.update', $turma->id) }}"  method="PUT" class="row g-3">
                @csrf
                <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nome"  required autofocus autocomplete="nome"  value="{{$turma->nome}}" />
              </div>
              <div>
                <x-label for="name" value="{{ __('Quantidade') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="quantidade"  required autofocus autocomplete="quantidade"  value="{{$turma->quantidade}}" />
              </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Periodo</label>
                    <select id="inputState" class="form-select" name="periodo">
                    <option value="{{$turma->periodo}}" selected>{{$turma->periodo}}</option>
                    <option value="Regular">Regular</option>
                    <option value="Pós laboral">Pós laboral</option>
                    
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Classe</label>
                    <select id="inputState" class="form-select" name="classe">
                    <option value="{{$turma->classe}}" selected>{{$turma->classe}}</option>
                    <option value="1º ano">1º ano</option>
                    <option value="2º ano">2º ano</option>
                    <option value="3º ano">3º ano</option>
                    <option value="4º ano">4º ano</option>
                    <option value="5º ano">5º ano</option>
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
    <!--Fim Modal fim inserir-->


                                    </div>
                                        </td>
                                    </TR>
                            @endforeach
                                </TBody>
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
