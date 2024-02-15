<x-app-layout>

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                        <a class="nav-link"  href="{{route('aluno.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-add"></i></div>
                                <button type="button"  class="btn" style="color: white;">Alunos
                               </button>
                        </a>
                        <a href="{{route('confirmado.index')}}" class="nav-link">
                              <button  type="button" class="btn" style="color: white;">
                                Confirmados
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
                        
<table class="table table-hover caption-top">
        <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Alunos</h2></caption>
    <thead>
        <TH>FOTO</TH>
         <th>ID</th>
         <TH>NOME</TH>
         <TH>GENERO</TH>
         <TH>DATA NASCIMENTO</TH>
         <TH>NATURALIDADE</TH>
         <TH>TELEFONE</TH>
         <TH>METODO</TH>
    </thead>
    <TBOdy>
        @foreach($alunos as $aluno)
        
        <TR>
            <TD> <a class=nav-link href="{{route('aluno.historico',$aluno->id)}}"><img src="/assets/arquivos/{{$aluno->foto}}" alt="foto" style="box-shadow: 0px 0px 10px black; border-radius: 30px; width: 70px; height: 70px;" ></a></TD>
            <TD>{{$aluno->id}}</TD>
            <TD>{{$aluno->nome}}</TD>
            <TD>{{$aluno->genero}}</TD>
            <TD>{{$aluno->data_nascimento}}</TD>
            <TD>{{$aluno->naturalidade}}</TD>
            <TD>{{$aluno->telefone}}</TD>
            <TD>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
           

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalhes{{$aluno->id}}"><i class="bi bi-eye-fill"></i></button>
   <!--Inicio Modal ver aluno-->
   <div class="modal fade" id="detalhes{{$aluno->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Dados sobre {{$aluno->nome}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action=""  method="POST" class="row g-3"enctype="multipart/form-data">
                @csrf
                <div>
                <img src="/assets/arquivos/{{$aluno->foto}}" alt="" style="border-radius: 30px; width: 60px; height: 60px; margin: auto; box-shadow: 2px 2px 10px black;">
                <x-input id="name" class="block mt-1 w-full" type="text" name="nome" value="{{$aluno->nome}}" required autofocus autocomplete="nome" />
              </div>
              <div class="mt-4">
                <x-label for="email" value="{{ __('Pai') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="pai" value="{{$aluno->pai}}" required  />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Mãe') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="mae" value="{{$aluno->mae}}" required  />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Data Nascimento') }}" />
                <x-input id="email" class="block mt-1 w-full" type="date" name="data_nascimento" value="{{$aluno->data_nascimento}}" required />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Idade') }}" />
                <x-input id="email" class="block mt-1 w-full" type="numeric" name="idade" value="{{$aluno->idade}}" required  />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Naturalidade') }}" />
                <x-input id="password" class="block mt-1 w-full" type="text" name="naturalidade" value="{{$aluno->naturalidade}}"  />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Provincia') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" name="provincia" value="{{$aluno->provincia}}" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Municipio') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" name="municipio" value="{{$aluno->municipio}}" required autocomplete="Benguela" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Telefone') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" name="telefone" required value="{{$aluno->telefone}}"  />
            </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Genero</label>
                    <select id="inputState" class="form-select" name="genero">
                    <option value="{{$aluno->genero}}" selected>{{$aluno->genero}}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Usuario</label>
                    <select id="inputState" class="form-select" name="usuario">
                    <option value="{{Auth::user()->id}}" selected>{{Auth::user()->name}}</option>
                    
                    </select>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
    <!--Fim Modal ver-->
    <form action="{{route('matricula.imprimir',$aluno->id)}}" >
        <button type="submit" class="btn btn-primary"><i class="bi bi-printer-fill"></i></button>
    </form>

            </div>
        </TD>
        </TR>
        @endforeach
    </TBOdy>
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