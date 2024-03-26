<?php

session_start();
require_once 'functions/config.php'; // Adjust the path as needed

// Fetch comments
$commentsResult = $conn->query("SELECT title, comment, author, datePosted FROM comments ORDER BY comments.datePosted DESC");
$comments = $commentsResult->fetch_all(MYSQLI_ASSOC);
?>
<?php include 'header.php'; ?>

<main>
    <div class="container text-center">
        <h1>Community Forum</h1>
    </div>
    <div class="container-sm">
        <div class="row">
            <div class="col-8">
                <p>Hello community member(non chef), we welcome tou to tell us about your cooking journey. Feel free to
                    let
                    us know which of our recipes you tried, and what recipes you'd want our chef's to write about next
                </p>
                <br>
            </div>
            <div class="col-4 text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" disabled id="customDisabledButton"
                        data-bs-toggle="modal" data-bs-target="#addComment">
                        Add Notes
                    </button>
                    <button type="button" class="btn btn-primary custom-border" data-bs-toggle="modal"
                        data-bs-target="#addComment">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>

    <!-- Comments Display -->
    <div class="container-sm">
        <div class="row text-center">
            <hr>
            <br>
            <h2>Comments</h2>
            <br>
            <br>
            <br>
        </div>
        <div class="container-sm">
            <?php foreach ($comments as $comment): ?>
            <div class="card mb-4">
                <h5 class="card-header custom-card-header"><?= htmlspecialchars($comment['title']); ?></h5>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><small><?= htmlspecialchars($comment['comment']); ?></small></p>
                        <footer class="blockquote-footer"><?= htmlspecialchars($comment['author']); ?> <cite
                                title="Date Posted"><?= date("j F, Y", strtotime($comment['datePosted'])); ?></cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


        <!-- Modals -->
        <!-- Add Recipe -->
        <div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="addCommentLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addCommentLabel">Write a Comment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container-sm">
                        <div class="col">
                            <form action="functions/submit_comment.php" method="post" enctype="multipart/form-data">
                                <h5>Community Guidlines</h5>
                                <br>
                                <p>
                                    <small>1. Comments cannot be modified after posting</small><br>
                                    <small>2. Kindly speak nicely</small>
                                </p>
                                <br>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="title" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4"
                                        required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Name</label>
                                    <input type="author" class="form-control" id="author" name="author" required>
                                </div>
                                <button type="submit" class="btn btn-primary text-center">Post Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>