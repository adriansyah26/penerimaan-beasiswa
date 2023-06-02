{{--Left sidebar--}}
<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">
        @canany([
        'permission.show',
        'roles.show',
        'user.show'
        ])
        {{-- <li class="nav-item has-treeview">
            <a href="#"
                class="nav-link {{ (Request::is('permission*') || Request::is('role*') || Request::is('user*')) ? 'active':''}}">
                <i class="fas fa-users-cog"></i>
                <p>
                    @lang('cruds.userManagement.title')
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview"
                style="display: {{ (Request::is('permission*') || Request::is('role*') || Request::is('user*')) ? 'block':'none'}}">
                @can('permission.show')
                <li class="nav-item">
                    <a href="{{ route('permissionIndex') }}"
                        class="nav-link {{ Request::is('permission*') ? "active":'' }}">
                        <i class="fas fa-key"></i>
                        <p> @lang('cruds.permission.title_singular')</p>
                    </a>
                </li>
                @endcan

                @can('roles.show')
                <li class="nav-item">
                    <a href="{{ route('roleIndex') }}" class="nav-link {{ Request::is('role*') ? "active":'' }}">
                        <i class="fas fa-user-lock"></i>
                        <p> @lang('cruds.role.fields.roles')</p>
                    </a>
                </li>
                @endcan

                @can('user.show')
                <li class="nav-item">
                    <a href="{{ route('userIndex') }}" class="nav-link {{ Request::is('user*') ? "active":'' }}">
                        <i class="fas fa-user-friends"></i>
                        <p> @lang('cruds.user.title')</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li> --}}
        @endcanany
        {{-- @can('api-user.view')
        <li class="nav-item">
            <a href="{{ route('api-userIndex') }}" class="nav-link {{ Request::is('api-users*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p> API Users</p>
            </a>
        </li>
        @endcan --}}
        @can('home.view')
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link {{ Request::is('admin/dashboard*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Dashboard</p>
            </a>
        </li>
        @endcan
        @can('mahasiswa.view')
        <li class="nav-item">
            <a href="{{ route('data-mahasiswa.index') }}"
                class="nav-link {{ Request::is('admin/data-mahasiswa*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Data Mahasiswa</p>
            </a>
        </li>
        @endcan
        @can('kriteria.view')
        <li class="nav-item">
            <a href="{{ route('kriteria.index') }}" class="nav-link {{ Request::is('admin/kriteria*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Kriteria</p>
            </a>
        </li>
        @endcan
        @can('sub-kriteria.view')
        <li class="nav-item">
            <a href="{{ route('sub-kriteria.index') }}"
                class="nav-link {{ Request::is('admin/sub-kriteria*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Sub Kriteria</p>
            </a>
        </li>
        @endcan
        @can('perbandingan-berpasangan.view')
        <li class="nav-item">
            <a href="{{ route('perbandingan-berpasangan.index') }}"
                class="nav-link {{ Request::is('admin/perbandingan-berpasangan*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Matriks Perbandingan Berpasangan</p>
            </a>
        </li>
        @endcan
        @can('matriks-normalisasi.view')
        <li class="nav-item">
            <a href="{{ route('matriks-normalisasi.index') }}"
                class="nav-link {{ Request::is('admin/matriks-normalisasi*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Matriks Normalisasi</p>
            </a>
        </li>
        @endcan
        @can('nilai-bobot-kriteria.view')
        <li class="nav-item">
            <a href="{{ route('nilai-bobot-kriteria.index') }}"
                class="nav-link {{ Request::is('admin/nilai-bobot-kriteria*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Nilai Bobot Kriteria</p>
            </a>
        </li>
        @endcan
        @can('matriks-keputusan.view')
        <li class="nav-item">
            <a href="{{ route('matriks-keputusan.index') }}"
                class="nav-link {{ Request::is('admin/matriks-keputusan*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Alternatif</p>
            </a>
        </li>
        @endcan
        @can('normalisasi-matriks-keputusan.view')
        <li class="nav-item">
            <a href="{{ route('normalisasi-matriks-keputusan.index') }}"
                class="nav-link {{ Request::is('admin/normalisasi-matriks-keputusan*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p><small>Normalisasi</small> Matriks Keputusan</p>
            </a>
        </li>
        @endcan
        @can('normalisasi-matriks-terbobot.view')
        <li class="nav-item">
            <a href="{{ route('normalisasi-matriks-terbobot.index') }}"
                class="nav-link {{ Request::is('admin/normalisasi-matriks-terbobot*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p><small>Normalisasi</small> Matriks Terbobot</p>
            </a>
        </li>
        @endcan
        @can('solusi-ideal-positif-negatif.view')
        <li class="nav-item">
            <a href="{{ route('solusi-ideal-positif-negatif.index') }}"
                class="nav-link {{ Request::is('admin/solusi-ideal-positif-negatif*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Solusi Ideal <small>Positif Negatif</small></p>
            </a>
        </li>
        @endcan
        @can('jarak-positif-negatif.view')
        <li class="nav-item">
            <a href="{{ route('jarak-positif-negatif.index') }}"
                class="nav-link {{ Request::is('admin/jarak-positif-negatif*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Jarak <small>Positif Negatif</small></p>
            </a>
        </li>
        @endcan
        @can('ranking.view')
        <li class="nav-item">
            <a href="{{ route('ranking.index') }}"
                class="nav-link {{ Request::is('admin/ranking*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Ranking</p>
            </a>
        </li>
        @endcan
        @can('laporan.view')
        <li class="nav-item">
            <a href="{{ route('laporan.index') }}"
                class="nav-link {{ Request::is('admin/laporan*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <sub><i class="fas fa-child"></i></sub>
                <p>Laporan</p>
            </a>
        </li>
        @endcan
    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
            <a href="" class="nav-link">
                <i class="fas fa-palette"></i>
                <p>
                    @lang('global.theme')
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none">
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'default']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-info"></i>
                        <p class="text">Default {{ auth()->user()->theme == 'default' ? '✅':'' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'light']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-white"></i>
                        <p>Light {{ auth()->user()->theme == 'light' ? '✅':'' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'dark']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-gray"></i>
                        <p>Dark {{ auth()->user()->theme == 'dark' ? '✅':'' }}</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    {{--    @can('card.main')--}}

    {{--    @endcan--}}
</nav>
