<div class="sidebar">
  <div class="logo-container">
    <img src="wmsulogo.jpeg" alt="WMSU Logo" class="wmsu-logo" />
    <p class="school-year">2025–2026</p>
  </div> 
  <style> 
      
      .sidebar {
  display: flex;
  flex-direction: column;
  height: 100vh; /* make sidebar full height */
  background-color: #b30000;
}

.menu {
  flex-grow: 1; /* push logout down */
  padding: 0;
  margin: 0;
  list-style: none;
}

.logout {
  padding: 15px;
}

.logout a {
  display: block;
  background: #fff;
  color: #b30000;
  text-align: center;
  font-weight: bold;
  padding: 10px;
  border-radius: 5px;
  text-decoration: none;
}

.logout a:hover {
  background: #e6e6e6;
}

  </style>
  <ul class="menu">
    <li>
      <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
        <i class="fas fa-house"></i><span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="camera.php" class="<?= basename($_SERVER['PHP_SELF']) == 'camera.php' ? 'active' : '' ?>">
        <i class="fas fa-camera"></i><span>Camera</span>
      </a>
    </li>
    <li>
      <a href="students.php" class="<?= basename($_SERVER['PHP_SELF']) == 'students.php' ? 'active' : '' ?>">
        <i class="fas fa-user-graduate"></i><span>Students</span>
      </a>
    </li>
    <li>
      <a href="reports.php" class="<?= basename($_SERVER['PHP_SELF']) == 'reports.php' ? 'active' : '' ?>">
        <i class="fas fa-chart-bar"></i><span>Reports</span>
      </a>
    </li>
    <li>
      <a href="teachers.php" class="<?= basename($_SERVER['PHP_SELF']) == 'teachers.php' ? 'active' : '' ?>">
        <i class="fas fa-chalkboard-teacher"></i><span>Teachers</span>
      </a>
    </li>
  </ul>
    <!-- Logout Button -->
  <div class="logout">
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
</div>
