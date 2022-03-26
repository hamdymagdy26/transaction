<li class="nav-item {{ Request::is('admin/home*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="nav-icon icon-user"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/home/users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="nav-icon icon-user"></i>
        <span>Users</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/home/transactions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('transactions.index') }}">
        <i class="nav-icon icon-user"></i>
        <span>Transactions</span>
    </a>
</li>