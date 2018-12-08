<?php 

class CityModel extends CI_Model
{
	public function SelectCity($id=null)
	{
		$this->db->select('*');
		$this->db->from('city');
		if ($id!=null) 
		{
			$this->db->where('city_id',$id);
		}
			
		$result = $this->db->get();
		return $result->result_array();
	}

	public function SaveCity($data)
	{
		$this->db->insert("city",$data);
		return true;
	}
	public function EndCity($id)
	{
		$this->db->where('city_id',$id);
		$this->db->delete('city');
		return true;
	}

	public function alterCity($data,$id)
	{
		$this->db->where('city_id',$id);
		$this->db->update('city',$data);
		return true;
	}

}






 ?>