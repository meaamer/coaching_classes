<?php 

class FeesModel extends CI_Model
{
	public function SelectFees($id=null)
	{
		$this->db->select('*');
		$this->db->from('student_addmission');		
		
		$this->db->order_by("student_addmission.std_id", "DESC");
		$result = $this->db->get();
		$datax = "";
		foreach ($result->result_array() as $data) {
			$tDebit=0;
			$tCredit=0;
			if($this->GetFeesInfo($data['std_id'])['TotalCredit']!=""){$tCredit=$this->GetFeesInfo($data['std_id'])['TotalCredit'];}
			

			if($this->GetFeesInfo($data['std_id'])['TotalDebit']!=""){$tDebit=$this->GetFeesInfo($data['std_id'])['TotalDebit'];}
			
			$datax[]=array(
							'std_id' => $data['std_id'],
							'std_full_name' => $data['std_full_name'],
							'std_image' => $data['std_image'],
							'date' => "",
							'TotalCredit' => $tCredit,
							'TotalDebit' =>  $tDebit);

		}
		return $datax;
	}


	public function SelectBalanceFees($std_id,$fees_id=null)
	{
	 	$this->db->select('*');
		$this->db->from('fees');
		$this->db->where('std_id',$std_id);	
		if ($fees_id!=null){
			$this->db->where('fees_id',$fees_id);
		}
		$result = $this->db->get();
		return $result->result_array();
	}
		
		


	public function GetStudentInfo($id)
	{
	 	$this->db->select('*');
		$this->db->from('student_addmission');
		$this->db->where('std_id',$id);	
		$result = $this->db->get();
		return $result->result_array()[0];
	}
	 	
		

	//  public function PrintOldInvoice($fees_id,$std_id)
	// {

	// $this->db->select('*');
	// $this->db->from('fees');
	// $this->db->join('student_addmission','fees.std_id = student_addmission.std_id','left');
	// $this->db->where('fees.fees_id',$fees_id);
	// $this->db->where('student_addmission.std_id',$std_id);
	// $result = $this->db->get();
	// return $result->result_array();
	// }
		



	public function GetFeesInfo($id){

		$this->db->select('SUM(fees.debit) as TotalDebit,SUM(fees.credit) as TotalCredit');
		$this->db->from('fees');
		$this->db->where('std_id',$id);	
		$result = $this->db->get();
		return $result->result_array()[0];
	}

	public function SelectDetails($id)
	{
		$this->db->select('*');
		$this->db->from('fees');
		// $this->db->join('student_addmission', 'student_addmission.std_id = fees.std_id','left');
		$this->db->where('std_id',$id);
		$result = $this->db->get();
		return $result->result_array();
	}

	public function SaveFees($data)
	{
		$this->db->insert("fees",$data);
		return true;
	}
	public function EndFees($id)
	{
		$this->db->where('fees_id',$id);
		$this->db->delete('fees');
		return true;
	}

	public function alterFees($data,$id)
	{
		$this->db->where('fees_id',$id);
		$this->db->update('fees',$data);
		return true;
	}

}






 ?>