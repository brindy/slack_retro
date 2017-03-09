<?php
    $team_id = $_POST['team_id'];
    $channel_id = $_POST['channel_id'];
    $user_name = $_POST['user_name'];
?>

Completing current retro...

<?php

   include('command-list.php');

$mysqli = new mysqli("localhost", "root", "", "slack_retro");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    return;
}

$stmt = $mysqli->prepare('update retro set retro_completed=now(), retro_completed_by=? where team_id=? and channel_id=? and retro_completed is null');
$stmt->bind_param('sss', $user_name, $team_id, $channel_id);
$stmt->execute();

$stmt->close();
$mysqli->close();

?>
... DONE
