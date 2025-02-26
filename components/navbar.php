<ul class="navbar-nav">

  <li class="nav-item <?= ($page == "" || $page == "dashboard" ? "active" : "") ?>">
    <a class="nav-link" href="./">
      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
          <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
          <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
        </svg>
      </span>
      <span class="nav-link-title">
        Home
      </span>
    </a>
  </li>

  <?php //ADMIN
   if($user_category == "A"){ ?>
  <li class="nav-item <?= ($page == "courses" ? "active" : "") ?>">
    <a class="nav-link" href="index.php?page=courses">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
          <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
          <path d="M3 6l0 13" />
          <path d="M12 6l0 13" />
          <path d="M21 6l0 13" />
        </svg>
      </span>
      <span class="nav-link-title">
        Courses
      </span>
    </a>
  </li>
  <?php } ?>

  <?php //ADMIN
   if($user_category == "A"){ ?>
  <li class="nav-item <?= ($page == "degree" ? "active" : "") ?>">
    <a class="nav-link" href="index.php?page=degree">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
          <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
          <path d="M3 6l0 13" />
          <path d="M12 6l0 13" />
          <path d="M21 6l0 13" />
        </svg>
      </span>
      <span class="nav-link-title">
        Degree Program
      </span>
    </a>
  </li>
  <?php } ?>

  <?php //ADMIN
   if($user_category == "A"){ ?>
  <li class="nav-item <?= ($page == "users" ? "active" : "") ?>">
    <a class="nav-link" href="index.php?page=users">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
          <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
          <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
          <path d="M17 10h2a2 2 0 0 1 2 2v1" />
          <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
          <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
        </svg>
      </span>
      <span class="nav-link-title">
        Users
      </span>
    </a>
  </li>
  <?php } ?>

  <?php //ADMIN
   if($user_category == "A"){ ?>
  <li class="nav-item <?= ($page == "students" ? "active" : "") ?>">
    <a class="nav-link" href="index.php?page=students">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-screen">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M19.03 17.818a3 3 0 0 0 1.97 -2.818v-8a3 3 0 0 0 -3 -3h-12a3 3 0 0 0 -3 3v8c0 1.317 .85 2.436 2.03 2.84" />
          <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
          <path d="M8 21a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2" />
        </svg>
      </span>
      <span class="nav-link-title">
        Students
      </span>
    </a>
  </li>
  <?php } ?>

  <?php //ADMIN
   if($user_category == "A"){ ?>
  <li class="nav-item <?= ($page == "violations" ? "active" : "") ?>">
    <a class="nav-link" href="index.php?page=violations">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-flag-3">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M5 14h14l-4.5 -4.5l4.5 -4.5h-14v16" />
        </svg>
      </span>
      <span class="nav-link-title">
        Violations
      </span>
    </a>
  </li>
  <?php } ?>

  <?php //ADMIN
   if($user_category == "A"){ ?>
  <li class="nav-item <?= ($page == "offenses" ? "active" : "") ?>">
    <a class="nav-link" href="index.php?page=offenses">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M12 9v4" />
          <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
          <path d="M12 16h.01" />
        </svg>
      </span>
      <span class="nav-link-title">
        Offenses
      </span>
    </a>
  </li>
  <?php } ?>

  <?php //ADMIN, COMPLAINANT
    if($user_category == "A" || $user_category == "C"  || $user_category == "S"){ 
  ?>
  <li class="nav-item <?= ($page == "complainant_portal" ? "active" : "") ?>">
    <a class="nav-link" href="index.php?page=complainant_portal">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M12 9v4" />
          <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
          <path d="M12 16h.01" />
        </svg>
      </span>
      <span class="nav-link-title">
        Complainant Portal
      </span>
    </a>
  </li>
  <?php } ?>

  <?php //ADMIN
if($user_category == "A" || $user_category == "DO" || $user_category == "G" || $user_category == "D"){ ?>
  <li class="nav-item dropdown  <?= ($page == "violation-report" || $page == "student-violation-report" ? "active" : "") ?>">
    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/lifebuoy -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
          <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
          <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
          <path d="M9 12l.01 0"></path>
          <path d="M13 12l2 0"></path>
          <path d="M9 16l.01 0"></path>
          <path d="M13 16l2 0"></path>
        </svg>
      </span>
      <span class="nav-link-title">
        Reports
      </span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?page=student-violation-report">
        Student Violation Report
      </a>
      <a class="dropdown-item" href="index.php?page=violation-report">
        Violation Report
      </a>
    </div>
  </li>
  <?php } ?>
</ul>