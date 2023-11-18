<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Historial Académico') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assetes/faturacao.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">

</head>
<body>
@include('sweetalert::alert')

<div class="folha">
<button type="submit" class="btn btn-primary" onclick="print()"><i class="bi bi-printer-fill"></i></button>
   <div class="cabecalho">
    <img src="/imagens/ipl.png" alt="" style="width: 100%; height: 25%;">

   </div>
   
   <hr>
   @foreach($aluno as $ficha)
                <div class="cabecalho2">
                    <div class="cliente">
                        <h1>Dados Pessoais</h1>
                   
                            @php 
                               $codigo=$ficha->id;
                               
                            @endphp
                               
                                <p>Nome: {{$ficha->nome}}</p>
                                <p>Data de Nascimento: {{$ficha->data_nascimento}}</p>
                                <p>Genero: {{$ficha->geenero}}</p>
                                <p>Natural de: {{$ficha->naturalidade}}</p>
                                <p>Provincia de: {{$ficha->provincia}}</p>
                                <p>Municipio de: {{$ficha->municipio}}</p>
                                <p>Nome Pai: {{$ficha->pai}}</p>
                                <p>Nome mãe: {{$ficha->mae}}</p>

                    </div>
                    @endforeach
                    @foreach($dadosAcademico as $lista)
                    <div class="sobre-fatura">
                        <h1><span>Dados Académicos</span></h1>
                        <p>Curso : {{$lista->curso}}</p
                        <p>Núm Matricula : {{$lista->id}}</p>
                        <P>Ano de Maatricula: {{$lista->ano}}</P>
                        <p>Periodo: {{$lista->periodo}}</p>
                    </div>
                </div>
                @endforeach
                
    <br>
    <table class="table" >
        <p class="acumulo">classificacão<span>Estudante</span></p>  
  <thead >

      
    
  <tr class="custom-th">
      <th scope="col" >Unidade Curricular</th>
      <th scope="col">Tipo Exame</th>  
      <th scope="col">Nota</th>
      <th scope="col">Observação</th>
  </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($inscrito as $lista)
  <tr  class="custom-th">
      <th scope="row">{{$lista->nome}}</th>
      <td>...</td>
      <td>{{$lista->valor}}</td>
      <td>{{$lista->classificacao}}</td>
     
  </tr>
  @endforeach
  </tbody>
</table>
                                     
                                      
<hr>
                                               
                                                   <!--funcionario -->
                                                <div class="funcionario">
                                                <p>O DECANO</p>
                                                    <p>____________________________</p>
                                                   
                                                </div>
                                
                                                
                                

                                     
        <footer>
            <hr style="">
            <p>NIF:############-Empresa /Rua Doctor Antonio, 122, 3 andar, Benguela /220 399 933/ informacao@gmail.com /##########################</p>
        </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>