<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    // Validazione del nome
    $name = $_POST["name"];
    if (empty($name)) {
        $errors[] = "Il campo Nome è obbligatorio";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $errors[] = "Il campo Nome può contenere solo lettere e spazi";
    }

    // Validazione dell'email
    $email = $_POST["email"];
    if (empty($email)) {
        $errors[] = "Il campo Email è obbligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email non valida";
    }

    // Validazione del messaggio
    $message = $_POST["message"];
    if (empty($message)) {
        $errors[] = "Il campo Messaggio è obbligatorio";
    }

    // Se ci sono errori, mostra il messaggio di errore
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // Se non ci sono errori, elabora il form
        $data = "Nome: $name\nEmail: $email\nMessaggio: $message\n\n";
        // Aggiungi la data nel file di testo
        file_put_contents("contatti.txt", $data, FILE_APPEND);
        // Reindirizza o visualizza un messaggio di successo
        header("Location: success.html");
        exit();
    }
} else {
    // Ritorna a index.html se il form non è stato inviato
    header("Location: index.html");
    exit();
}
?>