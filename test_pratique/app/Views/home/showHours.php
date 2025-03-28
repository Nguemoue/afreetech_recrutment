<?php
declare(strict_types=1);

// Définir le fuseau horaire pour le Cameroun (UTC+1)
date_default_timezone_set('Africa/Douala');

// Obtenir la date et l'heure actuelles
$date = new DateTime();
$dateFormatee = $date->format('d/m/Y H:i:s');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Heure actuelle au Cameroun">
    <meta name="author" content="Afreetech">
    <title>Heure Cameroun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Date et Heure Actuelle</h1>
            <div class="text-4xl font-mono text-indigo-600">
                <?php echo htmlspecialchars($dateFormatee); ?>
            </div>
            <p class="mt-4 text-gray-600">Fuseau horaire : UTC+1 (Africa/Douala)</p>
        </div>
    </div>
</body>
</html>