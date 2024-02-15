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

 <!--Inicio Modal inserir disciplina-->
 <div class="modal fade" id="Inscrição" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario de inscrição</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('disciplina.store') }}"  method="POST" class="row g-3">
                @csrf
                <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nome"  required autofocus autocomplete="nome" />
              </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Tipo</label>
                    <select id="inputState" class="form-select" name="tipo">
                    <option value="nuclear" selected>Selecionar</option>
                    <option value="nuclear">nuclear</option>
                    <option value="não nuclear">não nuclearr</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Classe</label>
                    <select id="inputState" class="form-select" name="classe">
                    <option  selected>Selecionar</option>
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
                            <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Disciplinas
                            <nav class="navbar bg-body-tertiary">
                                    <div class="container-fluid">
                                        <form class="d-flex" role="search" action="{{route('consulta.disciplina')}}" method="GET">
                                            @csrf
                                        
                                        <input class="form-control me-2" type="number" name="search"  placeholder="Campo  de pesquisa" aria-label="Search" required>
                                        <button class="btn btn-outline-success" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                        </button>
                                        </form>
                                    </div>
                                    </nav>
                                  </h2></caption>
                             <thead>
                                <th>ID</th>
                                <th>DESCRIÇÃO</th>
                                <th>TIPO</th>
                                <th>Classe</th>
                                <th>METODO</th>
                             </thead>
                             <TBODy>
                                @foreach($disciplinas as $disciplina)
                                <TR>
                                    <td>{{$disciplina->id}}</td>
                                    <td>{{$disciplina->nome}}</td>
                                    <td>{{$disciplina->tipo}}</td>
                                    <td>{{$disciplina->classe}}</td>
                                    <TD>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    @can('RSA')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar{{$disciplina->id}}"><i class="bi bi-trash3-fill"></i></button>
                                        @endcan
                                        <!--Inicio Modal apagar-->
<div class="modal fade" id="apagar{{$disciplina->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletando {{$disciplina->nome}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('disciplina.destroy',$disciplina->id) }}"  method="DELETE" class="row g-3" style="background-color: black;">
                @csrf
                
                    <h3 style="color: red;">Deseja Ilimimar {{$disciplina->nome}} ?</h3>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actualizar{{$disciplina->id}}"><i class="bi bi-pencil-square"></i></button>
<!--Inicio Modal inserir disciplina-->
<div class="modal fade" id="actualizar{{$disciplina->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario actualizar`{{$disciplina->nome}} </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('disciplina.update',$disciplina->id) }}"  method="PUT" class="row g-3">
                @csrf
                <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nome"  required autofocus autocomplete="nome" value="{{$disciplina->nome}}" />
              </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Tipo</label>
                    <select id="inputState" class="form-select" name="tipo">
                    <option value="{{$disciplina->tipo}}" selected>{{$disciplina->tipo}}</option>
                    <option value="nuclear">nuclear</option>
                    <option value="não nuclear">não nuclearr</option>
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
    <!--Fim Modal fim actualizar-->


                                    </div>
                                    </TD>
                                </TR>
                                @endforeach
                             </TBODy>
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
