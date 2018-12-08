<?php 

/**
* 
*/
class DashboardModel extends CI_Model
{
	
	public function TotalFees()
	 {
	 	$this->db->select('SUM(fees.debit) as TotalDebit,SUM(fees.credit) as TotalCredit');
		$this->db->from('fees');
    	//$this->db->where('date', date('Y-m-d'));
		$result = $this->db->get();
		return $result->result_array()[0];
		
	 }

	 public function TotalStudent()
	 {
	 	$this->db->select('std_id, COUNT(std_id) as total');
	 	$this->db->from('student_addmission');
 		$result = $this->db->get();
 		return $result->result_array()[0];
	 }

	  public function ActiveStudent()
	 {
	 	$this->db->select('std_id, COUNT(std_id) as total');
	 	$this->db->from('student_addmission');
	 	$this->db->where('status',1);
 		$result = $this->db->get();
 		return $result->result_array()[0];
	 }
 		
 		
	 	
		
	 public function NewStudent()
	 {
	 	$this->load->helper('date');
	 	$this->db->select('std_id, COUNT(std_id) as total');
	 	$this->db->from('student_addmission');
	 	$this->db->where('std_date >',DATE_SUB(NOW(),'INTERVAL 1 WEEK'));
 		$result = $this->db->get();
 		return $result->result_array()[0];
	 }
 		
 		
	 	
		
		
		

}







 ?>