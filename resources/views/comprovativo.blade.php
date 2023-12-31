<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Comprovativo') }}</title>

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
   @foreach($fichaMatricula as $ficha)
                <div class="cabecalho2">
                    <div class="cliente">
                        <h1>Dados da matricula</h1>
                   
                            @php 
                               $codigo=$ficha->id;
                               
                            @endphp
                               
                                <p>Nome: {{$ficha->aluno}}</p>
                                <p>Curso: {{$ficha->curso}}</p>
                                
                                <p>Frequência: {{$ficha->classe}}</p>
                                <p>Periodo: {{$ficha->periodo}}</p>
    
        
                            
                       
                    </div>
                    <div class="sobre-fatura">
                        <h1>Recibo<span>Original</span></h1>
                        <p>Nº : {{$codigo}}</p>
                        <P>Data: {{$ficha->data}}</P>
                        <p>Ano Lectivo: {{$ficha->anoLetivo}}</p>
                    </div>
                </div>
                @endforeach
    <br>
    <table class="table" >
        <p class="acumulo">Dados pessoal<span>Estudante</span></p>  
  <thead >

      
    
  <tr class="custom-th">
      <th scope="col" >Codigo</th>
      <th scope="col">Nome</th>  
      <th scope="col">Pai</th>
      <th scope="col">Mae</th>
      <th scope="col">Genero</th>
      <th scope="col">Naturalidade</th>
      <th scope="col">Provincia</th>
      <th scope="col">Contacto</th>

  </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($inscrito as $lista)
  <tr  class="custom-th">
      <th scope="row">{{$lista->id}}</th>
      <td>{{$lista->nome}}</td>
      <td>{{$lista->pai}}</td>
      <td>{{$lista->mae}}</td>
      <td>{{$lista->genero}}</td>
      <td>{{$lista->naturalidade}}</td>
      <td>{{$lista->provincia}}</td>
      <td>{{$lista->telefone}}</td>
  </tr>
  @endforeach
  </tbody>
</table>
                                     
                                      
<hr>
                                               
                                                   <!--funcionario -->
                                                <div class="funcionario">
                                                    <p>____________________________</p>
                                                   <p>funcionário</p>
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