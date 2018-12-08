<?php 

class ExamModel extends CI_Model
{
	 public function CourseList()
	 {
	 		$this->db->select('*');
	 		$this->db->from('course');
	 		$query = $this->db->get();
	 		return $query->result_array();
	}

	public function SetList($course_id)
	 {
	 	$this->db->select('*');
	 		$this->db->from('sets');
	 		$query = $this->db->get();
	 		return $query->result_array();
	 }

	 public function QuestionList($set_id)
	 {
	 		$this->db->select('*');
	 		$this->db->from('questions');
	 		$query = $this->db->get();
	 		return $query->result_array();
	 }

	 public function AddSets($data)
	 {
	 	$this->db->insert('sets'$data);
	 	return true;
	 }

	 public function AddQuestion()
	 {
	 	$this->db->insert('questions'$data);
	 	return true;
	 }
}

 ?>