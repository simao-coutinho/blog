<div class="block-categories">
    <h4>Categorias</h4>
    <ul>
        @foreach($blogCategories as $blogCategory)
            <li>
                <a href="{{ route('noticias', ['categoria' => $blogCategory->description->url_alias]) }}" class="font-13-px text-secondary">
                    {{ $blogCategory->description->title }}
                </a>
                <span class="dots"></span>
                <span class="count">{{ $blogCategory->posts()->count() }}</span>
            </li>
        @endforeach
    </ul>
</div>

