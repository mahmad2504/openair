<?php
require_once('/src/includes');

$oa = new OpenAir('apikey');
$auth = new Auth('organization','user','password');
$oa->AddAuth($auth);

$h1 = $oa->ReadProjectByName('5979|MEL/MEIF for Power Generation Svcs');
$h2 = $oa->ReadProjectById('6012,24');
$oa->Execute();

echo "<h3>----ReadProjectByName-----</h3>";
$h1->toString('id','name');
echo "<h3>----ReadProjectById-----</h3>";
$h2->toString('id','name');
$h3 = $oa->ReadTasksByProjectId($h2);
$oa->Execute();
echo "<h3>----ReadTasksByProjectId-----</h3>";
$h3->toString('id','projectid','name');

$h4 = $oa->ReadAssignedUsersByProjectTaskId($h3);
$oa->Execute();
echo "<h3>----ReadAssignedUsersByProjectTaskId-----</h3>";
$h4->toString('projecttaskid','userid');
$h5 = $oa->ReadUserById($h4,'userid');
$oa->Execute();
echo "<h3>----ReadUserById-----</h3>";
$h5->toString('id','name');
return;
?>