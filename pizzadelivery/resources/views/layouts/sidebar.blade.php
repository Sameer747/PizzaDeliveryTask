<div class="navbar-bg"></div>

{{-- @include('layouts.navbar') --}}
<div class="main-sidebar sidebar-style-2">
    <a side id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">{{ __('Stisla') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">{{ __('St') }}</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="menu-header">{{ __('Dashboard') }}</li>
            <li class="dropdown active">
                <a href="{{ route('dashboard') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>
            {{-- Starter --}}
            <li class="menu-header">{{ __('Starter') }}</li>
            {{-- Pizza Categories --}}
            <li><a class="nav-link" href="{{ route('pizza.pizza-delivery.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Pizza Categories') }}</span></a></li>
            {{-- Riders --}}
            <li><a class="nav-link" href="{{ route('rider.rider-delivery.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Riders') }}</span></a></li>
            {{-- Orders --}}
            <li><a class="nav-link" href="{{ route('order.order-delivery.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Orders') }}</span></a></li>
            {{-- News --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('News') }}</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">{{ __('All News') }}</a></li>
                    <li><a class="nav-link" href="forms-editor.html">{{ __('Editor') }}</a></li>
                    <li><a class="nav-link" href="forms-validation.html">{{ __('Validate') }}</a></li>
                </ul>
            </li>
            {{-- Languages --}}
            <li><a class="nav-link" href=""><i class="far fa-square"></i>
                    <span>{{ __('Languages') }}</span></a></li>

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i>
                    <span>{{ __('Blank Page') }}</span></a></li> --}}
            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('Forms') }}</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">{{ __('Advanced Form') }}</a></li>
                    <li><a class="nav-link" href="forms-editor.html">{{ __('Editor') }}</a></li>
                    <li><a class="nav-link" href="forms-validation.html">{{ __('Validate') }}</a></li>
                </ul>
            </li> --}}
        </ul>
        </aside>
</div>
