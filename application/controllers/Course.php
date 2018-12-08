<?php 

class Course extends CI_Controller
{
	public function CourseList($id=null) //to show course list
	{
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('CourseModel');
		$data['list'] = $this->CourseModel->SelectCourse();
		if ($id!=null) 
		{
			$data['rows']= $this->CourseModel->SelectCourse($id)[0];
		}
		$this->load->view('CourseView',$data);
		$this->load->view('includes/footer');
	}

	public function InserCourse()
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
		$this->form_validation->set_rules('send_course', 'Course Name', 'required');
		$this->form_validation->set_rules('send_fees', 'Fees', 'required');
		if($this->form_validation->run())
		{
			$data=array(
						'course_name' => $this->input->post('send_course'),
						'course_fees' => $this->input->post('send_fees')
						);
			$this->load->model('CourseModel');
			$result =$this->CourseModel->SaveCourse($data);
			if ($result == true) 
			{
				die ('<div class="alert alert-success" > Submit successfully</div>');
			} 
			else 
			{
				die ('<div class="alert alert-danger" > Please Resubmit</div>');
			}
		}
		else 
		{
			echo validation_errors();
		}
	}

	public function DropCourse($id)
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->model('CourseModel');
		$final = $this->CourseModel->EndCourse($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}

	}

	public function ChangeCourse($id)
	{
		$old_id = $id;
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
		$this->form_validation->set_rules('send_course','Course Name', 'required');
		$this->form_validation->set_rules('send_fees', 'Fees', 'required');
		if($this->form_validation->run())
		{
			$data=array(
				'course_name' => $this->input->post('send_course'),
				'course_fees' => $this->input->post('send_fees')
				);
				
			$this->load->model('CourseModel');
			$result =$this->CourseModel->alterCourse($data,$old_id);
			if ($result == true) 
			{
				die ('<div class="alert alert-success" > Submit successfully</div>');
			} 
			else 
			{
				die ('<div class="alert alert-danger" > Please Resubmit</div>');
			}
		}
		else 
		{
			echo validation_errors();
		}
	}
}
?>