<div class="contact__form-1">
    <div class="contact__heading">Напишите нам</div>
    <form wire:submit.prevent="saveMessage" action="/contacts" method="POST">
        @csrf
        <div class="form__field form__name">
            <label for="name">Имя *</label>
            <input wire:model="name" type="text" name="name" id="" placeholder="Ваше имя" required>
            @error('name')
                <div class="form__field-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__field form__email">
            <label for="email">Email *</label>
            <input wire:model="email" type="email" name="email" id="" placeholder="email@example.com"
                required>
            @error('email')
                <div class="form__field-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__field form__phone">
            <label for="phone">Телефон</label>
            <input wire:model="phone" type="tel" name="phone" id="" placeholder="Номер">
        </div>
        <div class="form__field form__text">
            <label for="text">Сообщение *</label>
            <textarea wire:model="text" name="text" id="" cols="30" rows="5" placeholder="Задайте ваш вопрос"
                required></textarea>
            @error('text')
                <div class="form__field-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__field agree-msg">
            <input wire:model="checkbox" type="checkbox" name="checkbox" value="{{ $checkbox }}">
            <p>Отправляя сообщение, Вы даёте согласие на обработку персональных данных</p>

        </div>
        <div class="form__field form__btn">

            <button type="submit">Отправить</button>
        </div>

        @if ($errors->isNotEmpty())
            <div class="form__error">
                Ошибка в форме
            </div>
        @endif

        <div id="showModal" class="@if (session()->has('message')) modal-active @endif form__modal">

            <p class="modal__heading">Сообщение отправлено!</p>
            <p>Спасибо за обращение! Наш сотрудник свяжется с Вами в ближайшее время</p>
            <button id="closeModal" type="button">x</button>
        </div>
    </form>
</div>
@livewireScripts
