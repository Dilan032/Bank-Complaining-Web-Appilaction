<div class="container-fluid">
    <div class="row">
        <div class="col-auto min-vh-100 bg-dark position-fixed z-3 d-none d-sm-inline">
            <div class="pt-4 pb-2 px-2">
                <a href="" class="nav-link text-white">
                    <i class="bi bi-list fs-2 me-2 ms-2"></i>
                    <span class="fs-3 d-none d-sm-inline">SuperAdmin</span>
                    <br>
                </a>
            </div>

            <hr class="text-white">
            
            <ul class="nav nav-pills flex-column mb-auto p-2">
                <li class="nav-item mb-2">
                    <a href="{{route('superAdmin.dashbord')}}" class="nav-link text-white ">
                        <i class="bi bi-speedometer me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Dashbord</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{route('superAdmin.messages.view')}}" class="nav-link text-white">
                        <i class="bi bi-chat-left-dots me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Messages</span>
                    </a>
                </li>
                {{-- <li class="nav-item mb-2">
                    <a href="{{route('superAdmin.announcements.view')}}" class="nav-link text-white">
                        <i class="bi bi-megaphone me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Announcements</span>
                    </a>
                </li> --}}
                <li class="nav-item mb-2">
                    <a href="{{route('superAdmin.users.view')}}" class="nav-link text-white">
                        <i class="bi bi-person-circle me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Users</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{route('superAdmin.banks.view')}}" class="nav-link text-white">
                        <i class="bi bi-bank me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Banks</span>
                    </a>
                </li>
            </ul>

            <hr class="text-white" style="margin-top:85%">

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('superAdmin.logout')}}" class="nav-link text-white">
                        <i class="bi bi-box-arrow-right me-2 ms-4"></i>
                        <span class="d-none d-sm-inline">LogOut</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>