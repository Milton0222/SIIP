<x-app-layout>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                        <a class="nav-link" >
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-add"></i></div>
                                <button type="button"  class="btn" style="color: white;"
                                     data-bs-toggle="modal" data-bs-target="#publicar">Registo
                               </button>
                        </a>

                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <h1 class="mt-4" style="text-align: center; color: rgb(216, 121, 126); box-shadow: 0px 0px 20px green; border-radius: 20px;">SIIP</h1>
                    </div>
                </nav>
            </div>

<!--Inicio Modal publicar pauta-->
<div class="modal fade" id="publicar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario para elaborar pauta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('pauta.store') }}"  method="POST" class="row g-3" >
                @csrf
            

            <div class="mt-4">
                <x-label for="email" value="{{ __('Média') }}" />
                <x-input id="email" class="block mt-1 w-full" type="numeric" name="valor" :value="old('valor')" required />
            </div>
            <div class="col-md-4">
                    <label for="inputState" class="form-label">Aluno</label>
                    <select id="inputState" class="form-select" name="aluno">
                    <option value="" selected>Selecionar</option>
                    @foreach($alunos as $aluno)
                    <option value="{{$aluno->id}}">{{$aluno->nome}}-{{$aluno->id}}</option>
                    @endforeach
                    </select>
            </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Disciplina</label>
                    <select id="inputState" class="form-select" name="disciplina">
                    <option value="" selected>Selecionar</option>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                    @endforeach
                    </select>
                </div>     
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Turma</label>
                    <select id="inputState" class="form-select" name="turma">
                    <option value="" selected>Selecionar</option>
                    @foreach($turmas as $turma)
                    <option value="{{$turma->id}}">{{$turma->nome}} - {{$turma->classe}}- {{$turma->periodo}}</option>
                    @endforeach
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
    <!--Fim Modal fim publicar pauta-->


            <div id="layoutSidenav_content">
                <main>
                
                    <div class="container-fluid px-4">
                    <table class="table table-hover caption-top">
                                <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Pautas</h2></caption>
                                <thead>
                                        <th>ID</th>
                                        <TH>NOME</TH>
                                        <TH>GENERO</TH>
                                        <th>DISCIPLINA</th>
                                        <TH>TURMA</TH>
                                        <TH>FREQUENCIA</TH>
                                        <TH>PERIODO</TH>
                                        <TH>VALOR</TH>
                                        <TH>ESTADO</TH>
                                        <TH>MEDOTO</TH>
                                </thead>
                                <tbody>
                                    @foreach($pautas as $pauta)
                                    <tr>
                                        <td>{{$pauta->id}}</td>
                                        <td>{{$pauta->aluno}}</td>
                                        <td>{{$pauta->genero}}</td>
                                        <td>{{$pauta->disciplina}}</td>
                                        <td>{{$pauta->turma}}</td>
                                        <td>{{$pauta->classe}}</td>
                                        <td>{{$pauta->periodo}}</td>
                                        <td>{{$pauta->valor}}</td>
                                        <td>{{$pauta->classificacao}}</td>
                                        <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar{{$pauta->id}}"><i class="bi bi-trash3-fill"></i></button>
                    <!--Inicio Modal apagar-->
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
