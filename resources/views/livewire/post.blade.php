<div class="bg-white  text-white">

    
<div class=" text-white text-2xl m-0 p-2 bg-black w-10/12">KIZALU SOFT</div>
  <div class=" bg-slate-400 flex flex-rows gap-4 grid-flow-row hover:bg-slate-700">

    <div class=" rounded-full bg-red-600 h-10 w-10 ">  </div>
    <div class="rounded-full bg-green-600 h-10 w-10"></div>
    <div class="rounded-full bg-yellow-600 h-10 w-10"></div>   
  </div>

   <div  class="bg-slate-400">
        <form wire:submit="salvar" class="bg-slate-400 m-auto shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <input class="border rounded w-full py-2 px-6 text-gray-700 leading-tight " type="text" wire:model="tituloo" placeholder="Escrever o curso">
                <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight " type="text" wire:model="contente" placeholder="Escrever descricao">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md ">salvar</button>
                <button type="reset" class="bg-blue-500 text-white py-2 px-4 rounded-md ">Limpar</button>
                <span wire:loading> Salvando...</span>
            </form>
   </div>
    
        <table class="table-auto border ">
                <thead>
                    <tr>
                    <th>Titulo</th>
                    <th>Desc</th>
                    <th>ID</th>
                    <th>p</th>
                    <th>t</th>                      
                    <th>p</th>
                    <th>Iliminar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($livro as $pl)
                <tr wire:key="{{$pl->id}}">
                    <td >{{$pl->titulo}} </td>
                    <td >{{$pl->contente}} </td>
                    <td >{{$pl->id}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="bg-red-500 text-white py-2 px-4 rounded-md " wire:click="iliminar({{$pl->id}})">X</button></td>
                </tr>
                @endforeach
                </tbody> 
        </table>

<div class="">
    <input type="text" wire:model="todo" placeholder="escrever algo">
<button class="bg-blue-500 text-white py-2 px-4 m-auto rounded-md " wire:click="listar">adicionar</button>
<p>Quantidade de letra: <h5 x-text="$wire.todo.length"></h5></p>
    <ul>
        @foreach($todos as $lista)
        <li>
            {{$lista}}
        </li>
        @endforeach
    </ul>   
</div>
<h6>{{$titulo}}</h6>
    <h5>{{$contar}}</h5>
    <button wire:click="add">+</button>
    <button wire:click="sub">-</button>


    
       
</div>


