<h3>Flor</h3>
<a href="{{route('flor.create')}}">Nova Flor</a>
<ol>
    @foreach ($flor as $flor)
<li>
{{ $flor['nome']}}
<a href="{{route('flor.edit' ,$flor['id'])}}">Editar</a>
<a href="{{route('flor.show' ,$flor['id'])}}">Dados</a>
<form action="{{ route('flor.destroy', $flor['id'])}}" method="POST">
@csrf
@method('DELETE')
<input type="submit" value="Apagar">
</form>
</li>
@endforeach
</ol>