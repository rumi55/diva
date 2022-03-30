@foreach (\App\Models\Block::where('type', 'stages')->get() as $item)
    <div class="stages__block">
        <div class="stages__heading">
            {{ $item->title }}
        </div>
        <div class="stages__tab flex mx-auto flex-wrap w-full">
            @foreach ($item->repeater as $item_rep => $element)
                <input type="radio" class="input__tab" name="tabs" id="{{ Illuminate\Support\Str::slug($element['title']) }}"
                    hidden="" aria-hidden="true" @if ($item_rep === 0) checked @endif>
            @endforeach
            <ul>
                @foreach ($item->repeater as $item_label)
                    <li><label for="{{ Illuminate\Support\Str::slug($item_label['title']) }}">{{ $item_label['title'] }}</label></li>
                @endforeach
            </ul>
            <div class="w-full">
                @foreach ($item->repeater as $con_item)
                    <div class="tab__content">

                        <p>{{ $con_item['description'] }}</p>
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



