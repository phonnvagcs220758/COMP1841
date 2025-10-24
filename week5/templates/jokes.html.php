<?php foreach($jokes as $joke): ?>
        <blockquote>
        <div>
            <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?><br>
            Posted on <?= date('d M Y', strtotime($joke['jokedate'])) ?>
        </div>    
        
        (by <a href="mailto:<?=htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8' );?>">
        <?=htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

        <a href="editjoke.php?id=<?=$joke['id']?>">Edit</a>

        <?php if (!empty($joke['image'])): ?>
            <img style="border-radius: 50%; border-style: dotted; border-width: 3px;" src="../week4/jokes/images/<?= htmlspecialchars($joke['image'], ENT_QUOTES, 'UTF-8') ?>" 
                 alt="Joke image" width="150">
        <?php endif; ?>

        <form action="deletejoke.php" method="post">
            <input type="hidden" name="id" value="<?=$joke['id']?>">
            <input type="submit" value="Delete">
        </form>
        </blockquote>
        <?php endforeach;?>