<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/dashboard')? 'active' : '' }}"    aria-current="page" href="/admin/dashboard">
              <span data-feather="home"></span>
              Dasbor
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/dashboard*')? 'active' : '' }}" href="/admin/dashboard">
              <span data-feather="grid"></span>
              Dasbor
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/students*')? 'active' : '' }}" href="/admin/students">
              <span data-feather="file-text"></span>
                Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/teachers*')? 'active' : '' }}" href="/admin/teachers">
              <span data-feather="message-square"></span>
              Guru
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/classes*')? 'active' : '' }}" href="/admin/classes">
              <span data-feather="file-text"></span>
              Kelas
            </a>
          </li>
        </ul>
      </div>
</nav>
   
   