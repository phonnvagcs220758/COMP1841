<?php if (!isset($error)) $error = ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of jokes</title>
</head>
<body>
    <?php if(isset($error)): ?>
        <p> <?=$errог ?> </p>
    <?php else:
        foreach($jokes as $joke): ?>
        <p>
        <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
        </p>
        <?php endforeach;
                    endif;
        ?>
</body>
</html>