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


            <div id="layoutSidenav_content">
                <main>
                
                    <div class="container-fluid px-4">
                        
                    <!--Inicio Modal inserir aluno-->
<div class="modal fade" id="Inscrição" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario de inscrição</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('aluno.store') }}"  method="POST" class="row g-3"enctype="multipart/form-data">
                @csrf
                <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
              </div>
              <div class="mt-4">
                <x-label for="email" value="{{ __('Pai') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="pai" :value="old('pai')" required  />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Mãe') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="mae" :value="old('mae')" required  />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Data Nascimento') }}" />
                <x-input id="email" class="block mt-1 w-full" type="date" name="data_nascimento" :value="old('data_nascimento')" required />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Idade') }}" />
                <x-input id="email" class="block mt-1 w-full" type="numeric" name="idade" :value="old('idade')" required  />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Naturalidade') }}" />
                <x-input id="password" class="block mt-1 w-full" type="text" name="naturalidade" required autocomplete="Angola" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Provincia') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" name="provincia" required autocomplete="Benguela" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Municipio') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" name="municipio" required autocomplete="Benguela" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Telefone') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="text" name="telefone" required  />
            </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Genero</label>
                    <select id="inputState" class="form-select" name="genero">
                    <option value="M" selected>Selecionar</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Usuario</label>
                    <select id="inputState" class="form-select" name="usuario">
                    <option value="{{Auth::user()->id}}" selected>{{Auth::user()->name}}</option>
                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                    
                    </select>
                </div>
                <div class="mb-3">
                <label for="formFileSm" class="form-label">Carregar foto</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto">
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
<table class="table table-hover">
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
            <TD><img src="/assets/arquivos/{{$aluno->foto}}" alt="foto" style="box-shadow: 0px 0px 10px black; border-radius: 30px; width: 70px; height: 70px;" ></TD>
            <TD>{{$aluno->id}}</TD>
            <TD>{{$aluno->nome}}</TD>
            <TD>{{$aluno->genero}}</TD>
            <TD>{{$aluno->data_nascimento}}</TD>
            <TD>{{$aluno->naturalidade}}</TD>
            <TD>{{$aluno->telefone}}</TD>
            <TD>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar"><i class="bi bi-trash3-fill"></i></button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apagar"><i class="bi bi-eye-fill"></i></button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#apagar"><i class="bi bi-pencil-square"></i></button>
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
