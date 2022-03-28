<li class="nav-item {{ Request::is('admin/home*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="fa fa-unlock"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/home/users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fa fa-user"></i>
        <span>Users</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/home/transactions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('transactions.index') }}">
        <i class="fa fa-money"></i>
        <span>Transactions</span>
    </a>
</li>

<li class="nav-item {{ Request::is('logs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('logs') }}">
        <i class="fa fa-address-book"></i>
        <span>Logs</span>
    </a>
</li>