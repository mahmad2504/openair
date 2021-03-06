<?php
/**
 *  This Class reads User Table from OpenAir Database.
 *  https://www.openair.com/download/OpenAirXMLAPIGuide.pdf page 134 
 */
class Command_ReadUserById extends ReadCommand
{
	function __construct($id) 
	{
		$this->type = 'User';
		$this->method = 'equal to';
		$this->limit = 1;
		$this->_id = $id;
	}
	function _buildRequest($dom)
	{
		$read = parent::_buildDefaults($dom);
		$user_element = $dom->createElement('User');
		$id_element = $dom->createElement('id',$this->_id);
		
		$user_element->appendChild($id_element);
		$read->appendChild($user_element);
		return $read;
    }
	function toString()
	{
		if(parent::toString()==-1)
			return;
		echo "---------------User (id=$this->_id) --------------".EOL;
		//echo $this->result['id']." ".$this->result['name']."<br>";
		$ids = $this->id;
		$names = $this->name;
		for($i=0;$i<count($ids);$i++)
			echo "(id)".$ids[$i]." (name)".$names[$i].EOL;
		
		
	}
}
?>
