<?php
    $team_id = $_POST['team_id'];
    $channel_id = $_POST['channel_id'];

$mysqli = new mysqli("localhost", "root", "", "slack_retro");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    return;
}

$stmt = $mysqli->prepare('select retro_completed, retro_completed_by from retro where retro_completed is not null and team_id=? and channel_id=? group by retro_completed order by retro_completed desc');
$stmt->bind_param('ss', $team_id, $channel_id);
$stmt->execute();

$stmt->bind_result($retro_completed, $retro_completed_by);
$count = 0;
while ($stmt->fetch()) {

   if ($count == 0) {
      echo "Channel retrospective closure history:\n";
   }

   $count++;
   printf("* %s : %s\n", $retro_completed, $retro_completed_by);

}

if ($count == 0) {
   echo "No closed retrospectives... yet.";
}

$stmt->close();
$mysqli->close();

?>
