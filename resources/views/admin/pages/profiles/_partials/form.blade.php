@include('admin.includes.alerts')

<div class="form-group">
    <label >Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $profile->name ?? ''}}">
</div>

<div class="form-group">
    <label >Descrição</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $profile->description ?? ''}}">
</div>
<div class="form-group">
    <button type="submit" class="btb btn-dark">Enviar</button>
</div>
