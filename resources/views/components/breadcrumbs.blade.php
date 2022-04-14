<div class="breadcrumbs">
    <div class="breadcrumbs__image">
        @yield('background')
        <ul class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="/" title="Главная" itemprop="item">
                    <span itemprop="name">Главная</span>
                    <meta itemprop="position" content="1">
                </a>
            </li>
            <?php $b = 2; ?>
            @foreach ($breadcrumbs = array_reverse($breadcrumbs) as $breadcrumb)
                  
                    @if ($breadcrumb['link'] == '')
                    <li>
                        <span>{{ $breadcrumb['title'] }}</span>
                        {{-- <meta itemprop="position" content="{{ $b++ }}"> --}}
                    </li>
                    @else
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="/{{ $breadcrumb['link'] }}" title="{{ $breadcrumb['title'] }}">
                            <span itemprop="name">{{ $breadcrumb['title'] }}</span></a>
                        <meta itemprop="position" content="{{ $b++ }}">
                    </li>
                    @endif
               
            @endforeach
        </ul>
        <div class="page__title">
            <h1>@yield('name')</h1>
        </div>
    </div>
    @yield('description')
</div>
