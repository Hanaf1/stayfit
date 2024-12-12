<div class="sidebar border border-right col-md-3 col-lg-2 p-0">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel" style="height: 200vh">
      <div class="offcanvas-header">
        <h5  id="sidebarMenuLabel">Stayfit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{  request()->is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
             <i class="bi bi-house"></i>
              Home
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{  request()->is('admin/nutrisi*') ? 'active' : '' }}" aria-current="page" href="/admin/nutrisi">
           <i class="bi bi-egg-fried"></i>
              Rekomendasi Nutrisi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{  request()->is('admin/posts*') ? 'active' : '' }}" href="/admin/posts">
          <i class="bi bi-file-earmark-plus-fill"></i>
              My Posts
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-decoration-none gap-2 {{  request()->is('admin/settings') ? 'active' : '' }}" aria-current="page" href="/admin/settings">
             <i class="bi bi-gear-fill"></i>
              Setting All Account
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


