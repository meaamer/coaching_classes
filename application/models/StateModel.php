<?php 

class StateModel extends CI_Model
{
	public function SelectState($id=null)
	{
		$this->db->select('*');
		$this->db->from('state');
		if ($id!=null) 
		{
			$this->db->where('state_id',$id);
		}
			
		$result = $this->db->get();
		return $result->result_array();
	}

	public function SaveState($data)
	{
		$this->db->insert("state",$data);
		return true;
	}
	public function EndState($id)
	{
		$this->db->where('state_id',$id);
		$this->db->delete('state');
		return true;
	}

	public function alterState($data,$id)
	{
		$this->db->where('state_id',$id);
		$this->db->update('state',$data);
		return true;
	}

}






 ?>