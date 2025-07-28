<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Fetch user details
$user_id = $_SESSION['user_id'];
$stmt_user = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt_user->execute([$user_id]);
$user = $stmt_user->fetch(PDO::FETCH_ASSOC);

// Fetch products
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
            display: block;
            margin: 10px auto;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello, <?php echo htmlspecialchars($user['username']); ?>! Welcome to Your Dashboard</h2>
        <h3>Products</h3>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                <img src="<?php echo !empty($product['image_url']) ? 'uploads/' . htmlspecialchars($product['image_url']) : 'images/default.jpg'; ?>" alt="Product Image">
                <img src="<?php echo !empty($product['image_url']) ? htmlspecialchars($product['image_url']) : 'images/default.jpg'; ?>" alt="Product Image">

                <img src="<?php echo !empty($product['image_url']) ? 'uploads/' . htmlspecialchars($product['image_url']) : 'images/default.jpg'; ?>" alt="Product Image">
                    <strong><?php echo htmlspecialchars($product['name']); ?></strong><br>
                    <?php echo htmlspecialchars($product['description']); ?><br>
                    Price: $<?php echo htmlspecialchars($product['price']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
