<x-admin::nav-tree label="Notícias">
    <x-slot name="icon">
        <i class="nav-icon far fa-newspaper"></i>
    </x-slot>

    <x-admin::nav-item label="Categorias" :route="route('admin.blogCategories')">
        <i class="nav-icon far fa-newspaper"></i>
    </x-admin::nav-item>
    <x-admin::nav-item label="Noticias" :route="route('admin.blogs')">
        <i class="nav-icon far fa-newspaper"></i>
    </x-admin::nav-item>
</x-admin::nav-tree>
