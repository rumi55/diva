<div class="topbar">
    <div class="address"><span>Адрес</span>{{ $site->address_crop }}</div>
    <div class="email"><span>Email</span><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></div>
    <div class="phone"><a
            href="tel:{{ str_replace([' ', '(', ')', '-'], '', $site->phone) }}">{{ $site->phone }}</a></div>
</div>
<header id="header">
    <div class="logo">
        <a href="/" aria-label="Логотип ГК «Дива»"><img src="{{ asset('img/logo.svg') }}" alt=""></a>
    </div>
    <input type="checkbox" id="menuToggle">
    <label for="menuToggle" class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
        </svg></label>
    <nav class="menu">
        <ul>
            @foreach (\App\Models\Menu::where('type', '=', 'top')->get() as $item)
                @foreach ($item->repeater as $menuitem)
                    <li @if ($menuitem['subrep']) class="master" @endif><a
                            @if (Illuminate\Support\Str::endsWith(Illuminate\Support\Facades\URL::current(), $menuitem['menu_slug'] ?? url('/') )) 
                         
                          class="active" 
                          @endif
                       
                            href="/{{ $menuitem['menu_slug'] }}">{{ $menuitem['menu_title'] }}</a>
                        @if ($menuitem['subrep'])
                            <input type="checkbox" name="{{ Illuminate\Support\Str::slug($menuitem['menu_title']) }}"
                                id="{{ Illuminate\Support\Str::slug($menuitem['menu_title']) }}">
                            <label for="{{ Illuminate\Support\Str::slug($menuitem['menu_title']) }}"><svg width="10"
                                    height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="sc-1s30kz8-14 blwLTc">
                                    <path d="M9 5L5 1L1 5" stroke=""></path>
                                </svg></label>

                            <ul class="slave">

                                @foreach ($menuitem['subrep'] as $sub)
                                    <li>
                                        <a
                                            href="/{{ $menuitem['menu_slug'] }}/{{ $sub['menu_subslug'] }}">{{ $sub['menu_subtitle'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endforeach
        </ul>
    </nav>
</header>
