<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WMSU Attendance Tracking</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include 'sidebar.php'; ?>
  <div class="main">
    <header>
      <h2>Wmsu Attendance Tracking</h2>
      <div class="admin-info">    
        <div class="admin-icon">👤 Admin</div>
      </div>
    </header>

    <section class="overview">
  <div class="welcome-row">
    <h3 class="welcome-text">Welcome, Admin [Name]</h3>
    <span id="dateTime" class="datetime">May 10, 2025 | 10:00 AM</span>
    </div>
     <div class="cards">
  <div class="card">
    <div class="card-label">Total Student</div>
    <span>16</span>
    <a href="#" class="more-info">More info →</a>
  </div>
  <div class="card">
    <div class="card-label">Present Today</div>
    <span>10</span>
    <a href="#" class="more-info">More info →</a>
  </div>
  <div class="card">
    <div class="card-label">Absent</div>
    <span>2</span>
    <a href="#" class="more-info">More info →</a>
  </div>
  <div class="card">
    <div class="card-label">Late</div>
    <span>4</span>
    <a href="#" class="more-info">More info →</a>
  </div>
</div>
    </section>
    <section class="attendance">
      <div class="attendance-header">
        <h3>Student Attendance</h3>
        <div class="btns">
          <button class="add">+ Add Student</button>
          <button class="edit">✎ Edit Student</button>
        </div>
      </div>

      <table>
        <thead>
          <tr>
            <th>First Name</th><th>Middle Name</th><th>Last Name</th>
            <th>Year</th><th>Section</th><th>Status</th><th>Time</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John</td><td>De la</td><td>Cruz</td><td>7</td><td>Ruby</td>
            <td class="present">Present</td><td>8:18 AM</td>
            <td>
              <button class="update">Update</button>
              <button class="delete">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </div>

  <script src="script.js"></script>
</body>
</html>
