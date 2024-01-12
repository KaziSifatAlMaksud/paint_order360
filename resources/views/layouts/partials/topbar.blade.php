<nav class="in-top-navbar">
    <ul>
        <li>
            <div class="in-search">
                <span class="fa fa-search"></span>
                <input placeholder="Search here...">
            </div>
        </li>
        <li>
            <div class="in-tooltip-container">
                <span class="in-user-span">
                    <span class="in-user-image">
                        <img src="{{asset('images/users/user-photo-2x.png')}}" alt="">
                    </span>
                    <span class="in-user-name">
                       
                        <span class="in-user-category">Super Admin</span>
                    </span>
                    <span>
                        <img src="{{asset('images/sidebar-icons/arrow-down-gray-icon.svg')}}" alt="">
                    </span>

                </span>
                <span class="in-tooltip-box">
                    <ul>
                        <li>
                            <a class="dropdown-item" href="#">{{ __('Settings') }}</a>
                        </li>
                        <li>
                         
                        </li>
                    </ul>
                </span>
                <form id="logout-form" action="#" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
