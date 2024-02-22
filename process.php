<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $data = "Nome: $name\nEmail: $email\nMessaggio: $message\n\n";

    // Aggiungi la data nel file di testo
    file_put_contents("contatti.txt", $data, FILE_APPEND);

    // Reindirizza o visualizza un messaggio di successo
    header("Location: success.html");
    exit();
} else {
    // Ritorna a index.html se il form non è stato inviato
    header("Location: index.html");
    exit();
}
?>