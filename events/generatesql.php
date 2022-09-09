<?php
$count = 50;
$title = 'test event ';
$descriptions = array(
    '',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.',
    'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'
);
$sql = "INSERT INTO `event_calendar` (`start`, `end`, `title`, `description`) VALUES";
$records = array();
for($i=0; $i<=$count; $i++){
    $date_from = mt_rand(strtotime("+5 days"),strtotime("+6 months"));
    $rand_from = $date_from+2*60*60;
    $rand_to = $rand_from+48*60*60;
    //echo $rand_from . '-' .$rand_to. '\n';
    $date_to = mt_rand($rand_from,$rand_to);
    $records[] = "('".date("Y-m-d H:i:s",$date_from)."', '".date("Y-m-d H:i:s",$date_to)."', '".$title.$i."', '".$descriptions[mt_rand(0,(count($descriptions)-1))]."')";
}

$sql .= implode(",\n",$records).";";
echo $sql;
?>