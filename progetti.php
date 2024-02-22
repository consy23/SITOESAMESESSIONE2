!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output JSON in HTML</title>
</head>
<body>

<?php
// Leggi il contenuto del file JSON
$json_content = file_get_contents('projects.json');

// Decodifica il JSON in un array PHP
$projects = json_decode($json_content, true);

// Verifica se la decodifica è avvenuta correttamente
if ($projects === null && json_last_error() !== JSON_ERROR_NONE) {
    // Errore nella decodifica JSON
    echo "Errore nella decodifica JSON: " . json_last_error_msg();
} else {
    // La decodifica è avvenuta con successo
    // Ora puoi utilizzare l'array PHP $data per accedere ai tuoi dati
    foreach ($data as $project) {
        echo "ID: " . $project['id'] . "<br>";
        echo "Titolo: " . $project['title'] . "<br>";
        echo "Categoria: " . $project['category'] . "<br>";
        echo "Data: " . $project['date'] . "<br>";
        echo "Descrizione: " . $project['description'] . "<br>";
        echo "Immagine: " . $project['image'] . "<br><br>";
    }
}
?>
</body>