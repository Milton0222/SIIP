<x-app-layout>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">


                        @can("RSA")
                            <a class="nav-link" href="{{route('funcionario.index')}}" style="background-color: green; margin-top: 10px; border-radius: 50px; text-align:justify;">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-plus-fill"></i></div>
                                Funcionarios
                            </a>

                            <a class="nav-link" href="{{route('aluno.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-vcard"></i></div>
                                Alunos
                            </a>
                            
                            <a class="nav-link" href="{{route('turma.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-pip-fill"></i></div>
                                Turmas
                            </a>
                            <a class="nav-link" href="{{route('disciplina.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-card-checklist"></i></div>
                                Disciplinas
                            </a>
                            <a class="nav-link" href="{{route('pauta.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                                Pautas
                            </a>
                            
                            <a class="nav-link" href="{{route('falta.listar')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                                Faltosos
                            </a>
                           
@elsecan("FSA")
                            <a class="nav-link" href="{{route('aluno.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-vcard"></i></div>
                                Alunos
                            </a>
@endcan
@can('professor')
                            <a class="nav-link" href="{{route('pauta.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                                Pautas
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
                                <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Informações</h2></caption>
                                <thead>
                                   <th>ID</th>
                                   <TH>ALUNO</TH>
                                   <TH>DISCIPLINA</TH>
                                   <TH>NOTA</TH>
                                   <TH>ESTADO</TH>
                                </thead>   
                                <tbody>
                                    @foreach($pautas as $pauta)
                                    <tr>
                                        <td>{{$pauta->id}} </td>
                                        <td>{{$pauta->nome}} </td>
                                        <td>{{$pauta->disciplina}} </td>
                                        <td>{{$pauta->valor}} </td>
                                        <td>{{$pauta->classificacao}} </td>
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
