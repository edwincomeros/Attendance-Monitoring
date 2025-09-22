<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WMSU Attendance Tracking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        /* Modal (Pop-up) styles */
        .modal {
            display: none; /* This hides the modal by default */
            position: fixed; /* Positions it over the other content */
            z-index: 1000; /* Ensures it's on top of everything */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); /* Dark overlay */
        }
        .card{
          background: #b30000;
        }
header {
      background-color: #b30000; color: white; padding: 10px 20px;
      border-radius: 8px; display: flex; justify-content: space-between; align-items: center;
    }
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #990000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        #submit-btn:hover {
            background-color: #990000;
        }
        
        /* New Table Button Styles */
        .edit-row {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            font-size: 0.85em;
            background-color: #0275d8;
            margin-right: 5px;
        }
        .delete-row {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            font-size: 0.85em;
            background-color: #dc3545;
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
        <section class="overview">
            <div class="welcome-row">
                <h3 class="welcome-text">Welcome, Admin Edwin</h3>
                <span id="dateTime" class="datetime"></span>
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
            
            <div id="student-modal" class="modal">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2 id="modal-title"></h2>
                    <form id="student-form">
                        <input type="hidden" id="student-id" name="id">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="middleName">Middle Name</label>
                            <input type="text" id="middleName" name="middleName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" id="section" name="section" required>
                        </div>
                        <button type="submit" id="submit-btn"></button>
                    </form>
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
                    <tr data-firstname="John" data-middlename="De la" data-lastname="Cruz" data-year="7" data-section="Ruby">
                        <td>John</td><td>De la</td><td>Cruz</td><td>7</td><td>Ruby</td>
                        <td class="present">Present</td><td>8:18 AM</td>
                        <td>
                            <button class="edit-row">✎ Edit</button>
                            <button class="delete-row">Delete</button>
                        </td>
                    </tr>
                    <tr data-firstname="Jane" data-middlename="" data-lastname="Doe" data-year="8" data-section="Emerald">
                        <td>Edwin</td><td>Adona</td><td>Comeros</td><td>8</td><td>Emerald</td>
                        <td class="present">Present</td><td>9:00 AM</td>
                        <td>
                            <button class="edit-row">✎ Edit</button>
                            <button class="delete-row">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('student-modal');
            const modalTitle = document.getElementById('modal-title');
            const studentForm = document.getElementById('student-form');
            const submitBtn = document.getElementById('submit-btn');
            const closeBtn = document.querySelector('.close-btn');

            const addBtn = document.querySelector('.add');
            const editBtn = document.querySelector('.edit');
            const tableBody = document.querySelector('tbody');

            addBtn.addEventListener('click', () => {
                modal.style.display = 'block';
                modalTitle.textContent = 'Add New Student';
                submitBtn.textContent = 'Add Student';
                studentForm.reset();
            });

            editBtn.addEventListener('click', () => {
                const firstRow = tableBody.querySelector('tr');
                if (firstRow) {
                    const data = firstRow.dataset;
                    document.getElementById('firstName').value = data.firstname;
                    document.getElementById('middleName').value = data.middlename;
                    document.getElementById('lastName').value = data.lastname;
                    document.getElementById('year').value = data.year;
                    document.getElementById('section').value = data.section;
                }
                modal.style.display = 'block';
                modalTitle.textContent = 'Edit Student';
                submitBtn.textContent = 'Save Changes';
            });

            // Event delegation to handle all table button clicks
            tableBody.addEventListener('click', (event) => {
                const target = event.target;
                if (target.classList.contains('edit-row')) {
                    const row = target.closest('tr');
                    const data = row.dataset;

                    document.getElementById('firstName').value = data.firstname;
                    document.getElementById('middleName').value = data.middlename;
                    document.getElementById('lastName').value = data.lastname;
                    document.getElementById('year').value = data.year;
                    document.getElementById('section').value = data.section;
                    
                    modal.style.display = 'block';
                    modalTitle.textContent = 'Edit Student';
                    submitBtn.textContent = 'Save Changes';
                }
                
                if (target.classList.contains('delete-row')) {
                    // This will confirm before deleting the row.
                    if (confirm("Are you sure you want to delete this student's record?")) {
                        const row = target.closest('tr');
                        row.remove(); // Removes the entire table row from the DOM
                        console.log("Deleted row for:", row.dataset.firstname);
                    }
                }
            });

            closeBtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            window.addEventListener('click', (event) => {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });

            studentForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const formData = new FormData(studentForm);
                const data = Object.fromEntries(formData.entries());
                console.log('Form Submitted:', data);
                modal.style.display = 'none';
            });
        });
    </script>
</body>
</html>