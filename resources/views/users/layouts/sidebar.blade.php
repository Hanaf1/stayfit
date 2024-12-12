<div class="sidebar border border-right col-md-3 col-lg-2 p-0">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel" style="height: 200vh">
        <div class="offcanvas-header">
            <h5  id="sidebarMenuLabel">Stayfit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{ request()->is('users') ? 'active' : '' }}" aria-current="page" href="/users">
                        <i class="bi bi-house"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{ request()->is('users/konsulDoc*') ? 'active' : '' }}" href="/users/konsulDoc">
                        <i class="bi bi-person-lines-fill"></i>
                        Konsultasi Dokter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{ request()->is('users/profile') ? 'active' : '' }}" href="/users/profile">
                    <i class="bi bi-gear"></i>
                        Edit Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{ request()->is('users/recommendations*') ? 'active' : '' }}" href="/users/recommendations">
                        <i class="bi bi-calendar"></i>
                        Rekomendasi Nutrisi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{ request()->is('users/membership*') ? 'active' : '' }}" href="/users/membership">
                        <i class="bi bi-person-square"></i>
                        Membership
                    </a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link d-flex align-items-center gap-2 border-0 text-dark" type="submit"><i class="bi bi-box-arrow-left"></i>Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
