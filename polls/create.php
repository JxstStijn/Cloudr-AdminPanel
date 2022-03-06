<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Check if POST variable "title" exists, if not default the value to blank, basically the same for all variables
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    // Insert new record into the "polls" table
    $stmt = $pdo->prepare('INSERT INTO polls (title, description) VALUES (?, ?)');
    $stmt->execute([ $title, $description ]);
    // Below will get the last insert ID, this will be the poll id
    $poll_id = $pdo->lastInsertId();
    // Get the answers and convert the multiline string to an array, so we can add each answer to the "poll_answers" table
    $answers = isset($_POST['answers']) ? explode(PHP_EOL, $_POST['answers']) : '';
    foreach($answers as $answer) {
        // If the answer is empty there is no need to insert
        if (empty($answer)) continue;
        // Add answer to the "poll_answers" table
        $stmt = $pdo->prepare('INSERT INTO poll_answers (poll_id, title) VALUES (?, ?)');
        $stmt->execute([ $poll_id, $answer ]);
    }
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create Poll')?>

<div class="content update">
	<h2>Create Poll</h2>
    <form action="create.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Title" required>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" placeholder="Description">
        <label for="answers">Answers (per line)</label>
        <textarea name="answers" id="answers" placeholder="Description" required></textarea>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>