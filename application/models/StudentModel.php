<?php 

class StudentModel extends CI_Model
{
	public function SelectStudent($id=null)
	{
		$this->db->select('*');
		$this->db->from('student_addmission');
		$this->db->where('status',0);
		if ($id!=null) 
		{
			$this->db->where('std_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
	}

	public function ActiveSelectStudent($id=null)
	{
		$this->db->select('*');
		$this->db->from('student_addmission');
		$this->db->where('status',1);
		if ($id!=null) 
		{
			$this->db->where('std_id',$id);
		}

		$result = $this->db->get();
		return $result->result_array();
	}


	public function SelectDetails($id)
	{
		$this->db->select('*');
		$this->db->from('student_addmission');
		$this->db->where('std_id',$id);
		$result = $this->db->get();
		return $result->result_array();
	}

	public function DropStudent($id)
	{
		//die($id);
		
		$this->db->where('std_id',$id);
		$this->db->delete('student_addmission');
		return true;
	}
	public function AddStudent($data)
	{
		$this->db->insert("student_addmission",$data);
		$r_id = $this->db->insert_id();
		$this->db->insert('fees',array('std_id'=>$r_id,'debit'=>'0','credit'=>$this->input->get_post('fees'),'date' => date('d-m-Y')));
		return true;	
	}

	public function AlterStudent($data,$id)
	{
		$this->db->where('std_id',$id);
		$this->db->update('student_addmission',$data);
		return true;
	}

	public function ChecktStatus($id)
	{
		$this->db->select('*');
		$this->db->from('student_addmission');  
		$this->db->where('std_id',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function UpdateStatus($id,$data)
	{
		$this->db->where('std_id',$id);
		$data = array('status' =>$data);
		$this->db->update('student_addmission',$data);
		return true;
	}
		

	// fetch data from other table city state course

	public function CityList($id=null)
	{
		$this->db->select('*');
		$this->db->from('city');
		if ($id!=null) 
		{
			$this->db->where('city_id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function StateList($id=null)
	{
		$this->db->select('*');
		$this->db->from('state');
		if ($id!=null) 
		{
			$this->db->where('state_id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function CourseList($id=null)
	{
		$this->db->select('*');
		$this->db->from('course');
		if ($id!=null) 
		{
			$this->db->where('course_id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function SearchDetails($std_search)
	{
		$this->db->select('*');
		$this->db->like('std_full_name',$std_search);
		$this->db->or_like('std_mobile', $std_search); 
		$query=$this->db->get("student_addmission");
		return $query->result_array();
		
	}

	public function DateFind($to_date=null,$from_date=null)
		{
			
			$this->db->select("*");
			$this->db->from("student_addmission");
			if($from_date!=null){
				$this->db->where('std_addmission_date >=',$from_date);
			}
			if($to_date!=null){
				$this->db->where('std_addmission_date <=',$to_date);
			}
			
			$query=$this->db->get();
			return $query->result_array();
		}	
			
			
			
}











 ?>