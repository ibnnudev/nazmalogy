<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-3 sidebar">
            <x-sidebar-link label="Dashboard" icon="grid" route="{{ route('admin.dashboard.index') }}" />
            <x-sidebar-link label="Kursus" icon="albums" route="{{ route('admin.course.index') }}" />
            <x-sidebar-link label="Kategori Kursus" icon="folder" route="{{ route('admin.course-category.index') }}" />
        </ul>
    </div>
</aside>
