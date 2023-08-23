
<li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('admin.dashboard') }}">
        <span class="aside-menu-icon pe-3"><i class="fa-solid fa-circle-dot fs-3"></i></span>
        <span class="aside-menu-title">{{ __('messages.dashboard') }}</span>
    </a>
</li>
@can('manage_staff')
    <li class="nav-item {{ Request::is('admin/staff*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('staff.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-users fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.staffs')}}</span>
        </a>
    </li>
@endcan

@canany(['manage_all_post'])
<li class="nav-item aside-item-collapse {{ Request::is(['admin/post-format*', 'admin/posts*','admin/post-type*']) ? 'show' : '' }}">
    <a class="nav-link aside-collapse-btn d-flex align-items-center py-3">
        <span class="aside-menu-icon pe-3"><i class="fas fa-paste fs-4"></i></span>
        <span class="aside-menu-title">{{__('messages.post.posts')}}</span>
        <span class="aside-menu-collapse-icon ms-auto fs-4">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
    </a>
    <ul class="aside-submenu">
        @can('manage_all_post')
        <li class="nav-item {{ Request::is(['admin/post-format*','admin/post-type*']) ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center py-3" href="{{ route('post_format') }}">
                <span class="aside-menu-icon pe-3"><i class="fas fa-paste fs-4"></i></span>
                <span class="aside-menu-title">{{__('messages.add_post')}}</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/posts*') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center py-3" href="{{ route('posts.index') }}">
                <span class="aside-menu-icon pe-3"><i class="fas fa-paste fs-4"></i></span>
                <span class="aside-menu-title">{{__('messages.post.posts')}}</span>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcanany

@canany(['manage_gallery_image','manage_albums','manage_albums_category'])
    <li class="nav-item aside-item-collapse {{ Request::is(['admin/gallery-images*', 'admin/albums*','admin/album-categories*']) ? 'show' : '' }}">
        <a class="nav-link aside-collapse-btn d-flex align-items-center py-3">
            <span class="aside-menu-icon pe-3"><i class="fas fa-images fs-4"></i></span>
            <span class="aside-menu-title">{{__('messages.albums')}}</span>
            <span class="aside-menu-collapse-icon ms-auto fs-4">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
        </a>
        <ul class="aside-submenu">
            @can('manage_albums_category')
                <li class="nav-item {{ Request::is('admin/album-categories*') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center py-3" href="{{ route('album-categories.index') }}">
                        <span class="aside-menu-icon pe-3"><i class="fas fa-braille fs-4"></i></span>
                        <span class="aside-menu-title">{{__('messages.album_categories')}}</span>
                    </a>
                </li>
            @endcan
            @can('manage_gallery_image')
                <li class="nav-item {{ Request::is('admin/gallery-images*') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center py-3" href="{{ route('gallery-images.index') }}">
                        <span class="aside-menu-icon pe-3"><i class="fas fa-image fs-4"></i></span>
                        <span class="aside-menu-title">{{__('messages.images')}}</span>
                    </a>
                </li>
            @endcan
            @can('manage_albums')
                <li class="nav-item {{ Request::is('admin/albums*') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center py-3" href="{{ route('albums.index') }}">
                        <span class="aside-menu-icon pe-3"><i class="fas fa-images fs-4"></i></span>
                        <span class="aside-menu-title">{{__('messages.albums')}}</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany


@can('manage_pages')
<li class="nav-item {{ Request::is('admin/pages*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('pages.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-file fs-4"></i>
        </span>
        <span class="aside-menu-title">{{__('messages.pages')}}</span>
    </a>
</li>
@endcan
@can('manage_menu')
    <li class="nav-item {{ Request::is('admin/menus*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('menus.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-bars fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.menus')}}</span>
        </a>
    </li>
@endcan
@can('manage_navigation')
    <li class="nav-item {{ Request::is('admin/navigation*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('navigation.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-th fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.navigation')}}</span>
        </a>
    </li>
@endcan
@can('manage_polls')
    <li class="nav-item {{ Request::is('admin/polls*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('polls.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-list fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.polls')}}</span>
        </a>
    </li>
@endcan
@can('manage_categories')
    <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('categories.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-list-alt fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.categories')}}</span>
        </a>
    </li>
@endcan
@can('manage_sub_categories')
    <li class="nav-item {{ Request::is('admin/sub-categories*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('sub-categories.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-list-alt fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.sub_categories')}}</span>
        </a>
    </li>
@endcan
@can('manage_roles_permission')
    <li class="nav-item {{ Request::is('admin/roles*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('roles.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-key fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.roles_permissions')}}</span>
        </a>
    </li>
@endcan
@can('manage_seo_tools')
    <li class="nav-item {{ Request::is('admin/seo-tools*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('seo-tools.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-wrench fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.seo-tools')}}</span>
        </a>
    </li>
@endcan
@can('manage_language')
    <li class="nav-item {{ Request::is('admin/languages*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('languages.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-language fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.languages')}}</span>
        </a>
    </li>
@endcan
@can('manage_news_letter')
    <li class="nav-item {{ Request::is('admin/news-letter*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('news-letter.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-newspaper fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.news_letters')}}</span>
        </a>
    </li>
@endcan
@can('manage_comment')
    <li class="nav-item {{ Request::is('admin/post-comments*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('post-comments.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-comments fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.comments')}}</span>
        </a>
    </li>
@endcan
@can('manage_mail_setting')
    <li class="nav-item {{ Request::is('admin/mails*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('mails.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-envelope fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.mail')}}</span>
        </a>
    </li>
@endcan
@can('manage_settings')
    <li class="nav-item {{ Request::is('admin/settings*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('setting.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-cog fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.settings')}}</span>
        </a>
    </li>
@endcan
@can('manage_contacts')
    <li class="nav-item {{ Request::is('admin/contacts*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('contacts.index') }}">
        <span class="aside-menu-icon pe-3">
            <i class="fas fa-id-badge fs-4"></i>
        </span>
            <span class="aside-menu-title">{{__('messages.contacts')}}</span>
        </a>
    </li>
@endcan
