<?php
class Command_ReadWorklogsByProjectId extends ReadCommand
{
	function __construct($projectid,$limit=1000) 
	{
		$this->type = 'Task';
		$this->method = 'equal to';
		$this->limit = $limit;
		$this->projectid = $projectid;
	}
	function _buildRequest($dom)
	{
		$read = parent::_buildDefaults($dom);
		$project = $dom->createElement('Task');
		$id = $dom->createElement('projectid',$this->projectid);
		
		$project->appendChild($id);
		$read->appendChild($project);
		
		return $read;
    }
	function toString()
	{
		if(parent::toString()==-1)
			return;
		echo "---------------Work logs (".count($this->result).") (projectid=$this->projectid, limit=$this->limit) --------------".EOL;
		$i=1;
		foreach($this->result as $result)
		{
			echo $i++." -".$result['date']['Date']['month']."-".$result['date']['Date']['day']."-".$result['date']['Date']['year']." user=".$result['userid']." taskid=".$result['projecttaskid']." logged-hours=".$result['decimal_hours'].EOL;
			//var_dump($result['date']);
			//echo $result['userid']."<br>";
		}
		
		
	}
}
class Command_ReadWorklogsByProjectTaskId extends ReadCommand
{
	function __construct($projecttaskid,$limit=1000) 
	{
		$this->type = 'Task';
		$this->method = 'equal to';
		$this->limit = $limit;
		$this->projecttaskid = $projecttaskid;
	}
	function _buildRequest($dom)
	{
		$read = parent::_buildDefaults($dom);
		$project = $dom->createElement('Task');
		$id = $dom->createElement('projecttaskid',$this->projecttaskid);
		
		$project->appendChild($id);
		$read->appendChild($project);
		
		return $read;
    }
	function toString()
	{
		if(parent::toString()==-1)
			return;
		echo "---------------Work logs (".count($this->result).") (projectaskid=$this->projecttaskid, limit=$this->limit) --------------".EOL;
		$i=1;
		foreach($this->result as $result)
		{
			echo $i++." -".$result['date']['Date']['month']."-".$result['date']['Date']['day']."-".$result['date']['Date']['year']." user=".$result['userid']." logged-hours=".$result['decimal_hours'].EOL;
			//var_dump($result['date']);
			//echo $result['userid']."<br>";
		}
		
		
	}
}	
?>