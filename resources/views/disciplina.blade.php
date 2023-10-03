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

 <!--Inicio Modal inserir aluno-->
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
                            <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Funcionarios</h2></caption>
                             <thead>
                                <th>ID</th>
                                <th>DESCRIÇÃO</th>
                                <th>TIPO</th>
                                <th>METODO</th>
                             </thead>
                             <TBODy>
                                @foreach($disciplinas as $disciplina)
                                <TR>
                                    <td>{{$disciplina->id}}</td>
                                    <td>{{$disciplina->nome}}</td>
                                    <td>{{$disciplina->tipo}}</td>
                                    <TD>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar{{$disciplina->id}}"><i class="bi bi-trash3-fill"></i></button>
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
                
                    <h3 style="color: red;">Deseja Ilimimar {{$disciplina->name}} ?</h3>
                
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
