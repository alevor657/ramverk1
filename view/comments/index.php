<div class="card-columns pt-3">
    <?php foreach ($data as $post): ?>
        <div class="card text-center">
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

<form method="POST" action="<?=$app->url->create("comments/add")?>" class="mb-2">
    <div class="form-group">
        <label for="emailInput">Email address</label>
        <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" required="required" name="email">
    </div>
    <div class="form-group">
        <label for="headingInput">Heading</label>
        <input type="text" class="form-control" id="headingInput" required="required" name="heading">
    </div>
    <div class="form-group">
        <label for="textInput">Message</label>
        <textarea class="form-control" id="textInput" rows="3" required="required" name="text"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add your comment</button>
</form>
