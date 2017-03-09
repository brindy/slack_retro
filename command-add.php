<?php
    $text = substr($_POST['text'], 4);
    $team_id = $_POST['team_id'];
    $channel_id = $_POST['channel_id'];
?>

Adding... 
"<?= $text ?>"

<?php

$mysqli = new mysqli("localhost", "root", "", "slack_retro");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    return;
}

$stmt = $mysqli->prepare('insert into retro (team_id, channel_id, retro_item) values (?, ?, ?)');
$stmt->bind_param('sss', $team_id, $channel_id, $text);
$stmt->execute();

if ($stmt->affected_rows < 1) {
    printf("Error adding item: %s\n", $stmt->error);
}

$stmt->close();
$mysqli->close();

?>
... DONE
