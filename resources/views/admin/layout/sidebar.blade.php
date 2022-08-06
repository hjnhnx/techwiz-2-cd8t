<ul class="nav">
    <li class="nav-item " slot="Dashboard" >
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item " slot="user">
        <a class="nav-link" href="{{route('listUser')}}">
            <i class="material-icons">person</i>
            <p>Users</p>
        </a>
    </li>
    <li class="nav-item" slot="Rides">
        <a class="nav-link" href="{{route('listRide')}}">
            <i class="fa fa-car" aria-hidden="true"></i>
            <p>Rides</p>
        </a>
    </li>
    <li class="nav-item" slot="upcomingRides">
        <a class="nav-link" href="{{route('upcomingRide')}}">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <p>Upcoming Ride</p>
        </a>
    </li>
    <li class="nav-item " slot="Requests">
        <a class="nav-link" href="{{route('listRequest')}}">
            <i class="fa fa-list" aria-hidden="true"></i>
            <p>Requests</p>
        </a>
    </li>
    <li class="nav-item" slot="models">
        <a class="nav-link" href="{{route('listModel')}}">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            <p>Car models</p>
        </a>
    </li>

    <li class="nav-item" slot="Feedback">
        <a class="nav-link" href="{{route('listFeedback')}}">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <p>Feedback</p>
        </a>
    </li>

    <li class="nav-item" slot="Approve">
        <a class="nav-link" href="{{route('show_approve_drivers')}}">
            <i class="fa fa-check" aria-hidden="true"></i>
            <p>Approve drivers</p>
        </a>
    </li>
    <li class="nav-item" slot="Notifications">
        <a class="nav-link" href="{{route('createMassNotifications')}}">
            <i class="fa fa-bell" aria-hidden="true"></i>
            <p>Send notifications</p>
        </a>
    </li>
</ul>
