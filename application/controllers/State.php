<?php 

class State extends CI_Controller
{
	public function StateList($id=null)
	{
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('StateModel');
		$data['list'] = $this->StateModel->SelectState();
		if ($id!=null) 
		{
			$data['rows']= $this->StateModel->SelectState($id)[0];
		}
		$this->load->view('StateView',$data);
		$this->load->view('includes/footer');
		
	}
	public function InserState()
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
		$this->form_validation->set_rules('send_state', 'State Name', 'required');
		if($this->form_validation->run())
		{
			$data=array('state_name' => $this->input->post('send_state'));
			$this->load->model('StateModel');
			$result =$this->StateModel->SaveState($data);
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

	public function DropState($id)
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->model('StateModel');
		$final = $this->StateModel->EndState($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}

	}

	public function ChangeState($id)
	{
		$old_id = $id;
		
		header('Access-Control-Allow-Origin:*');
			
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
		$this->form_validation->set_rules('send_state', 'State Name', 'required');
		if($this->form_validation->run())
		{
			$data=array('state_name' => $this->input->post('send_state'));
			$this->load->model('StateModel');
			$result =$this->StateModel->alterState($data,$old_id);
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