<form method="POST" action="/admin/createPromo">
@csrf
<label for="title">Nome Promo</label>
 
<input id="title"
    type="text"
    name="title"
    class="@error('title') is-invalid @enderror">
 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>

<label for="description">Descrizione Promo</label>
 
<input id="description"
    type="text"
    name="description"
    class="@error('description') is-invalid @enderror">

    
 
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="score">Score Promo</label>
 
<input id="score"
    type="text"
    name="description"
    class="@error('score') is-invalid @enderror">

    
 
@error('score')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="imgPromo">Immagine Promo</label>
 
<input id="imgPromo"
    type="file"
    name="imgPromo"
    class="@error('imgPromo') is-invalid @enderror">

    
 
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<input type="submit"/>

</form>

