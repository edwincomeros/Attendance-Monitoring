<?php
include 'db.php'; // database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Students — WMSU Attendance Tracking</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css" />
  <style>
    body { font-family: Arial, Helvetica, sans-serif; background:#fff; margin:0; }
    .main { padding: 18px 28px; }
    header { background:#b30000; color:#fff; padding:12px 18px; border-radius:6px; margin-bottom:12px; display:flex; justify-content:space-between; align-items:center; }
    .g7container { background:#fff; padding:18px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
    .g7header { background:#b30000; color:#fff; padding:10px 14px; border-radius:6px; margin-bottom:12px; display:flex; justify-content:space-between; align-items:center; text-transform:uppercase; }
    table { width:100%; border-collapse:collapse; margin:10px 0 18px; }
    table thead th { text-align:left; padding:10px; background:#f2f2f2; }
    table td { padding:10px; border-top:1px solid #eee; vertical-align:middle; }
    .download-btn { background:#b30000; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; display:inline-block; cursor:pointer; }
    .btn-green { background:#28a745;color:#fff;padding:6px 10px;border-radius:6px;text-decoration:none; }
    .btn-red { background:#dc3545;color:#fff;padding:6px 10px;border-radius:6px;text-decoration:none; }
    .thumbnail { width:50px; height:50px; object-fit:cover; border-radius:4px; border:1px solid #ddd; }

    /* modal */
    .modal { display:none; position:fixed; z-index:1200; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.55); justify-content:center; align-items:center; padding:20px; overflow:auto; }
    .modal.open { display:flex; }
    .modal-box { background:#fff; width:100%; max-width:920px; border-radius:10px; padding:18px; box-shadow:0 8px 30px rgba(0,0,0,0.25); position:relative; }
    .modal-close { position:absolute; right:14px; top:10px; border:none; background:transparent; font-size:20px; cursor:pointer; color:#b30000; }
    .modal-title { color:#b30000; font-size:20px; font-weight:700; text-align:left; margin-bottom:8px; }

    /* form */
    .form-layout { display:flex; gap:18px; flex-wrap:wrap; }
    .left-section, .right-section { flex:1; min-width:260px; }
    .avatar-box { text-align:center; }
    .avatar-box img { width:140px; height:140px; border-radius:50%; object-fit:cover; border:3px solid #eee; display:inline-block; }
    .upload-btn { display:inline-block; margin-top:12px; background:#b30000; color:#fff; padding:8px 12px; border-radius:6px; border:none; cursor:pointer; }
    form label { display:block; margin-top:10px; font-weight:600; }
    form input, form select { width:100%; padding:8px 10px; border-radius:6px; border:1px solid #ccc; margin-top:6px; }
    .form-actions { display:flex; justify-content:flex-end; gap:12px; margin-top:16px; }
    .btn-cancel, .btn-save { padding:8px 14px; border-radius:6px; border:none; cursor:pointer; }
    .btn-cancel { background:#ddd; }
    .btn-save { background:#b30000; color:#fff; }

    .small-btn { background:#b30000; color:#fff; border:none; padding:6px 10px; border-radius:6px; cursor:pointer; }
  </style>
</head>
<body>
<?php if(file_exists('sidebar.php')) include 'sidebar.php'; ?>

<div class="main">
  <header>
    <div style="font-weight:700; font-size:18px;">Wmsu Attendance Tracking</div>
    <div class="admin-info">👤 Admin</div>
  </header>

  <div class="g7container">
    <div class="g7header">
      <div>Grade 7-Ruby</div>
      <div>S.Y 2025-2026</div>
    </div>

    <div style="display:flex; justify-content:space-between; align-items:center;">
      <h3 style="margin:0;">Students Profile</h3>
      <div id="dateTime" style="color:#666;"></div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Photo</th><th>Name</th><th>Year</th><th>Section</th><th>Actions</th>
        </tr>
      </thead>
      <tbody id="studentsTbody">
        <?php
        $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
        while($row = $result->fetch_assoc()){
          $thumb = !empty($row['photo1']) ? 'uploads/'.$row['photo1'] : 'images/default-avatar.png';
          echo "<tr data-id='{$row['id']}'
                    data-student_id='{$row['student_id']}'
                    data-full_name='{$row['full_name']}'
                    data-birthdate='{$row['birthdate']}'
                    data-gender='{$row['gender']}'
                    data-year_level='{$row['year_level']}'
                    data-section='{$row['section']}'
                    data-guardian='{$row['guardian']}'
                    data-phone_no='{$row['phone_no']}'
                    data-photo='{$row['photo1']}'>
            <td><img src='{$thumb}' class='thumbnail'></td>
            <td>{$row['full_name']}</td>
            <td>{$row['year_level']}</td>
            <td>{$row['section']}</td>
            <td><button class='edit-btn small-btn' type='button'>Edit</button></td>
          </tr>";
        }
        ?>
      </tbody>
    </table>

    <a id="openFormBtn" class="download-btn">+ Add Student</a>
  </div>
</div>

<!-- ADD STUDENT MODAL -->
<div id="addStudentModal" class="modal" aria-hidden="true" role="dialog">
  <div class="modal-box" role="document">
    <button class="modal-close" data-close>&times;</button>
    <div class="modal-title">Add Student</div>

    <form id="addStudentForm" method="POST" action="savestudent.php" enctype="multipart/form-data">
      <input type="hidden" name="id" id="studentIdField">
      <div class="form-layout">
        <div class="left-section">
          <div class="avatar-box">
            <img id="mainAvatarPreview" src="images/default-avatar.png" alt="avatar preview">
          </div>
          <input type="file" name="photo1" id="photo1Main" accept="image/*">
        </div>

        <div class="right-section">
          <label>Student ID</label>
          <input id="student_id" type="text" name="student_id" required>
          <label>Full Name</label>
          <input id="full_name" type="text" name="full_name" required>
          <label>Birthdate</label>
          <input id="birthdate" type="date" name="birthdate" required>
          <label>Gender</label>
          <select id="gender" name="gender" required>
            <option value="">--Select--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <label>Year Level</label>
          <input id="year_level" type="text" name="year_level" required>
          <label>Section</label>
          <input id="section" type="text" name="section" required>
          <label>Guardian / Parent</label>
          <input id="guardian" type="text" name="guardian" required>
          <label>Phone No.</label>
          <input id="phone_no" type="text" name="phone_no" required>
          <div class="form-actions">
            <button type="button" class="btn-cancel" data-close>Cancel</button>
            <button type="submit" class="btn-save">Save Student</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const openModal = el => el.classList.add('open');
  const closeModal = el => el.classList.remove('open');

  const addStudentModal = document.getElementById('addStudentModal');
  const avatarPreview = document.getElementById('mainAvatarPreview');
  const fileInput = document.getElementById('photo1Main');

  // Open Add Student
  document.getElementById('openFormBtn').addEventListener('click', e => {
    e.preventDefault();
    document.querySelector('#addStudentForm').reset();
    avatarPreview.src = "images/default-avatar.png";
    document.querySelector('.modal-title').innerText = "Add Student";
    document.getElementById('studentIdField').value = "";
    openModal(addStudentModal);
  });

  // Close modal
  document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', function(){
      closeModal(this.closest('.modal'));
    });
  });

  // Preview photo
  fileInput.addEventListener('change', function(){
    if(this.files[0]){
      avatarPreview.src = URL.createObjectURL(this.files[0]);
    }
  });

  // Edit button
  document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', function(){
      const tr = this.closest('tr');
      document.querySelector('.modal-title').innerText = "Edit Student";
      document.getElementById('studentIdField').value = tr.dataset.id;
      document.getElementById('student_id').value = tr.dataset.student_id;
      document.getElementById('full_name').value = tr.dataset.full_name;
      document.getElementById('birthdate').value = tr.dataset.birthdate;
      document.getElementById('gender').value = tr.dataset.gender;
      document.getElementById('year_level').value = tr.dataset.year_level;
      document.getElementById('section').value = tr.dataset.section;
      document.getElementById('guardian').value = tr.dataset.guardian;
      document.getElementById('phone_no').value = tr.dataset.phone_no;
      avatarPreview.src = tr.dataset.photo ? "uploads/" + tr.dataset.photo : "images/default-avatar.png";
      openModal(addStudentModal);
    });
  });
});
</script>
</body>
</html>
