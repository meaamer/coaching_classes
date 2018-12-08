<?php 

/**
* 
*/
class Dashboard extends CI_Controller
{
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/side');
		$this->load->model('DashboardModel');
		//$data['new_student'] = $this->DashboardModel->NewStudent();
		 $data['active_studdent'] = $this->DashboardModel->ActiveStudent();
		$data['all_student'] = $this->DashboardModel->TotalStudent();
		$data['list'] = $this->DashboardModel->TotalFees();
		$this->load->view('DashboardView',$data);
		$this->load->view('includes/footer');
	}
}
?>