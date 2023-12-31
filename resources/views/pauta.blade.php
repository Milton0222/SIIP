<x-app-layout>

<!--Inicio Modal elaborar pauta-->
<div class="modal fade" id="elaborar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario para elaborar pauta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
                <table class="table">
                    <thead>
                       <th>Selecionar curso</th>
                    </thead>
                    <tbody>
                    @foreach($cursos  as $lista)
                    <tr>
                    <td><a class="nav-link" style="color: black;" href="/elaborar/pauta/{{$lista->id}}">{{$lista->nome}}</a></td>
                    </tr>
                        
                        @endforeach
                    </tbody>

                </table>
                

      </div>
      
    </div>
  </div>
</div>
    <!--Fim Modal elaboral pauta-->

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                        <a class="nav-link" >
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-add"></i></div>
                                <button type="button"  class="btn" style="color: white;"
                                     data-bs-toggle="modal" data-bs-target="#elaborar">Elaborar
                               </button>
                        </a>
                    <!--pesquisar por curso e disciplina-->    
            @can('RSA')
                <div class="container-fluid">
                        <form class="d-flex" role="search" action="{{route('pauta.search')}}" method="GET">
                                            @csrf
                  
                    <select id="inputState" class="form-select" name="disciplina">
                    <option value="" selected>Selecionar discplina</option>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                    @endforeach
                    </select>
                
                
                    <select id="inputState" class="form-select" name="curso">
                    <option value="" selected>Selecionar curso</option>
                    @foreach($cursos as $lista)
                    <option value="{{$lista->id}}">{{$lista->nome}}</option>
                    @endforeach
                    </select>  
                                        <button class="btn btn-outline-success" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                        </button>
                                        </form>
             </div>
             @elsecan('professor')
             <div class="container-fluid">
                        <form class="d-flex" role="search" action="{{route('pauta.search')}}" method="GET">
                                            @csrf
                  
                    <select id="inputState" class="form-select" name="disciplina">
                    <option value="" selected>Selecionar discplina</option>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                    @endforeach
                    </select>
                
                
                    <select id="inputState" class="form-select" name="curso">
                    <option value="" selected>Selecionar curso</option>
                    @foreach($cursos as $lista)
                    <option value="{{$lista->id}}">{{$lista->nome}}</option>
                    @endforeach
                    </select>  
                                        <button class="btn btn-outline-success" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                        </button>
                         
                        </form>
             </div>
<!--pesquisar por curso e disciplina fim-->
@endcan    
                        </div>
                     
                    </div>
                    <div class="sb-sidenav-footer">
                    <h1 class="mt-4" style="text-align: center; color: rgb(216, 121, 126); box-shadow: 0px 0px 20px green; border-radius: 20px;">SIIP</h1>
                    </div>
                </nav>
            </div>


           

            <div id="layoutSidenav_content">
                <main>
             
                
                    <div class="container-fluid px-4">
                    <table class="table table-hover caption-top">
                                <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Pautas</h2></caption>
                                
                                <thead>
                                       
                                        <TH>NOME</TH>
                                        <TH>GENERO</TH>
                                        <th>DISCIPLINA</th>
                                        <TH>TURMA</TH>
                                        <TH>FREQUENCIA</TH>
                                        <TH>PERIODO</TH>
                                        <TH>VALOR</TH>
                                        <TH>ESTADO</TH>
                                        <!--<TH>MEDOTO</TH>-->
                                </thead>
                                <tbody>
                                    @foreach($pautas as $pauta)
                                    <tr>
                                      
                                        <td>{{$pauta->aluno}}</td>
                                        <td>{{$pauta->genero}}</td>
                                        <td>{{$pauta->disciplina}}</td>
                                        <td>{{$pauta->turma}}</td>
                                        <td>{{$pauta->classe}}</td>
                                        <td>{{$pauta->periodo}}</td>
                                        <td>{{$pauta->valor}}</td>
                                        <td>{{$pauta->classificacao}}</td>
                                      <!--  <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    @can('RSA')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar{{$pauta->id}}"><i class="bi bi-trash3-fill"></i></button>
                    @endcan
                    Inicio Modal apagar
                            <div class="modal fade" id="apagar{{$pauta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header" style="background-color: green;">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deletando {{$pauta->aluno}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                        <form action="{{ route('pauta.destroy',$pauta->code) }}"  method="DELETE" class="row g-3" style="background-color: black;">
                                            @csrf
                                            
                                                <h3 style="color: red;">Deseja Ilimimar {{$pauta->aluno}}</h3>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                            </div>
                                        </form>

                                </div>
                                
                                </div>
                            </div>
                            </div>

                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#apagar"><i class="bi bi-pencil-square"></i></button>
                 </div>
                                        </td>-->

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
