<div class="main__services">
    <div class="heading">Наши услуги</div>
    <div class="content__blocks">
        @foreach (\App\Models\Post::where('category_id','3')->get() as $item)
        <div class="service__card">
            @if ($item->preview)
            <img src="/storage/{{ $item->preview }}" alt="">
            @else
            <img src="{{ asset('img/1.jpg') }}" alt="">
            @endif
          
            <a href="{{ $item->category->slug }}/{{ $item->slug }}" class="card__name">{{$item->title}}</a>

        </div>
        @endforeach
        
    </div>
</div>
