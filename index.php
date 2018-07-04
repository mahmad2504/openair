<?php
define('API_KEY','XXXXXXX');
define('ORGANIZATION','XXXXX');
define('USERNAME','XXXXX');
define('PASSWORD','XXXXXX');

require_once('/src/includes');

$oa = new OpenAir(API_KEY);
$auth = new Auth(ORGANIZATION,USERNAME,PASSWORD);
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
$data = $h5->toString('id','name','currency');

echo "<h3>----ReadWorkLogsByProjectTaskId-----</h3>";
$h6 = $oa->ReadWorkLogsByProjectTaskId('59484,66242');
$oa->Execute();
$h6->toString('date','userid','decimal_hours');


return;
?>