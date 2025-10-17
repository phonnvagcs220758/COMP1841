<?php
if (isset($_POST['joketext'])){
    try{
        include 'includes/DatabaseConnection.php';

        $imageName = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $imageName = basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $imageName;

            move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
        }

        $sql = 'INSERT INTO joke SET
                joketext = :joketext,
                jokedate = CURDATE(),
                image = :image';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':image', $imageName);
        $stmt->execute();
        header('location: jokes.php');
    }catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    $title = 'Add a new joke';
    ob_start();
    include 'templates/addjoke.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';