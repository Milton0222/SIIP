<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body{
            margin: 0px;
            padding: 0px;
            background-color: whitesmoke;
        }
        .table{
            background-color: rgb(233,233,233);
            width:100%;
        }
        .table >th{
            padding: 10px;
            background-color: rgb(140,218,255);
        }
        .table > td{
            padding:10px;
        }

thead,
tbody,
tr,
td,
.table{
            background-color: rgb(233,233,233);
            width:100%;
        }
        .table >th{
            padding: 10px;
            background-color: rgb(140,218,255);
        }
        .table > td{
            padding:10px;
        }
    </style>

</head>
<body>
@include('sweetalert::alert')
<div class="rotulo">
    <p style="text-align: center; font-family: 'Courier New', Courier, monospace; font-style: oblique;">FACULDADE/INSTITUTO POLITÉCNICO DA UKB</p>
</div>
<table class="table">
        <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Recibo de matricula</h2></caption>
    
        <thead>
        <th>Nº matricula</th>
        <th>Nome</th>
        <th>Especialidade</th>
        <th>Lectivo</th>
        <th>Data matricula</th>
        <th>Frequência</th>
        <th>Periodo</th>
    </thead>
    
    <TBody>
        @foreach($fichaMatricula as $ficha)
        <tr>
            <td>{{$ficha->id}}</td>
            <td>{{$ficha->aluno}}</td>
            <td>{{$ficha->curso}}</td>
            <td>{{$ficha->anoLetivo}}</td>
            <td>{{$ficha->data}}</td>
            <td>{{$ficha->classe}}</td>
            <td>{{$ficha->periodo}}</td>
        </tr>
        
    @endforeach
    
    </TBody>
</table>
    <hr>
    <footer style="float:bottom">
    
    <p >Funcionario:{{Auth::user()->name}}<hr> </p>

    <label style="color: grey; object-position: center; "> Processado by @SIIP 2023</label>
</footer>
</body>
</html>