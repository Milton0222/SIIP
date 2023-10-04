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
                        <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-check"></i></div>
                                Matriculas
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-dash-fill"></i></div>
                                Faltas
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
            <TD><img src="/assets/arquivos/{{$aluno->foto}}" alt="foto" style="box-shadow: 0px 0px 10px black; border-radius: 30px; width: 70px; height: 70px;" ></TD>
            <TD>{{$aluno->id}}</TD>
            <TD>{{$aluno->nome}}</TD>
            <TD>{{$aluno->genero}}</TD>
            <TD>{{$aluno->data_nascimento}}</TD>
            <TD>{{$aluno->naturalidade}}</TD>
            <TD>{{$aluno->telefone}}</TD>
            <TD>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar{{$aluno->id}}"><i class="bi bi-trash3-fill"></i></button>
                    <!--Inicio Modal apagar-->
<div class="modal fade" id="apagar{{$aluno->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletando {{$aluno->nome}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('aluno.destroy',$aluno->id) }}"  method="DELETE" class="row g-3" style="background-color: black;">
                @csrf
                
                    <h3 style="color: red;">Deseja Ilimimar {{$aluno->name}} ?</h3>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                </div>
            </form>

      </div>
      
    </div>
  </div>
</div>
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

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#matricula{{$aluno->id}}"><i class="bi bi-person-fill-check"></i></button>
<!--Inicio Modal matricula-->
<div class="modal fade" id="matricula{{$aluno->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario para confirmar matricula</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action="{{ route('matricula.store',$aluno->id) }}"  method="POST" class="row g-3" >
                @csrf
                    <div class="mt-4" style="padding-left: 40%; background-color: whitesmoke;">
                    <x-label for="email" value="{{$aluno->nome}}" />
                    <x-label for="email" value="{{$aluno->naturalidade}}" />
                    <x-label for="email" value="{{$aluno->pai}}" />
                    <x-label for="email" value="{{$aluno->mae}}" />
                    <x-label for="email" value="{{$aluno->telefone}}" />
                    </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Ano Lectivo') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="anoLetivo" :value="old('anoLecttivo')" required />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Data da confirmação') }}" />
                <x-input id="email" class="block mt-1 w-full" type="date" name="data" :value="old('anoLecttivo')" required />
            </div>
            <div class="col-md-4">
                    <label for="inputState" class="form-label">Aluno</label>
                    <select id="inputState" class="form-select" name="aluno">
                    <option value="{{$aluno->id}}" selected>{{$aluno->nome}}</option>
                    </select>
            </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Curso</label>
                    <select id="inputState" class="form-select" name="curso">
                    <option value="" selected>Selecionar</option>
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}">{{$curso->nome}}</option>
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
    <!--Fim Modal matricula-->
    <form action="{{route('matricula.imprimir',$aluno->id)}}" ><button type="submit" class="btn btn-primary"><i class="bi bi-printer-fill"></i></button></form>

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
