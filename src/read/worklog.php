<?php
/**
 *  This Class reads Task Table from OpenAir Database.
 *  https://www.openair.com/download/OpenAirXMLAPIGuide.pdf page 126
 */
class Command_ReadWorklogsByProjectTaskId extends ReadCommand
{
	function __construct($projecttaskid,$limit=1000) 
	{
		$this->type = 'Task';
		$this->method = 'equal to';
		$this->limit = $limit;
		$this->_projecttaskid = $projecttaskid;
	}
	function _buildRequest($dom)
	{
		$read = parent::_buildDefaults($dom);
		$project = $dom->createElement('Task');
		$id = $dom->createElement('projecttaskid',$this->_projecttaskid);
		
		$project->appendChild($id);
		$read->appendChild($project);
		
		return $read;
    }
	function toString()
	{
		if(parent::toString()==-1)
			return;
		echo "---------------Work logs (".count($this->result).") (projectaskid=$this->_projecttaskid, limit=$this->limit) --------------".EOL;
		$userid = $this->userid;
		$decimal_hours = $this->decimal_hours;
		$date = $this->date;
		for($i=0;$i<count($userid);$i++)
			echo $i."  (date)".$date[$i]['Date']['month']."-".$date[$i]['Date']['day']."-".$date[$i]['Date']['year']."  (userid)".$userid[$i]." (decimal_hours)".$decimal_hours[$i].EOL;
	}
}	
?>