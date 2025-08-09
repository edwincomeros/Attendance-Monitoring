<?php include 'sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Camera | WMSU Attendance</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      background-color: #f5f5f5;
    }

    .main {
      flex: 1;
      padding: 20px;
      box-sizing: border-box;
    }

    header {
      background-color: #b71c1c;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .admin-info {
      font-weight: bold;
    }

    .camera-wrapper {
      display: flex;
      gap: 20px;
      margin-top: 20px;
      height: 520px;
    }

    .video-section {
      width: 72%;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      position: relative;
      padding: 10px;
      overflow: hidden;
    }

    video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 8px;
      border: 2px solid #b71c1c;
    }

    #scanner {
      position: absolute;
      border: 3px solid #00ff00;
      width: 120px;
      height: 120px;
      pointer-events: none;
      transition: all 0.2s ease;
      z-index: 2;
    }

    #toggleCameraBtn {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      padding: 8px 16px;
      background-color: #b71c1c;
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      z-index: 2;
    }

    .info-section {
      width: 28%;
      background: #f9f9f9;
      border-left: 5px solid #b71c1c;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .info-box {
      margin-bottom: 15px;
    }

    .info-box h3 {
      margin-top: 0;
      margin-bottom: 8px;
      color: #b71c1c;
      font-size: 16px;
    }

    .info-box p {
      margin: 4px 0;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <?php // sidebar.php is included here; make sure it's styled properly ?>
  <div class="main">
    <header>
      <h2 style="font-size: 20px;">Wmsu Attendance Tracking</h2>
      <div class="admin-info">👤 Admin</div>
    </header>

    <div class="camera-wrapper">
      <div class="video-section">
        <div id="scanner"></div>
        <video id="camera" autoplay playsinline></video>
        <button id="toggleCameraBtn">Turn Off Camera</button>
      </div>

      <div class="info-section">
        <div class="info-box">
          <h3>Student Information</h3>
          <p><strong>Name:</strong> Juan Dela Cruz</p>
          <p><strong>ID:</strong> 2023-00123</p>
          <p><strong>Course:</strong> BS Computer Science</p>
          <p><strong>Year:</strong> 3rd Year</p>
        </div>

        <div class="info-box">
          <h3>Attendance</h3>
          <p><strong>Status:</strong> Present</p>
          <p><strong>Date:</strong> July 31, 2025</p>
          <p><strong>Time In:</strong> 08:03 AM</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    const video = document.getElementById('camera');
    const toggleBtn = document.getElementById('toggleCameraBtn');
    const scanner = document.getElementById('scanner');
    let stream;

    async function startCamera() {
      try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
        toggleBtn.textContent = "Turn Off Camera";
        simulateFaceTracking();
      } catch (error) {
        alert("Camera access denied.");
        console.error(error);
      }
    }

    function stopCamera() {
      if (stream) {
        stream.getTracks().forEach(track => track.stop());
        video.srcObject = null;
        toggleBtn.textContent = "Turn On Camera";
        clearInterval(trackingInterval);
      }
    }

    toggleBtn.addEventListener('click', () => {
      if (video.srcObject) {
        stopCamera();
      } else {
        startCamera();
      }
    });

    // Simulate green box moving to mimic face tracking
    let trackingInterval;
    function simulateFaceTracking() {
      trackingInterval = setInterval(() => {
        const maxX = video.offsetWidth - 130;
        const maxY = video.offsetHeight - 130;
        const randX = Math.floor(Math.random() * maxX);
        const randY = Math.floor(Math.random() * maxY);
        scanner.style.left = `${randX}px`;
        scanner.style.top = `${randY}px`;
      }, 1000);
    }

    startCamera();
  </script>
</body>
</html>
