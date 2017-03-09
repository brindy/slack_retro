<?php
    $team_id = $_POST['team_id'];
    $channel_id = $_POST['channel_id'];

$mysqli = new mysqli("localhost", "root", "", "slack_retro");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    return;
}

$stmt = $mysqli->prepare('select retro_item from retro where team_id=? and channel_id=? and retro_completed is null');
$stmt->bind_param('ss', $team_id, $channel_id);
$stmt->execute();

$stmt->bind_result($retro_item);
$count = 0;
while ($stmt->fetch()) {

   if ($count == 0) {
      echo "Current items for retrospective:\n";
   }

   $count++;
   printf("* %s\n", $retro_item);

}

if ($count == 0) {
   echo "No items for the next retrospective... yet.";
}

$stmt->close();
$mysqli->close();

?>
