<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli Progetto</title>
</head>
<body>
    <h1>Dettagli Progetto</h1>
    <?php
    if (isset($_GET['id'])) {
        $projectId = $_GET['id'];
        $projects = json_decode(file_get_contents('projects.json'), true);

        foreach ($projects as $project) {
            if ($project['id'] == $projectId) {
                echo "<h2>{$project['title']}</h2>";
                echo "<p><strong>Categoria:</strong> {$project['category']}</p>";
                echo "<p><strong>Data:</strong> {$project['date']}</p>";
                echo "<p><strong>Descrizione:</strong> {$project['description']}</p>";
                echo "<img src='{$project['image']}' alt='{$project['title']}' width='200'>";
                break;
            }
        }
    } else {
        echo "<p>Progetto non trovato</p>";
    }
    ?>
</body>
</html>
