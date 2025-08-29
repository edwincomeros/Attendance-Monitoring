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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
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

</body>
</html>