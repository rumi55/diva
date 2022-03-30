<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $post)
        <url>
            <loc>{{ url('/') }}/@if ($post->category){{ $post->category->slug }}/{{ $post->slug }}@else{{ rtrim($post->slug, '/') }}@endif</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($blogcategories as $category)
        <url>
            <loc>{{ url('/') }}/{{ $category->slug }}</loc>
            <lastmod>{{ $category->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach


    @foreach ($shopcategories as $shopcategory)
        <url>
            <loc>{{ url('/') }}/{{ $shopcategory->slug }}</loc>
            <lastmod>{{ $shopcategory->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($products as $product)
        <url>
            <loc>{{ url('/') }}/@if ($product->category){{ $product->category->slug }}/{{ $product->slug }}@else{{ $product->slug }}@endif</loc>
            <lastmod>{{ $product->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

</urlset>
