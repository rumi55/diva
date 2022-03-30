<div class="breadcrumbs">
    <div class="breadcrumbs__image">
        @yield('background')
        <ul class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="/" title="Главная" itemprop="item">
                    <span itemprop="name">Главная</span>
                    <meta itemprop="position" content="0">
                </a>
            </li>
            <?php $b = 2; ?>
            @foreach ($breadcrumbs = array_reverse($breadcrumbs) as $breadcrumb)
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    @if ($breadcrumb['link'] == '')
                        <span itemprop="name">{{ $breadcrumb['title'] }}</span>
                        <meta itemprop="position" content="{{ $b++ }}">
                    @else
                        <a href="/{{ $breadcrumb['link'] }}" title="{{ $breadcrumb['title'] }}">
                            <span itemprop="name">{{ $breadcrumb['title'] }}</span></a>
                        <meta itemprop="position" content="{{ $b++ }}">
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="page__title">
            <h1>@yield('name')</h1>
        </div>
    </div>
    @yield('description')
</div>
