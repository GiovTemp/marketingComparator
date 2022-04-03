<form method="POST" action="/admin/editPromo" enctype="multipart/form-data">
@csrf

<input 
    type="hidden"
    name="id"
     value={{ $promo->id }} >

<label for="title">Nome Promo</label>
 
<input id="title"
    type="text"
    name="title"
    class="@error('title') is-invalid @enderror"
    value={{ $promo->title }}>
 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>

<label for="description">Descrizione Promo</label>
 
<input id="description"
    type="text"
    name="description"
    
    class="@error('description') is-invalid @enderror"
    value={{ $promo->description }}>

    
 
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>
<label for="score">Score Promo</label>
 
<input id="score"
    type="text"
    name="score"
    class="@error('score') is-invalid @enderror"
    value={{ $promo->score }}>

    
 
@error('score')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>

<label for="price">Price Promo</label>
 
<input id="price"
    type="text"
    name="price"
    class="@error('price') is-invalid @enderror"
    value={{ $promo->price }}>

    
 
@error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>
<label for="image">Immagine Promo</label>
 
<input id="image"
    type="file"
    name="image"
    class="@error('image') is-invalid @enderror"
    >

    
 
@error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<br><br>
<input type="submit"/>

</form>

