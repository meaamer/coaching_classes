<?php 



class Student extends CI_Controller
{
	
	public function StudentList($id=null) // to show the new student list
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('StudentModel');
		$data['list'] = $this->StudentModel->SelectStudent();
		$data['city'] = $this->StudentModel->CityList();
		$data['state'] = $this->StudentModel->StateList();
		$data['course'] = $this->StudentModel->CourseList();
		if ($id!=null) 
		{
			
			$data['rows']= $this->StudentModel->SelectStudent($id)[0];
			$data['city_rows'] = $this->StudentModel->CityList($id);
			$data['state_rows'] = $this->StudentModel->StateList($id);
			$data['course_rows'] = $this->StudentModel->CourseList($id);
			
		}
		$this->load->view('StudentView',$data);
		$this->load->view('includes/footer');
	}

	public function ActiveStudent($id=null) //to show the active stududent list
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('StudentModel');
		$data['list'] = $this->StudentModel->ActiveSelectStudent();
		$data['city'] = $this->StudentModel->CityList();
		$data['state'] = $this->StudentModel->StateList();
		$data['course'] = $this->StudentModel->CourseList();
		if ($id!=null) 
		{
			
			$data['rows']= $this->StudentModel->ActiveSelectStudent($id)[0];
			$data['city_rows'] = $this->StudentModel->CityList($id);
			$data['state_rows'] = $this->StudentModel->StateList($id);
			$data['course_rows'] = $this->StudentModel->CourseList($id);
			
		}
		$this->load->view('ActiveStudentView',$data);
		$this->load->view('includes/footer');
	}
		
		


	public function DetailView($id)//to show the detail view modal 
	{
		$this->load->model('StudentModel');
		$data['list'] = $this->StudentModel->SelectDetails($id);
		echo $this->load->view('SudentDetails',$data,true);
	}




	public function DeleteStudent($id)
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->model('StudentModel');
		$final = $this->StudentModel->DropStudent($id);
		 if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}
	}

	public function InserStudent()
	{
		header('Access-Control-Allow-Origin:*');
			
			$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('mother_name', 'Mother Name', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('mnumber', 'Mobile No', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('education', 'Education', 'required');
			$this->form_validation->set_rules('course', 'Course', 'required');
			$this->form_validation->set_rules('subcourse', 'Sub Course', 'required');
			$this->form_validation->set_rules('fees', 'Fees', 'required');
			$this->form_validation->set_rules('addmission', 'Addmission Date', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('state', 'State Name', 'required');
			$this->form_validation->set_rules('city', 'City Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$var = $_FILES["photo"];
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '1024';
			$config['encrypt_name']= TRUE;
			$this->load->library('upload', $config);
			if($this->form_validation->run())
			{
				if ( ! $this->upload->do_upload('photo'))
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					$image = array('upload_data' => $this->upload->data());
					$data = array(
					"std_full_name"=>$this->input->post("full_name"),
					"std_mother_name"=>$this->input->post("mother_name"),
					"std_dob"=>$this->input->post("dob"),
					"std_gender"=>$this->input->post("gender"),
					"std_mobile"=>$this->input->post("mnumber"),
					"std_password"=>$this->input->post("password"),
					"std_email"=>$this->input->post("email"),
					"std_fees"=>$this->input->post("fees"),
					"std_education"=>$this->input->post("education"),
					"std_course"=>$this->input->post("course"),
					"std_sub_course"=>$this->input->post("subcourse"),
					"std_addmission_date"=>$this->input->post("addmission"),
					"std_address"=>$this->input->post("address"),
					"std_state"=>$this->input->post("state"),
					"std_city"=>$this->input->post("city"),
					'std_date'=> $date = date('d-m-Y'),
					
					"std_image"=>$config['upload_path'].$image['upload_data']['file_name']
					);
					//die(print_r($data));
					$this->load->model('StudentModel');
					if($res=$this->StudentModel->AddStudent($data))
					{
						die ('<div class="alert alert-success" > Submit successfully</div>');		
					}else
					{
						die ('<div class="alert alert-success" >Please  ReSubmit</div>');			
					}	
					
				}
				
			}
			else 
			{
				echo validation_errors();
			}
	}



	public function ChangeStudent($id)
	{
		if($_FILES['photo']['tmp_name']!=""){
			$this->ChangeStudentWithPhoto($id);
		}else{
			$this->ChangeStudentWithoutPhoto($id);
		}
	}
	public function ChangeStudentWithPhoto($id)
	{
		header('Access-Control-Allow-Origin:*');
			
			$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('mother_name', 'Mother Name', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('mnumber', 'Mobile No', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('education', 'Education', 'required');
			$this->form_validation->set_rules('course', 'Course', 'required');
			$this->form_validation->set_rules('subcourse', 'Sub Course', 'required');
			$this->form_validation->set_rules('fees', 'Fees', 'required');
			$this->form_validation->set_rules('addmission', 'Addmission Date', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('state', 'State Name', 'required');
			$this->form_validation->set_rules('city', 'City Name', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$var = $_FILES["photo"];
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '1024';
			$config['encrypt_name']= TRUE;
			$this->load->library('upload', $config);
			if($this->form_validation->run())
			{
				if ( ! $this->upload->do_upload('photo'))
				{
					$error = array('error' => $this->upload->display_errors());
					echo $error['error'];
				}
				else
				{
					$image = array('upload_data' => $this->upload->data());
					$cur_img=$config['upload_path'].$image['upload_data']['file_name'];

					
						$data = array(
						"std_image"=>$cur_img,	
						"std_full_name"=>$this->input->post("full_name"),
						"std_mother_name"=>$this->input->post("mother_name"),
						"std_dob"=>$this->input->post("dob"),
						"std_gender"=>$this->input->post("gender"),
						"std_mobile"=>$this->input->post("mnumber"),
						"std_password"=>$this->input->post("password"),
						"std_email"=>$this->input->post("email"),
						"std_education"=>$this->input->post("education"),
						"std_course"=>$this->input->post("course"),
						"std_fees"=>$this->input->post("fees"),
						"std_sub_course"=>$this->input->post("subcourse"),
						"std_addmission_date"=>$this->input->post("addmission"),
						"std_address"=>$this->input->post("address"),
						"std_state"=>$this->input->post("state"),
						"std_city"=>$this->input->post("city")
						);
						$this->load->model('StudentModel');
					if($res=$this->StudentModel->AlterStudent($data,$id))
					{
						die ('<div class="alert alert-success" > Update successfully</div>');		
					}else
					{
						die ('<div class="alert alert-success" >Please  ReSubmit</div>');
					}	
					
				}
			}
			else 
			{
				echo validation_errors();
			}
	}

	public function ChangeStudentWithoutPhoto($id)
	{
		header('Access-Control-Allow-Origin:*');
			
			$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('mother_name', 'Mother Name', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('mnumber', 'Mobile No', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('education', 'Education', 'required');
			$this->form_validation->set_rules('course', 'Course', 'required');
			$this->form_validation->set_rules('subcourse', 'Sub Course', 'required');
			$this->form_validation->set_rules('fees', 'Fees', 'required');
			$this->form_validation->set_rules('addmission', 'Addmission Date', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('state', 'State Name', 'required');
			$this->form_validation->set_rules('city', 'City Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run())
			{
			$data = array(
					
					"std_full_name"=>$this->input->post("full_name"),
					"std_mother_name"=>$this->input->post("mother_name"),
					"std_dob"=>$this->input->post("dob"),
					"std_gender"=>$this->input->post("gender"),
					"std_mobile"=>$this->input->post("mnumber"),
					"std_password"=>$this->input->post("password"),
					"std_email"=>$this->input->post("email"),
					"std_education"=>$this->input->post("education"),
					"std_course"=>$this->input->post("course"),
					"std_fees"=>$this->input->post("fees"),
					"std_sub_course"=>$this->input->post("subcourse"),
					"std_addmission_date"=>$this->input->post("addmission"),
					"std_address"=>$this->input->post("address"),
					"std_state"=>$this->input->post("state"),
					"std_city"=>$this->input->post("city")
					);
					$this->load->model('StudentModel');
					if($res=$this->StudentModel->AlterStudent($data,$id))
					{
						die ('<div class="alert alert-success" > Update successfully</div>');		
					}else
					{
						die ('<div class="alert alert-success" >Please  ReSubmit</div>');
					}	
			}
			else 
			{
				echo validation_errors();
			}
	}

	public function UpdateStatus($id,$status)
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->model('StudentModel');
		$this->StudentModel->UpdateStatus($id,$status);
	}

	public function SearchStd($std_search=null)
	{

		header('Access-Control-Allow-Origin:*');
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters();
         $this->form_validation->set_rules('std_search','text','required');
          if($this->form_validation->run())
          {
			$std_search=$this->input->post("std_search");
			$this->load->model('StudentModel');
			$search_data['search']= $this->StudentModel->SearchDetails($std_search);
			echo $this->load->view('SearchView',$search_data,true);
		
		}
	}

	public function DateSorting()
	{
			header('Access-Control-Allow-Origin:*');
            $this->load->library("form_validation");
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
            $this->form_validation->set_rules('from_date', 'From', 'required');
            $this->form_validation->set_rules('to_date', 'To', 'required');
            if($this->form_validation->run())
            {
            	$to_date =$this->input->post("to_date");
            	$from_date =$this->input->post("from_date");
                $this->load->model('StudentModel');
                $data['sorting']=$this->StudentModel->DateFind($to_date,$from_date);
                //die(print_r($data));
               echo $this->load->view('SortedView',$data,true);
               
			}
	}


}

?>

