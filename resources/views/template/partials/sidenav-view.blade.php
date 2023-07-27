<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" d="sidenavAccordion" aria-label="sidenav">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.core') }}</div>
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    {{ __('sidebar.dashboard') }}
                </a>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.merchantProfile') }}</div>
                <a class="nav-link {{ Route::is('merchant-profile') ? 'active' : '' }}"
                    href="{{ route('merchant-profile') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-shop"></i></div>
                    {{ __('sidebar.profile') }}
                </a>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.manageRoles') }}</div>
                <a class="nav-link {{ Route::is('roles-management*') ? 'active' : '' }}"
                    href="{{ route('roles-management.index') }}">
                    <div class="sb-nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path
                                d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1
                                1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            <path
                                d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5
                                14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0
                                1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066
                                2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                        </svg>
                    </div>
                    {{ __('sidebar.roles') }}
                </a>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.manageUsers') }}</div>
                <a class="nav-link {{ Route::is('users-management*') ? 'active' : '' }}"
                    href="{{ route('users-management.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-person"></i></div>
                    {{ __('sidebar.users') }}
                </a>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.manageProducts') }}</div>
                <a class="nav-link {{ Request::is(['product-category*']) ? '' : 'collapsed' }}" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="{{ Request::is(['product-category*']) ? 'true' : 'false' }}"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    {{ __('sidebar.products') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is(['product-category*']) ? 'show' : '' }}" id="collapseLayouts"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('product-category*') ? 'active' : '' }}"
                            href="{{ route('product-category.index') }}">{{ __('sidebar.productCategory') }}</a>
                        <a class="nav-link" href="layout-sidenav-light.html">{{ __('sidebar.productPurchase') }}</a>
                        <a class="nav-link" href="layout-sidenav-light.html">{{ __('sidebar.products') }}</a>
                    </nav>
                </div>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.manageSuppliers') }}</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1
                                1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784
                                6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75
                                1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5
                                3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1
                                0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                    </div>
                    {{ __('sidebar.suppliers') }}
                </a>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.manageTransaction') }}</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-basket" viewBox="0 0 16 16">
                            <path
                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07
                                1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1
                                1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1
                                13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5
                                0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0
                                0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0
                                1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1
                                0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1
                                0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1
                                0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1
                                0v-3a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </div>
                    {{ __('sidebar.transaction') }}
                </a>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.manageMembers') }}</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2
                                2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5
                                0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8
                                11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146
                                12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1
                                1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                        </svg>
                    </div>
                    {{ __('sidebar.members') }}
                </a>
                {{-- HEAD --}}
                <div class="sb-sidenav-menu-heading">{{ __('sidebar.managePromo') }}</div>
                <a class="nav-link mb-5" href="charts.html">
                    <div class="sb-nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-receipt" viewBox="0 0 16 16">
                            <path
                                d="M1.92.506a.5.5 0 0 1 .434.14L3
                                1.293l.646-.647a.5.5 0 0 1 .708 0L5
                                1.293l.646-.647a.5.5 0 0 1 .708 0L7
                                1.293l.646-.647a.5.5 0 0 1 .708 0L9
                                1.293l.646-.647a.5.5 0 0 1 .708
                                0l.646.647.646-.647a.5.5 0 0 1 .708
                                0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5
                                1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5
                                1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0
                                0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708
                                0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7
                                14.707l-.646.647a.5.5 0 0 1-.708 0L5
                                14.707l-.646.647a.5.5 0 0 1-.708 0L3
                                14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5
                                0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0
                                1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5
                                0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1
                                .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5
                                0 0 1 .708 0l.646.646.646-.646a.5.5 0 0
                                1 .708 0l.646.646.646-.646a.5.5 0 0 1
                                .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5
                                0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10
                                1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5
                                0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4
                                1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5
                                0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0
                                1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0
                                1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5
                                0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5
                                0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5
                                0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5
                                0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5
                                0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    {{ __('sidebar.promo') }}
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{ Auth::user()->fullName }}</div>
            POS APP SYSTEM
        </div>
    </nav>
</div>
