<aside class="sidebar">
    <div class="sidebar-logo text-center mb-4">
        <img src="{{ asset('assets/img/logo.png') }}" width="120">
    </div>

    <div class="sidebar-user">
        <small>Welcome,</small>
        <strong>{{ session('username') ?? 'Admin' }}</strong>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="/admin/dashboard"
               class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
               Dashboard
            </a>
        </li>

        <li>
            <a href="/admin/member"
               class="{{ request()->is('admin/member*') ? 'active' : '' }}">
               Member
            </a>
        </li>

        <li>
            <a href="/admin/orders"
               class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
               Pemesanan
            </a>
        </li>

        <li>
            <a href="/admin/menu"
               class="{{ request()->is('admin/menu*') ? 'active' : '' }}">
               Menu
            </a>
        </li>

        <li>
            <a href="/admin/banner"
               class="{{ request()->is('admin/banner*') ? 'active' : '' }}">
               Banner Promo
            </a>
        </li>

        <li>
            <a href="/"
               class="{{ request()->is('/') ? 'active' : '' }}">
               Go to website
            </a>
        </li>
    </ul>
</aside>
