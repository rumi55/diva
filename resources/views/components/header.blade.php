<div class="topbar">
    <div class="address"><span>Адрес</span>Нижний новгород, улица Какая-то, д.12</div>
    <div class="email"><span>Email</span><a href="mailto:info@diva-nn.ru">info@diva-nn.ru</a></div>
    <div class="phone"><a href="tel:+7 (978) 730 89 10">+7 (978) 730 89 10</a></div>
</div>
<header id="header">
    <div class="logo">
        <a href="/"><img src="{{ asset('img/logo.svg') }}" alt=""></a>
    </div>
    <input type="checkbox" id="menuToggle">
    <label for="menuToggle" class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
        </svg></label>
    <nav class="menu">
        <ul>
            <li><a @if (Route::is('home')) class="active" @endif href="/">Главная</a></li>
            <li><a @if (Route::is('about')) class="active" @endif href="/about">О нас</a></li>
            <li><a href="/">Услуги</a></li>
            <li><a @if (Route::is('factor')) class="active" @endif href="/factor">Факторы успеха</a></li>
            <li><a href="/">Ассортимент</a></li>
            <li><a href="/">Контакты</a></li>
        </ul>
    </nav>
</header>
