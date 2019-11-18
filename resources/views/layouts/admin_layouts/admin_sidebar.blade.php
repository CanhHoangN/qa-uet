<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Management</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a title="" href="{{url('/admin/sessions')}}"><i class="fas fa-level-up-alt"></i> <span class="text">Sessions</span></a></li>
                <li><a title="" href="{{url('/admin/surveys')}}"><i class="fas fa-angle-double-right"></i> <span class="text">Surveys</span></a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="fas fa-users"></i> <span>Users</span></a>
            <ul>
                <li><a title="" href="{{url('/admin/customers')}}"><i class="fas fa-user"></i> <span class="text">List Users</span></a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->