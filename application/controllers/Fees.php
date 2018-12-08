<?php 

class Fees extends CI_Controller
{
	public function FeesList($id=null) //to show student fees details
	{
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('FeesModel');
		$data['list'] = $this->FeesModel->SelectFees();
		if ($id!=null) 
		{
			$data['rows']= $this->FeesModel->SelectFees($id)[0];
		}
		$this->load->view('accountview',$data);
		$this->load->view('includes/footer');
	}
		
	public function DetailFeesHistory($id)// to show fees taransaction history
	{
		$this->load->model('FeesModel');
		$data['list'] = $this->FeesModel->SelectDetails($id);
		$data['std_id'] = $id;
		echo $this->load->view('FeesDetails',$data,true);
	}

	public function NewEntry($id) //add student balance fees
	{
		$this->load->model('FeesModel');
		$data['list_item'] = $this->FeesModel->SelectBalanceFees($id);
		$data['student_info'] = $this->FeesModel->GetStudentInfo($id);
		echo $this->load->view('BalanceDetail',$data,true);
	}

	

	// public function PrintOldInvoice($fees_id,$std_id)
	// {
		
	// 	$this->load->model('FeesModel');
	// 	$data['balance'] = $this->FeesModel->PrintOldInvoice($fees_id,$std_id)[0];
	// 	//die(print_r($data));
	// 	$this->load->view('InvoiceView',$data);
	// }
		


	public function InsertFees($id)
	{
		$std_id = $id;
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
		$this->form_validation->set_rules('debit_fees', 'Fees', 'required');
		$resent_debit = $this->input->post('debit_fees');
		if($this->form_validation->run())
		{
			$data=array(

						'credit' => "0",
						'debit' =>$resent_debit ,
						'std_id'=> $std_id,
						'date'=> $date = date('d-m-Y')

						);
				
			$this->load->model('FeesModel');
			$result =$this->FeesModel->SaveFees($data);
			if ($result == true) 
			{
				echo'<script>
					window.open("PrintInvoice/'.$std_id.'/");
				</script>';
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
	public function PrintInvoice($std_id,$fees_id=null) // print invoice
	{
		
		$this->load->model('FeesModel');
		$data['list_item'] = $this->FeesModel->SelectBalanceFees($std_id,$fees_id);
		$data['student_info'] = $this->FeesModel->GetStudentInfo($std_id);
		$this->load->view('InvoiceView',$data);
	}
	

	public function DropFees($id)
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->model('FeesModel');
		$final = $this->FeesModel->EndFees($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}

	}

	public function ChangeFees($id)
	{
		$old_id = $id;
		
		header('Access-Control-Allow-Origin:*');
			
			$this->load->library("form_validation");
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
			$this->form_validation->set_rules('send_fees','Fees', 'required');
			
		
			
			
			
			if($this->form_validation->run())
			{
				$data=array(
					
					'debit' => $this->input->post('send_fees')
					);
					
				$this->load->model('FeesModel');
				$result =$this->FeesModel->alterFees($data,$old_id);
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