<div class="top-score-title col-md-12 right-title">
    <div  style="background-color: #f4f4f4; border-radius: 5px;margin-left: -15px;padding-left: 15px;">
        <h3 style="padding-top: 15px;">Categorias</h3>
        @foreach($blogCategories as $blogCategory)
            
            <div class="right-content">
                <p class="news-title-right">{{ $blogCategory->description->title }} ({{ $blogCategory->posts()->count() }})</p>
            </div>
        @endforeach
    </div>
</div>

