<ul class="in-sidebar-nav">
    <a href="">
        <li class="{{ request()->routeIs('dashboard', 'home') ? 'active' : '' }}">
            <img alt="Dashboard Icon" src="{{asset('images/sidebar-icons/dashboard-icon.svg')}}" />
            <span>Dashboard</span>
        </li>
    </a>
    <a href="">
        <li class="{{ request()->routeIs('operations_manager.*') ? 'active' : '' }}">
            <img alt="Icon" src="{{asset('images/sidebar-icons/operation-icon.svg')}}" />
            <span>Operations Manager</span>
        </li>
    </a>
    <a href="">
        <li class="{{ request()->routeIs('relationship_manager') ? 'active' : '' }}">
            <img alt="Icon" src="{{asset('images/sidebar-icons/relationship-icon.svg')}}" />
            <span>Relationship Manager</span>
        </li>
    </a>
    <a href="">
        <li class="{{ request()->routeIs('project_manager') ? 'active' : '' }}">
            <img alt="Icon" src="{{asset('images/sidebar-icons/project-icon.svg')}}" />
            <span>Project Manager</span>
        </li>
    </a>

</ul>