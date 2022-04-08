Lista Richieste Preventivi
                    @foreach ($requests as $r)
                    <br>
                        {{ $r->name }}
                        {{ $r->surname }}
                        {{ $r->email }}
                        {{ $r->cf }}
                        {{ $r->iva }}
                        {{ $r->name_promo }}
                        @if ($r->id_promo !== null)
                        <button><a href="{{route('viewPromo',[$r->id_promo])}}">View Promo</a></button>
                        @endif
                        
                        <button><a href="{{route('deleteAnswer',[$r->id])}}">Delete</a></button>
                             
                    @endforeach