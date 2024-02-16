<x-app-layout> 

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                      
                        <a href=""  class="nav-link">
                              <button  type="button" class="btn" style="color: white;">
                                Documentos
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


        <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Estudante </h2></caption>
        
@foreach($estudante as $lista)
        <form  class="row g-3">
             
                <div>
                <img src="/assets/arquivos/{{$lista->foto}}" alt="FOOTO" style="border-radius: 30px; width: 60px; height: 60px; margin: auto; box-shadow: 2px 2px 10px black;">

                <label style="margin: auto; margin-left: 440px;">{{$lista->nome}}:: {{$lista->matricula}}</label>
                

              </div>
              
              <div>
                <x-label for="name" value="{{ __('Nº de identidade') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" max='14' min='14' name="identidade" value="{{$lista->identidade}}" required autofocus autocomplete="nome" />
              </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Periodo') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" value="{{$lista->periodo}}" required autocomplete="Benguela" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Telefone') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" value="{{$lista->telefone}}" name="telefone" required  />
            </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Genero</label>
                    <select id="inputState" class="form-select" name="genero">
                    <option value="{{$lista->genero}}" selected>{{$lista->genero}}</option>
                
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Curso</label>
                    <select id="inputState" class="form-select" name="">
                    <option value="{{$lista->curso}}" selected>{{$lista->curso}}</option>
                
                    </select>
                  
                </div>
               
                <div class="col-md-4">
                <label for="formFileSm" class="form-label">Ano de Frequência</label>
                <select id="inputState" class="form-select" name="">
                    <option value="{{$lista->classe}}" selected>{{$lista->classe}}</option>
                
                    </select>
                
               </div>
</form>
              
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
                                <option value="1" >Com notas</option>
                                <option value="2" >Frequência</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="formFileSm" class="form-label">Comprovativo</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="pagamento">
                            </div>
                            <div class="col-md-4">
                              
                                <input class="form-control form-control-sm" id="matricula" type="numeric" name="code"  value="{{$lista->matricula}}" >
                            </div>

                            <div class="modal-footer">
                            
                                <button type="submit" class="btn btn-success">Requisitar</button></td>
                               
                           
                            </div>

                      </form>
                      @endforeach
                
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