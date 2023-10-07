<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
@include('sweetalert::alert')
<table class="table table-hover caption-top">
        <caption> <h2 style="font-family: 'Courier New', Courier, monospace; font-size: x-large; color: black;">SIIP-Confirmação de matricula</h2></caption>
    <thead>
        <th>CODIGO</th>
        <th>NOME</th>
        <th>CURSO</th>
        <th>ANO LECTIVO</th>
        <th>DATA</th>
        <th>FREQUENCIA</th>
        <th>PERIODO</th>
    </thead>
    <TBody>
        @foreach($fichaMatricula as $ficha)
        <TR>
            <td>{{$ficha->id}}</td>
            <td>{{$ficha->aluno}}</td>
            <td>{{$ficha->curso}}</td>
            <TD>{{$ficha->anoLetivo}}</TD>
            <td>{{$ficha->data}}</td>
            <td>{{$ficha->classe}}</td>
            <td>{{$ficha->periodo}}</td>
        </TR>
        
    @endforeach
    </TBody>
</body>
</html>