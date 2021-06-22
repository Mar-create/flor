<h3>Flor</h3>
<a href="{{route('flor.create')}}">Nova Flor</a>
<ol>
    @foreach ($flor as $flor)
<li>
{{ $flor['nome']}}
<a href="{{route('flor.edit' ,$flor['id'])}}">Editar</a>
</li>
@endforeach
</ol>