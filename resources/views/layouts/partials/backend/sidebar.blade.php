<aside class="dashboard-sidebar" style="background-image: url('{{ asset('assets/img/background.png') }}');">
    <div class="dashboard-sidebar__overlay"></div>

    <div class="dashboard-sidebar__inner">

        <div class="dashboard-sidebar__header">
            <a href="{{ route('dashboard') }}" class="dashboard-sidebar__logo">
                <x-logo width="150" />
            </a>

            <button type="button" class="dashboard-sidebar__close" data-sidebar-close aria-label="Затвори">
                <i class="fa-regular fa-circle-xmark"></i>
            </button>
        </div>

        <nav class="dashboard-sidebar__nav">
            <ul>

                @if ($isAdmin)
                    <p class="text-center">Админски част </p>

                    <li>
                        <a href="{{ route('leads.index') }}"
                            class="{{ request()->routeIs('leads.index*') ? 'is-active' : '' }}">
                           <i class="fa-solid fa-arrows-down-to-people"></i>
                            <span>Лиидове</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="{{ request()->routeIs('admin.users.index*') ||
                             request()->routeIs('admin.users.details.show') ||
                             request()->routeIs('admin.users.details.show') ||
                             request()->routeIs('admin.users.ads') ||
                            request()->routeIs('admin.users.show*') ? 'is-active' : '' }}">
                            <i class="fa-solid fa-user-shield"></i>
                            <span>Всички потребители</span>
                        </a>
                    </li>
                    <hr>
                @endif



                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Табло за управление</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="{{ request()->routeIs('profile.*') ? 'is-active' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Моят профил</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('myleads.index') }}"
                        class="{{ request()->routeIs('myleads.index') ? 'is-active' : '' }}">
                        <i class="fa-solid fa-arrows-down-to-people"></i>
                        <span>Моите лиидове</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('subscription.index') }}"
                        class="{{ request()->routeIs('subscription.index') ? 'is-active' : '' }}">
                        <i class="fa-brands fa-stripe"></i>
                        <span>Абонамент</span>
                    </a>
                </li>

                 <li>
                    <a href="{{ route('ads.index') }}"
                        class="{{ request()->routeIs('ads.index') ||
                                  request()->routeIs('ads.create-ad') ||
                                  request()->routeIs('user.ads.show') ? 'is-active' : '' }}">
                        <i class="fa-solid fa-rectangle-ad"></i>
                        <span>Рекламни кампании</span>
                    </a>
                </li>

            </ul>
        </nav>



    </div>
</aside>
