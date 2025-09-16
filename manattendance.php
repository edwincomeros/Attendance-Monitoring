<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WMSU Attendance Tracking</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css" />
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f8f9fa; }
    header {
      background-color: #b30000; color: white; padding: 10px 20px;
      border-radius: 8px; display: flex; justify-content: space-between; align-items: center;
    }
    .manual-attendance-container {
      background: white;
      padding: 2px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-top: 5px;
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
    table thead { background: #f2f2f2; }
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
      border: none;
      cursor: pointer;
    }
    .btn-red {
      background-color: #dc3545;
      color: white;
      padding: 6px 12px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }
    .download-btn {
      background-color: #b30000;
      color: white;
      padding: 8px 16px;
      border-radius: 5px;
      text-decoration: none;
      display: inline-block;
      margin: 15px;
    }
    .download-btn:hover { background-color: #990000; }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.4);
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      width: 90%;
      max-width: 500px;
      position: relative;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    .close-btn {
      position: absolute;
      top: 10px; right: 15px;
      font-size: 20px;
      cursor: pointer;
      color: #666;
    }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; font-weight: bold; margin-bottom: 5px; }
    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .save-btn {
      background: #28a745;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    .back-btn {
  display: inline-block;
  background-color: #b30000;
  color: white;
  padding: 6px 14px;
  border-radius: 5px;
  text-decoration: none;
  margin-top: 8px;
  font-size: 14px;
  font-weight: bold;
}
.back-btn:hover {
  background-color: #990000;
}

  </style>
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
    <a href="camera.php" class="back-btn">⬅ Back to Camera</a>
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
          <tr data-id="1">
            <td class="name">John Doe</td>
            <td class="time-in">8:00 AM</td>
            <td class="time-out">5:00 PM</td>
            <td class="status">Present</td>
            <td>
              <button class="btn-green update-btn">Update</button>
              <button class="btn-red delete-btn">Delete</button>
            </td>
          </tr>
          <tr data-id="2">
            <td class="name">Jane Smith</td>
            <td class="time-in">Absent</td>
            <td class="time-out">Absent</td>
            <td class="status">Absent</td>
            <td>
              <button class="btn-green update-btn">Update</button>
              <button class="btn-red delete-btn">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
      <a href="#" class="download-btn">Download Report</a>
    </div>
  </div>

  <!-- Update Modal -->
  <div id="update-modal" class="modal">
    <div class="modal-content">
      <span class="close-btn">&times;</span>
      <h2>Update Student Record</h2>
      <form id="update-form">
        <input type="hidden" id="student-id">
        <div class="form-group">
          <label for="update-name">Name</label>
          <input type="text" id="update-name" required>
        </div>
        <div class="form-group">
          <label for="update-time-in">Time In</label>
          <input type="text" id="update-time-in">
        </div>
        <div class="form-group">
          <label for="update-time-out">Time Out</label>
          <input type="text" id="update-time-out">
        </div>
        <div class="form-group">
          <label for="update-status">Status</label>
          <input type="text" id="update-status">
        </div>
        <button type="submit" class="save-btn">Save Changes</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const tableBody = document.querySelector("table tbody");
      const updateModal = document.getElementById("update-modal");
      const closeBtn = document.querySelector(".close-btn");
      const updateForm = document.getElementById("update-form");

      // Open Update Modal
      tableBody.addEventListener("click", (event) => {
        const button = event.target.closest("button");
        if (!button) return;

        const row = button.closest("tr");

        if (button.classList.contains("update-btn")) {
          const studentId = row.dataset.id;
          const name = row.querySelector(".name").textContent;
          const timeIn = row.querySelector(".time-in").textContent;
          const timeOut = row.querySelector(".time-out").textContent;
          const status = row.querySelector(".status").textContent;

          document.getElementById("student-id").value = studentId;
          document.getElementById("update-name").value = name;
          document.getElementById("update-time-in").value = timeIn;
          document.getElementById("update-time-out").value = timeOut;
          document.getElementById("update-status").value = status;

          updateModal.style.display = "flex"; // show modal
        }

        if (button.classList.contains("delete-btn")) {
          if (confirm("Are you sure you want to delete this record?")) {
            row.remove();
          }
        }
      });

      // Close modal
      closeBtn.addEventListener("click", () => {
        updateModal.style.display = "none";
      });

      // Close if clicked outside modal
      window.addEventListener("click", (event) => {
        if (event.target === updateModal) {
          updateModal.style.display = "none";
        }
      });

      // Handle Update form submit
      updateForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const studentId = document.getElementById("student-id").value;
        const row = document.querySelector(`tr[data-id="${studentId}"]`);

        row.querySelector(".name").textContent =
          document.getElementById("update-name").value;
        row.querySelector(".time-in").textContent =
          document.getElementById("update-time-in").value;
        row.querySelector(".time-out").textContent =
          document.getElementById("update-time-out").value;
        row.querySelector(".status").textContent =
          document.getElementById("update-status").value;

        updateModal.style.display = "none";
      });
    });
  </script>
</body>
</html>
