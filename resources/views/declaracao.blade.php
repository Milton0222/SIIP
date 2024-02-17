<x-app-layout>

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                      
                        <a class="nav-link" >
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-add"></i></div>
                                <button type="button"  class="btn" style="color: white;"
                                     data-bs-toggle="modal" data-bs-target="#Inscrição">Matricular
                               </button>
                        </a>
                        <a href="{{route('confirmado.index')}}"  class="nav-link">
                              <button  type="button" class="btn" style="color: white;">
                                Confirmados
                              </button>

                        </a>
                        <a href="{{route('declaracao.index')}}"  class="nav-link">
                              <button  type="button" class="btn" style="color: white;">
                                Declaração
                              </button>

                        </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-dash-fill"></i></div>
                                <button type="button"  class="btn" style="color: white;"
                                     data-bs-toggle="modal" data-bs-target="#faltas">Falta
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
                
                    <div class="container-fluid px-4">


        <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Documentos </h2></caption>
        
        <table class="table table-hover caption-top">
        <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">{{Auth::user()->name}}-Declarações</h2></caption>
            <thead>
                <th>ESTUDANTE</th>
                <th>CURSO</th>
                <th>TIPO</th>
                <th>ANO DE FREQUÊNCIA</th>
                <th>ANO LECTIVO</th>
                <th>ESTADO</th>
                <th>EFEITO</th>
                <th>PAGAMENTO</th>
                <th>METODO</th>
            </thead>
            <tbody>
                @foreach($declaracao as $lista)
                <tr>
                     <td>{{$lista->nome}}</td>
                     <td>{{$lista->curso}}</td>
                    <td>{{$lista->tipo}}</td>
                    <td>{{$lista->anoFrequencia}}</td>
                    <td>{{$lista->anoLetivo}}</td>
                    <td>{{$lista->estado}}</td>
                    <td><textarea name="efeito" id="" cols="15" rows="2">{{$lista->efeito}}</textarea></td>
                    <td><a href="/assets/pagamentos/{{$lista->pagamento}}">Ver</a></td>
                    <td><a data-bs-toggle="modal" data-bs-target="#declaracao{{$lista->code}}">Elaborar</a>
                                             <!--Inicio Modal declaracao-->
 <div class="modal fade" id="declaracao{{$lista->code}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Elaborar Declaracao</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{route('declaracao.estado',$lista->code)}}"  method="put" class="row g-3">
                @csrf
              
                <div class="col-md-4">
                                <label for="inputState" class="form-label">Estado</label>
                                <select id="inputState" class="form-select" name="estado">
                                <option  selected>Selecionar</option>
                                <option value="Pronto" >Pronto</option>
                                <option value="Pendente" >Pendente</option>
                                
                                </select>
                            </div>
               
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
    <!--Fim Modal fim inserir-->
                </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        
              
               
                  
                
                </div>
          
            
        



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