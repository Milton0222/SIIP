<x-app-layout>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color: gainsboro;">
                        <div class="nav ">

                            <a class="nav-link" href="{{route('aluno.index')}}">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-vcard"></i></div>
                                Alunos
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
                                <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Aluno-Faltas</h2></caption>
                                <thead>
                                    <th>ID</th>
                                    <TH>ALUNO</TH>
                                    <TH>GENERO</TH>
                                    <TH>FALTAS</TH>
                                    <TH>DATA</TH>

                                </thead>
                                <tbody>
                                        @foreach($faltas as $falta)
                                        <tr>
                                            <td>{{$falta->id}}</td>
                                            <td>{{$falta->nome}}</td>
                                            <td>{{$falta->genero}}</td>
                                            <td>{{$falta->qtdFaltas}}</td>
                                            <td>{{$falta->data}}</td>
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
