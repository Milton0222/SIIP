<x-app-layout>


<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                      
                        <a href="{{route('estudante.docuumentos',$code)}}"  class="nav-link">
                              <button  type="button" class="btn" style="color: white;">
                                Documentos
                              </button>

                        </a>
                        <!--
                        <a href=""  class="nav-link">
                              <button  type="button" class="btn" style="color: white;">
                                Pauta
                              </button>

                        </a>-->
                           
  
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
        <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">{{$aluno}}-Declarações</h2></caption>
            <thead>
                <th>TIPO</th>
                <th>ANO DE FREQUÊNCIA</th>
                    <th>ESTADO</th>
                    <TH>EFEITO</TH>
                <th>PAGAMENTO</th>
                <th>OBS</th>
            </thead>
            <tbody>
                @foreach($estudante as $lista)
                <tr>
                    <td>{{$lista->tipo}}</td>
                    <td>{{$lista->anoFrequencia}}</td>
               <td>{{$lista->estado}}</td>
               <td>  <textarea name="efeito" id="" cols="39" rows="2">{{$lista->efeito}}</textarea></td>
                    <td><a href="/assets/pagamentos/{{$lista->pagamento}}">Ver</a></td>
                    <td>
                        @if($lista->estado=="Pronto")
                              Levantar sua Declaração na secretaria.
                        @else
                                 Aguardar o processo de analise.
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
              
               <hr>
               <div style="background-color: green; height: 30px;">
               <h5 style="margin-left: 370PX;">REQUISITAR DECLARAÇÃO</h5>

               </div>
               
               <hr>
                <div >
                    
                      <form action="{{route('estudante.requisitar')}}" method="POST" class="table" enctype="multipart/form-data">
                                @csrf
                                 
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Tipo Declaração</label>
                                <select id="inputState" class="form-select" name="tipo">
                                <option  selected>Selecionar</option>
                                <option value="com nota" >Com notas</option>
                                <option value="frequência" >Frequência</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Ano Lectivo</label>
                              <input type="text" name="anoLectivo" id=""  class="form-control form-control-sm" placeholder="2023/2024">
                            </div>
                            <div class="col-md-4">
                                <label for="formFileSm" class="form-label">Comprovativo</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="pagamento">
                            </div>
                            <div class="col-md-4">
                              
                                <input class="form-control form-control-sm" id="matricula" type="numeric" name="code"  value="{{$lista->matricula}}" >
                                <textarea name="efeito" id="" cols="39" rows="2">Escrver o efeito da Declaração</textarea>
                            </div>

                            <div class="modal-footer">
                            
                                <button type="submit" class="btn btn-success">Requisitar</button></td>
                               
                           
                            </div>

                      </form>
                  
                
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