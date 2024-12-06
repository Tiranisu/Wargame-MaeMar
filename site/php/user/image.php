<?php
$image = $_GET['image'];

$output = "";

$allowed_image_extensions = ['jpg', 'png'];

$file_extension = pathinfo($image, PATHINFO_EXTENSION);

$file_path = "../../images/" . $image;

if (in_array(strtolower($file_extension), $allowed_image_extensions) && file_exists($file_path)) {
    $output = "<img class='rounded-lg mx-auto mb-5' src='/images/" . htmlspecialchars($image) . "' />";
}
if (strtolower($file_extension) === 'txt') {
    if (file_exists($file_path) && is_readable($file_path)) {
        $file_content = file_get_contents($file_path);
        $output = "<pre>" . htmlspecialchars($file_content) . "</pre>";
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
        </div>
    </div>
</nav>

<!-- There is a flag in /tmp/flag.txt -->

<?php if ($output): ?>
    <div class="mt-5 text-center pb-16">
        <?= $output ?>
    </div>
<?php endif; ?>

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 Cyber Trust. All Rights Reserved.
    </span>
</footer>

<!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
