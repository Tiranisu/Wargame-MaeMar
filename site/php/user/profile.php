<?php
require_once '../config/database.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$statusMessage = "";
$rows=[];

if (isset($_GET['check_status'])) {
    try {
        $db = dbConnect();
        $username = $_GET['check_status'];
        $query = "SELECT CAST(is_admin AS text) FROM users WHERE username = '$username'";
        $result = $db->query($query);

        if ($result) {
            $rows = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $row;
            }
        } else {
            $statusMessage = "Erreur dans la requête SQL.";
        }
    } catch (Exception $e) {
        $statusMessage = "Erreur : " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Trust</title>
    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 dark:bg-gray-800">
<!-- Navigation Bar -->
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="http://localhost:8080/php/user/index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Cyber Trust ®</span>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a href="logout.php" class="text-sm text-blue-600 dark:text-blue-500 hover:underline">Disconnect</a>
        </div>
    </div>
</nav>

<h1 class="w-1/2 mx-auto mt-5 text-center mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Profile</h1>

<!-- Image de profil -->
<img class="w-24 h-24 rounded-full mx-auto my-5 bg-white" src="../../images/avatar.png" alt="Rounded avatar">
<p class="w-full text-center text-gray-600">Username : <span class="italic font-bold text-gray-900"><?= htmlspecialchars($_SESSION['username']) ?></span></p>

<div class="text-center my-5">
    <a href="?check_status=<?= htmlspecialchars($_SESSION['username']) ?>" class="mx-auto w-24 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Status du profile
    </a>
</div>

<?php if ($statusMessage): ?>
    <div class="mt-5 text-center">
        <p class="text-lg">
            <?= htmlspecialchars($statusMessage) ?>
        </p>
    </div>
<?php endif; ?>

<div class="mt-5 text-center">
    <?php if (!empty($rows)): ?>
        <?php if (count($rows) == 1): ?>
            <?php
            $isAdmin = $rows[0]['is_admin'];
            if ($isAdmin === 'true') {
                echo "<p class='text-green-500'>Vous êtes administrateur du site.</p>";
            } else {
                echo "<p class='text-blue-500'>Vous êtes simplement utilisateur.</p>";
            }
            ?>
        <?php elseif (count($rows) == 2): ?>
            <?php
            $password = $rows[1]['is_admin'];
            echo "<p class='text-green-500'>" . htmlspecialchars($password) . "</p>";
            ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 Cyber Trust. All Rights Reserved.
    </span>
</footer>

<!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
