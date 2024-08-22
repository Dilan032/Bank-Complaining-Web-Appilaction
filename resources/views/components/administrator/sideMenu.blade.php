<div class="container-fluid">
    <div class="row">
        <div class="col-auto min-vh-100 bg-dark position-fixed z-3 d-none d-sm-inline">
            <div class="pt-4 pb-2 px-2">
                <a href="" class="nav-link text-white">
                    <i class="bi bi-list fs-2 me-2 ms-2"></i>
                    <span class="fs-3 d-none d-sm-inline">Administrator</span>
                    <br>
                    {{-- <span class="fs-6 ms-5 d-none d-sm-inline">👨‍💼{{ $userName }}</span> <br>
                    <span class="fs-6 ms-5 d-none d-sm-inline">🏢{{ $bank->bank_name }}</span> --}}
                </a>
            </div>

            <hr class="text-white">
            
            <ul class="nav nav-pills flex-column mb-auto p-2">
                <li class="nav-item mb-2">
                    <a href="{{ route('administrator.index') }}" class="nav-link text-white ">
                        <i class="bi bi-speedometer me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Dashbord</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('administrator.messages') }}" class="nav-link text-white">
                        <i class="bi bi-chat-left-dots me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Messages</span>
                    </a>
                </li>
                {{-- <li class="nav-item mb-2">
                    <a href="{{ route('administrator.announcements') }}" class="nav-link text-white">
                        <i class="bi bi-megaphone me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Announcements</span>
                    </a>
                </li> --}}
                <li class="nav-item mb-2">
                    <a href="{{ route('administrator.users') }}" class="nav-link text-white">
                        <i class="bi bi-person-circle me-2 ms-2"></i>
                        <span class="d-none d-sm-inline">Users</span>
                    </a>
                </li>
            </ul>

            <hr class="text-white" style="margin-top:85%">

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('administrator.logout')}}" class="nav-link text-white">
                        <i class="bi bi-box-arrow-right me-2 ms-4"></i>
                        <span class="d-none d-sm-inline">LogOut</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>