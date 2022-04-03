
<label for="title">Nome : {{ $promo->title }}</label> 
<br><br>
<label for="description">Descrizione Promo : {{ $promo->description }}</label>
<br><br>
<label for="score">Score Promo : {{ $promo->score }}</label>
<br><br>   
<label for="price">Prezzo Promo : {{ $promo->price }}</label>
<br><br>   
<img src="{{asset('images/').'/'.$promo->image}}">
<br><br>      

</div>







