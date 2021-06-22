<h3>Editar Flor</h3>
<form action="{{ route('flor.update', $flor['id'])}}" method="POST">
@csrf
@method('PUT')
<input type="text" name="nome" value="{{ $flor['nome']}}">
<input type="submit" value="Salvar">
</form>