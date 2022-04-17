@foreach ($post->blocks->where('type', 'stages') as $item)
    <div class="stages__block">
        @if ($item->name)
            <div class="stages__heading">
                <h3>{{ $item->name }}</h3>
        @endif
    </div>
    <div class="stages__tab">
        @foreach ($item->repeater as $item_rep => $element)
            <input type="radio" class="input__tab" name="tabs"
                id="{{ Illuminate\Support\Str::slug($element['title']) }}" hidden=""
                @if ($item_rep === 0) checked @endif>
        @endforeach
        <ul>
            @foreach ($item->repeater as $item_label)
                <li>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                          </svg> --}}
                          
                    <img src="/storage/{{ $item_label['picture'] }}" alt="">
                    <p>{{ $item_label['title'] }}</p>
                    <label for="{{ Illuminate\Support\Str::slug($item_label['title']) }}"></label>
                </li>
            @endforeach
        </ul>
        <div class="w-full">
            @foreach ($item->repeater as $con_item)
                <div class="tab__content">

                    <p>{!! $con_item['description'] !!}</p>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endforeach
{{-- <div class="stages__block">
    <div class="stages__heading">
        Этапы цепи поставок
    </div>
    <div class="stages__tab flex mx-auto flex-wrap w-full">
        <input type="radio" class="input__tab" name="delivery" value="delivery" id="Планирование" hidden=""
            aria-hidden="true" checked>
        <input type="radio" class="input__tab" name="delivery" value="delivery" id="Выращивание" hidden=""
            aria-hidden="true">
        <input type="radio" class="input__tab" name="delivery" value="delivery" id="Сбор и хранение" hidden=""
            aria-hidden="true">
        <input type="radio" class="input__tab" name="delivery" value="delivery" id="Обработка" hidden=""
            aria-hidden="true">
        <input type="radio" class="input__tab" name="delivery" value="delivery" id="Фасовка" hidden=""
            aria-hidden="true">
        <input type="radio" class="input__tab" name="delivery" value="delivery" id="Доставка" hidden=""
            aria-hidden="true">
        <ul>
            <li><label for="Планирование">Планирование</label></li>
            <li><label for="Выращивание">Выращивание</label></li>
            <li><label for="Сбор и хранение">Сбор и хранение</label></li>
            <li><label for="Обработка">Переработка</label></li>
            <li><label for="Фасовка">Фасовка и упаковка</label></li>
            <li><label for="Доставка">Доставка</label></li>
        </ul>
        <div class="w-full">
            <div class="tab__content">
               
                <p>Мы предоставляем сельхозпроизводителям информацию о текущем и будущем спросе на
                    продукцию и гарантируем продажи заказанных объёмов, тем самым помогая
                    сельхозпроизводителям планировать ассортимент и объёмы выращивания.</p>
            </div>
            <div class="tab__content">
               
                <p>Мы сами выращиваем сельхозпродукцию, а также реализуем партнёрские программы
                    выращивания на площадях российских и зарубежных сельхозпроизводителей.</p>
            </div>
            <div class="tab__content">
               
                <p>Мы обеспечиваем сельхозпроизводителей тарой и изотермическим транспортом для
                    уборки и перевозки урожая. Обеспечиваем надлежащие условия транспортировки и
                    хранения сельхозпродукции.</p>
            </div>
            <div class="tab__content">
               
                <p>Мы проводим анализ, отбор, сортировку, калибровку и очистку сельхозпродукции для
                    обеспечения её соответствия требованиям по качеству, в соответствии со
                    спецификациями заказчиков.</p>
            </div>
            <div class="tab__content">
              
                <p>Мы осуществляем фасовку и упаковку продукции по индивидуальным требованиям
                    заказчиков, а также работаем над расширением возможностей в этой области.
                </p>
            </div>
            <div class="tab__content">
               
                <p>Мы обеспечиваем своевременную доставку заказанных партий подготовленной
                    продукции, строго соблюдая правила транспортировки в «холодовой цепи».</p>
            </div>
        </div>
    </div>
</div> --}}
