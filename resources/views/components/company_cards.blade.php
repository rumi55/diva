<div class="company__cards__block">
    <div class="company__cards__heading">
        <h2>Связаться с нами</h2>
    </div>


    <div class="company__cards__list">
        <div class="company__cards__item company__phones">
            @include('components.text_block_1')
        </div>
        <div class="company__cards__item company__address">
            <p><strong>Адрес</strong></p>
            <p>{{ $site->address_full }}</p>
            <p><strong>Email</strong></p>
            <p><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></p>
            

          
            @foreach (App\Models\Block::where('type', 'files')->get() as $item)
            <p><strong>{{ $item->title }}</strong></p>
            <div class="company__pdf">
            @foreach($item->repeater as $repeater)
            <a target="_blank" href="/storage/{{ $repeater['picture'] }}">{{ $repeater['title'] }} (PDF)</a>
            @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
