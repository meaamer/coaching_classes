<?php 

class CourseModel extends CI_Model
{
	public function SelectCourse($id=null)
	{
		$this->db->select('*');
		$this->db->from('course');
		if ($id!=null) 
		{
			$this->db->where('course_id',$id);
		}
			
		$result = $this->db->get();
		return $result->result_array();
	}

	public function SaveCourse($data)
	{
		$this->db->insert("Course",$data);
		return true;
	}
	public function EndCourse($id)
	{
		$this->db->where('course_id',$id);
		$this->db->delete('course');
		return true;
	}

	public function alterCourse($data,$id)
	{
		$this->db->where('course_id',$id);
		$this->db->update('course',$data);
		return true;
	}

}






 ?>