<?php 

class City extends CI_Controller
{

	public function CityList($id=null)//to show the city list 
	{
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('CityModel');
		$data['list'] = $this->CityModel->SelectCity();
		if ($id!=null) 
		{
			$data['rows']= $this->CityModel->SelectCity($id)[0];
		}
		$this->load->view('CityView',$data);
		$this->load->view('includes/footer');
	}
		
	public function InserCity() //form function add new city
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
		$this->form_validation->set_rules('send_city', 'City Name', 'required');
		if($this->form_validation->run())
		{
			$data=array('city_name' => $this->input->post('send_city'));
			
			$this->load->model('CityModel');
			$result =$this->CityModel->SaveCity($data);
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

	public function DropCity($id) //to delete
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->model('CityModel');
		$final = $this->CityModel->EndCity($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}

	}

	public function ChangeCity($id) //update form
	{
		$old_id = $id;
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
		$this->form_validation->set_rules('send_city', 'City Name', 'required');
		if($this->form_validation->run())
		{
			$data=array('city_name' => $this->input->post('send_city'));
			$this->load->model('CityModel');
			$result =$this->CityModel->alterCity($data,$old_id);
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