<div class="sidebar border border-right col-md-3 col-lg-2 p-0">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel" style="height: 100vh">
      <div class="offcanvas-header">
        <h5  id="sidebarMenuLabel">Stayfit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{  request()->is('doctor') ? 'active' : '' }}" aria-current="page" href="/doctor">
             <i class="bi bi-house"></i>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{  request()->is('doctor/konsultasi*') ? 'active' : '' }}" href="/doctor/konsultasi">
           <i class="bi bi-person-lines-fill"></i>
              Konsultasi 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{  request()->is('doctor/profiledoc') ? 'active' : '' }}" href="/doctor/profiledoc">
             <i class="bi bi-gear"></i>
              Edit Profile Dokter
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


