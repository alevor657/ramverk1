<?php
namespace Anax\View;

$email = $chosenPost->authorReply ?? '';
$heading = $chosenPost->headingReply ?? '';
$text = $chosenPost->textReply ?? '';
$id = $chosenPost->idReply ?? '';
?>
<div class="comments">
    <div class="card-columns pt-3">
        <?php foreach ($posts as $post) : ?>
            <div class="card text-center">
                <div class="icons-wrap">
                    <a href="<?=url("comments/delete/{$post->idReply}")?>">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                    <a href="<?=url("comments/edit/{$post->idReply}")?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </div>
                <img class="card-img-top" src="<?=$post->avatarUrlReply?>" alt="Avatar">
                <div class="card-body">
                    <h4 class="card-title"><?=$post->headingReply?></h4>
                    <p class="card-text"><?=$post->textReply?></p>
                    <p class="card-text"><small class="text-muted"><?=$post->authorReply?></small></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <hr>

    <form method="POST" action="<?=url("comments")?>" class="mb-2">
        <div class="form-group">
            <label for="emailInput">Email address</label>
            <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" required="required" name="email" value="<?=$email?>">
        </div>
        <div class="form-group">
            <label for="headingInput">Heading</label>
            <input type="text" class="form-control" id="headingInput" required="required" name="heading" value="<?=$heading?>">
        </div>
        <div class="form-group">
            <label for="textInput">Message</label>
            <textarea class="form-control" id="textInput" rows="3" required="required" name="text"><?=$text?></textarea>
        </div>
        <?php if ($id) : ?>
            <a href="<?=url("comments/edit/")?>">
                <button type="submit" class="btn btn-primary" name="submit" value="<?=$id ?? ''?>">Edit your comment</button>
            </a>
        <?php else : ?>
            <button type="submit" class="btn btn-primary" name="submit" value="<?=$id ?? ''?>">Add your comment</button>
        <?php endif; ?>
    </form>
</div>
