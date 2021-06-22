<h3>Nova Flor</h3>
<form action="{{ route('flor.store')}}" method="POST">
@csrf
<input type="text" name="nome">
<input type="submit" value="Salvar">
</form>
