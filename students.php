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
        header {
      background-color: #b30000; color: white; padding: 10px 20px;
      border-radius: 8px; display: flex; justify-content: space-between; align-items: center;
    }
        .g7container {
            background: white;
            padding: 2px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
        .g7header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  background: #b30000;
  text-transform:uppercase;
}
    </style>
</head>
<body>
 <div class="welcome-row">
    <h3 class="welcome-text">Students Profile</h3>
    <span id="dateTime" class="datetime"></span>
    </div>
<div class="g7container">
    <div class="g7header">Grade 7-Ruby
        <div class="schoolyear">S.Y 2025-2026</div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>

                <td>
                    <a href="#" class="btn-green">View</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Stuart Cruz</td>
                <td>
                    <a href="#" class="btn-green">View</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
             <tbody>
            <tr>
                <td>John Loyd</td>
                <td>
                    <a href="#" class="btn-green">View</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
             <tbody>
            <tr>
                <td>Edwin Loe</td>
                <td>
                    <a href="#" class="btn-green">View</a>
                    <a href="#" class="btn-red">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>
                    <a href="#" class="btn-green">View</a>
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
