<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        /* Add your CSS styles here */
.sidebar {
    width: 200px;
    height: 100%;
    background-color: #f1f1f1;
    padding: 20px;
    float: left;
}

.sidebar h2 {
    margin-bottom: 20px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 10px;
}

.content {
    margin-left: 220px;
    padding: 20px;
}
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="doctors.php">Doctors</a></li>
            <li><a href="news.php">News</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Dashboard</h2>
        <!-- Add your dashboard content here -->
    </div>
</body>
</html>