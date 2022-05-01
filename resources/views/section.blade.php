

@foreach ($sections as $s)
<a href="{{route('questions',[$s->id])}}" style="text-decoration:none;"><button type="button" class="rounded-pill btn-rounded">{{$s->title}}
        <span><i class="fas fa-arrow-right"></i></span>
    </button>
</a>
@endforeach