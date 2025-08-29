<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WMSU Attendance Tracking</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css" />
<body>
  <?php include 'sidebar.php'; ?>
  <div class="main">
    <header>
      <h2>Wmsu Attendance Tracking</h2>
      <div class="admin-info">    
        <div class="admin-icon">👤 Admin</div>
      </div>
    </header>

    <style>
        .manual-attendance-container {
            background: white;
            padding: 2px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .manual-attendance-header {
            background-color: #b30000;
            color: white;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table thead {
            background: #f2f2f2;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .btn-green {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-red {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
        }
        .download-btn {
            background-color: #b30000;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
        .download-btn:hover {
            background-color: #990000;
        }
    </style>
</head>
<body>
 <div class="welcome-row">
    <h3 class="welcome-text">Welcome, Admin Edwin</h3>
    <span id="dateTime" class="datetime"></span>
    </div>
<div class="manual-attendance-container">
    <div class="manual-attendance-header">Manual Attendance</div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>8:00 AM</td>
                <td>5:00 PM</td>
                <td>Present</td>
                <td>
                    <a href="#" class="btn-green">Update</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Stuart Cruz</td>
                <td>8:15 AM</td>
                <td>5:10 PM</td>
                <td>Late</td>
                <td>
                    <a href="#" class="btn-green">Update</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
             <tbody>
            <tr>
                <td>John Loyd</td>
                <td>8:00 AM</td>
                <td>5:00 PM</td>
                <td>Present</td>
                <td>
                    <a href="#" class="btn-green">Update</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
             <tbody>
            <tr>
                <td>Edwin Loe</td>
                <td>8:00 AM</td>
                <td>5:00 PM</td>
                <td>Present</td>
                <td>
                    <a href="#" class="btn-green">Update</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>Absent</td>
                <td>Absent</td>
                <td>Absent</td>
                <td>
                    <a href="#" class="btn-green">Update</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="#" class="download-btn">Download Report</a>
</div>
 <script src="script.js"></script>
</body>
</html>
