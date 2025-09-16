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
      <style>
        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        .tab-menu {
            display: flex;
            border-bottom: 1px solid #ddd;
        }

        .tab {
            padding: 10px 15px;
            cursor: pointer;
            font-weight: bold;
            color: #666;
            transition: color 0.3s;
        }

        .tab.active {
            color: #A0020B;
            border-bottom: 2px solid #A0020B;
        }

        .search-container {
            position: relative;
            margin-right: 15px;
        }

        .search-container input {
            padding: 8px 10px 8px 30px;
            border-radius: 20px;
            border: 1px solid #ccc;
            outline: none;
            width: 200px;
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
        }
        .search-and-export {
            display: flex;
            align-items: center;
            padding-right: 1px;
        }
        /* You will need to replace this with your own search icon path */
        .search-icon {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#ccc"/></svg>');
            background-repeat: no-repeat;
            background-size: contain;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            position: absolute;
            pointer-events: none;
        }
        .export-buttons .btn {
            padding: 8px 15px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            cursor: pointer;
            border-radius: 4px;
            margin-left: 5px;
        }
        .table-container {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .table-header {
            background-color: #A0020B;
            color: white;
            padding: 15px;
            font-weight: bold;
            font-size: 1.2em;
        }
         .faculty-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9em;
            color: #333;
        }

        .faculty-table th, .faculty-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .faculty-table th {
            background-color: #f2f2f2;
            color: #666;
            text-transform: uppercase;
            font-weight: 500;
        }

        .faculty-table tr:hover {
            background-color: #f9f9f9;
        }
        .action-buttons button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            font-size: 0.85em;
        }

        .action-buttons .edit {
            background-color: #D32F2F;
        }

        .action-buttons .deactivate {
            background-color: #616161;
            margin-left: 5px;
        }

        .add-teacher-btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .add-teacher-btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .add-teacher-btn {
            display: flex;
            align-items: center;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            font-size: 1em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .add-teacher-btn .plus-icon {
            font-size: 1.5em;
            margin-right: 8px;
        }
        header {
      background-color: #b71c1c; color: white; padding: 10px 20px;
      border-radius: 8px; display: flex; justify-content: space-between; align-items: center;
    }
      </style>
    </header>
    <div class="top-section">
            <div class="tab-menu">
                <div class="tab active">Faculty List</div>
                <div class="tab">Teacher's Schedule</div>
            </div>
            <div class="search-and-export">
                <div class="search-container">
                    <input type="text" placeholder="Search Teacher">
                    <span class="search-icon"></span>
                </div>
                <div class="export-buttons">
                    <button class="btn">PDF</button>
                    <button class="btn">Excel</button>
                </div>
            </div>
        </div>
         <div class="table-container">
            <div class="table-header">
                Faculty List
            </div>
            <table class="faculty-table">
                <thead>
                    <tr>
                        <th>Teacher Name</th>
                        <th>Faculty ID</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Dela Cruz</td>
                        <td>F0001</td>
                        <td>Math</td>
                        <td>juan@email.com</td>
                        <td>Active</td>
                        <td class="action-buttons">
                            <button class="edit">Edit</button>
                            <button class="deactivate">Deactivate</button>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <div class="add-teacher-btn-container">
            <button class="add-teacher-btn">
                <span class="plus-icon">+</span>
                Add Teacher
            </button>
        </div>
        </div>
