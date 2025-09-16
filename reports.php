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
<style>
    header {
      background-color: #b71c1c; color: white; padding: 10px 20px;
      border-radius: 8px; display: flex; justify-content: space-between; align-items: center;
    }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 5px;
        }

        .rectangle {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            height: 250px;
        }

        .rect-top {
            flex: 0 0 190px; /* Narrow height for image section */
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rect-top img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .rect-bottom {
            flex: 5;
            background-color: #fff;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        } body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
    }

    /* Add Section Button */
    .add-section-btn {
  background-color: #b30000;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.button-container {
  display: flex;
  justify-content: flex-end; /* pushes button to the right */
margin-right: 10px;
}

    .add-section-btn:hover {
      background-color: #990000;
    }

    /* Modal Background */
    .modal {
      display: none; 
      position: fixed; 
      z-index: 1000; 
      left: 0;
      top: 0;
      width: 100%; 
      height: 100%; 
      background-color: rgba(0, 0, 0, 0.5); 
    }

    /* Modal Content */
    .modal-content {
      background: #fff;
      margin: 10% auto;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      text-align: center;
      position: relative;
    }

    .modal-content h2 {
      margin-bottom: 15px;
    }

    .modal-content label {
      display: block;
      margin: 10px 0 5px;
      text-align: left;
    }

    .modal-content input, 
    .modal-content select {
      width: 95%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .modal-content .btn-group {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .modal-content button {
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .modal-content .add-btn {
      background: #b30000;
      color: white;
    }

    .modal-content .add-btn:hover {
      background: #990000;
    }

    .modal-content .cancel-btn {
      background: #aaa;
      color: white;
    }

    .modal-content .cancel-btn:hover {
      background: #888;
    }

    /* Close button (X) */
    .close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 20px;
      cursor: pointer;
      color: red;
      font-weight: bold;
    }
    </style>
</head>
<body>

    <div class="container">
        <div class="rectangle">
            <div class="rect-top"><img src="./images/peridot.jpg" alt="Student"></div>
            <div class="rect-bottom">Grade 7 Perodot</div>
        </div>
        <div class="rectangle">
            <div class="rect-top"><img src="./images/ruby.jpg" alt="Student"></div>
            <div class="rect-bottom">Grade 7 Ruby</div>
        </div>
        <div class="rectangle">
            <div class="rect-top"><img src="./images/pearl.jpg" alt="Student"></div>
            <div class="rect-bottom">Grade 7 Pearl</div>
        </div>
        <div class="rectangle">
            <div class="rect-top"><img src="./images/emerald.jpg" alt="Student"></div>
            <div class="rect-bottom">Grade 7 Emerald</div>
        </div>
        <div class="rectangle">
            <div class="rect-top"><img src="./images/sapphire.webp" alt="Student"></div>
            <div class="rect-bottom">Grade 7 Sapphire</div>
        </div>
        <div class="rectangle">
            <div class="rect-top"><img src="./images/diamond.jpeg" alt="Student"></div>
            <div class="rect-bottom">Grade 7 Sapphire</div>
        </div>
    </div>

  <!-- Add Section Button -->
  <div class="button-container">
  <button class="add-section-btn" id="openModal">+ Add Section</button>
</div>
  <!-- The Modal -->
  <div id="sectionModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closeModal">&times;</span>
      <h2>Add Section</h2>
      <form>
        <label for="sectionName">Section Name</label>
        <input type="text" id="sectionName" placeholder="Enter section name">

        <label for="gradeLevel">Grade Level</label>
        <select id="gradeLevel">
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>

        <div class="btn-group">
          <button type="submit" class="add-btn">Add</button>
          <button type="button" class="cancel-btn" id="cancelBtn">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Get elements
    const modal = document.getElementById("sectionModal");
    const openModalBtn = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");
    const cancelBtn = document.getElementById("cancelBtn");

    // Open modal
    openModalBtn.onclick = () => {
      modal.style.display = "block";
    };

    // Close modal with X or Cancel
    closeModal.onclick = () => {
      modal.style.display = "none";
    };
    cancelBtn.onclick = () => {
      modal.style.display = "none";
    };

    // Close when clicking outside the modal
    window.onclick = (event) => {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  </script>
</body>
</html>