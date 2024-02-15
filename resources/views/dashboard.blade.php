<x-app-layout>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

    @can("RSA")
                            <a class="nav-link" href="{{route('funcionario.index')}}" style="background-color: green; margin-top: 10px; border-radius: 50px; text-align:justify;">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-plus-fill"></i></div>
                               Gerir Funcionarios
                            </a>

                            <a class="nav-link" href="{{route('aluno.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-vcard"></i></div>
                                Gerir Alunos
                            </a>
                            
                            <a class="nav-link" href="{{route('turma.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-pip-fill"></i></div>
                               Gerir Turmas
                            </a>
                            <a class="nav-link" href="{{route('disciplina.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-card-checklist"></i></div>
                               Gerir Disciplinas
                            </a>
                            <a class="nav-link" href="{{route('pauta.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                               Gerir Pautas
                            </a>
                            
                            <a class="nav-link" href="{{route('falta.listar')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                                Gerir Faltas
                            </a>
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#declaracao">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                               Requisitar Declaração
                            </a>
                           
@elsecan("FSA")
                            <a class="nav-link" href="{{route('aluno.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-vcard"></i></div>
                                Gerir Alunos
                            </a>
@endcan
@can('professor')
                            <a class="nav-link" href="{{route('pauta.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                               Gerir Pautas
                            </a>

@endcan
@can('UW')
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#declaracao">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                               Requisitar Declaração
                            </a>

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
                                <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-SISTEMA DE INFORMAÇÃO DO INSTITUTO POLITÉCNICO KATYAVALA BWILA</h2></caption>
                                <thead>
                                   
                                </thead>   
                                <tbody>
                                   
                                </tbody>
                    </table>

                    <div style="padding:150px; padding-left: 400px; border-radius: 30%; box-shadow: 2px 2px 20px black;">
                       
                        <img src="{{asset('imagens/ip.jpg')}}" alt="INSTITUTO POLITECNICO" width="200px" style="border-radius: 100px; box-shadow: 1px 1px  10px green;">
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
                                <!--Inicio Modal declaracao-->
 <div class="modal fade" id="declaracao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Buscar dados do Estuddante.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
             <form action=""  method="GET" class="row g-3">
                @csrf
              
              <div>
                <x-label for="name" value="{{ __('Nº de Identidade') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="identidade"  required autofocus autocomplete="0000" placeholder="Informe seu numero do BI" />
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

   
</x-app-layout>
