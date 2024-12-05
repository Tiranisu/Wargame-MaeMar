<?php
require_once '../config/database.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'];
    $username = $_SESSION['username'];
    $query = "UPDATE users SET description = '$description' WHERE username = '$username'";
    $pdo = dbConnect();

    try {
        $result = $pdo->exec($query);

        if ($result === false) {
            echo "Une erreur est survenue lors de la mise à jour.";
        } else {
            echo "La description a été mise à jour avec succès.";
        }
    } catch (PDOException $e) {
        echo "Erreur SQL : " . $e->getMessage();
    }
} else {
    echo "Requête invalide.";
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
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
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

<!-- Formulaire pour changer la photo de profil -->
<form class="max-w-lg mx-auto mt-5" method="POST" action="update_avatar.php" enctype="multipart/form-data">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center" for="user_avatar">Changez votre photo de profil</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="user_avatar" type="file" name="avatar" required>
    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">Changer la photo</button>
</form>

<!-- Formulaire pour changer la description -->
<form class="max-w-lg mx-auto mt-5" method="POST" action="update_description.php">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center" for="description">Changez votre description</label>
    <textarea class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 p-2.5" id="description" name="description" rows="4" placeholder="Entrez votre description ici..." required></textarea>
    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">Changer la description</button>
</form>

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 Cyber Trust. All Rights Reserved.
    </span>
</footer>

<!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
