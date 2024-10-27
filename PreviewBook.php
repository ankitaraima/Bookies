<?php
session_start();
include_once('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Library Management System</title>
    <style>
        body {
            background-color: hsl(0, 0%, 95%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .navbar-brand {
            color: rgba(241, 86, 0, 1) !important;
            padding-left: 2vw;
        }
        .book {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            perspective: 1000px;
        }
        .book-cover {
            width: 50%;
            height: 80vh;
            background-color: #f7e8d3;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            border: 2px solid #333;
            position: relative;
            transform-style: preserve-3d;
            transform: rotateY(-10deg);
        }
        .book-cover:before {
            content: "";
            position: absolute;
            width: 5%;
            height: 100%;
            background-color: #d6c4a1;
            left: -5px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .book-title, .book-author, .book-content {
            text-align: center;
            padding: 20px;
        }
        .book-title {
            font-size: 3vw;
            color: rgba(241, 86, 0, 1);
            font-weight: bold;
            margin: 30px 0;
        }
        .book-author {
            font-size: 2vw;
            color: grey;
            font-style: italic;
            margin-bottom: 20px;
        }
        .book-content h3 {
            font-size: 2vw;
            color: black;
            text-decoration: underline;
            margin-bottom: 20px;
        }
        .book-content p {
            font-size: 1vw;
            color: black;
            font-weight: bold;
            margin: 20px;
            line-height: 1.5;
            text-align: justify;
        }
        .back-button {
            text-align: center;
            margin-top: 20px;
        }
        .back-button input[type="submit"] {
            background-color: rgba(241, 86, 0, 1);
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            width: 25vw;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Bookies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="UserPage.php">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="UserDetails.php">User Details</a></li>
                <li class="nav-item"><a class="nav-link" href="UserIssueBook.php">Issue Books</a></li>
                <li class="nav-item"><a class="nav-link" href="UserContactUs.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="LogOut.php">Log out</a></li>
            </ul>
        </div>
    </nav>

    <?php
    $book_id = $_GET['bookid'];
    $_SESSION['id'] = $book_id;

    if (isset($_SESSION['id'])) {
        $query = "SELECT * FROM books WHERE Book_id='$book_id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $book_name = $row['Name'];
                $author = $row['Author'];
                $content = $row['Content'];
            }
        }
    }
    ?>

    <!-- Book Display -->
    <div class="book">
        <div class="book-cover">
            <div class="book-title"><?php echo $book_name; ?></div>
            <div class="book-author"><i>Author: <?php echo $author; ?></i></div>
            <div class="book-content">
                <h3>CONTENTS AT A GLANCE</h3>
                <p><?php echo $content; ?></p>
            </div>
        </div>
    </div>

    <!-- Go Back Button -->
    <div class="back-button">
        <form action="UserPage.php" method="POST">
            <input type="submit" value="GO BACK" name="ib">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-qQvtR0uSG1C+5T6vnFk72A+Zr90THBtHnC3mY5nIHUtJtAoeHu4G6U57KZnx0Of2" crossorigin="anonymous"></script>
</body>
</html>
