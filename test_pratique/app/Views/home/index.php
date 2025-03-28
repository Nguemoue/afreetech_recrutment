<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page d'accueil des fonctionnalités">
    <meta name="author" content="Afreetech">
    <title>Accueil - Fonctionnalités</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Tests Partiques [Afreetech]
                </h1>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Cliquez sur une carte pour ouvrir la fonctionnalité dans une nouvelle fenêtre
                </p>
            </div>

            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($views as $view): ?>
                    <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300 cursor-pointer"
                         onclick="openInNewWindow('<?php echo htmlspecialchars($view['url']); ?>')">
                        <div class="p-6">
                            <div class="text-4xl mb-4"><?php echo $view['icon']; ?></div>
                            <h3 class="text-lg font-medium text-gray-900">
                                <?php echo htmlspecialchars($view['title']); ?>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                <?php echo htmlspecialchars($view['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        function openInNewWindow(url) {
            window.open(url, '_blank', 'width=800,height=600,menubar=no,toolbar=no,location=no,status=no');
        }
    </script>
</body>
</html> 