<menu>
    <a href="/profiles">
        <img src="../images/ico-profile.svg" alt="" />
        Profile
    </a>
    <a href="/dashboard">
        <img src="../images/ico-dashboard.svg" alt="" />
        Dashboard
    </a>
    <a href="javascript:;" onclick="logout.submit();">
        <img src="../images/ico-logout.svg" alt="" />
        Logout
    </a>
    <form action="{{route('logout')}}" id="logout" method="POST">@csrf</form>
</menu>