<?php 

class Login extends CI_Controller
{
	public function index() //login page view
	{
		$this->load->view('LoginView');
	}
	public function AdminLogin()
    {
        header('Access-Control-Allow-Origin:*');
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run())
        {
            $this->load->model('UserModel');
            if($data=$this->UserModel->loginuser($this->input->post('username'),$this->input->post('password')))
            {
                echo"<script>
                    window.location='Dashboard'
                </script>";  
            }
            else
            {
                die("Error ...");            
            }
        }
        else 
        {
            echo validation_errors();
        }
    }


      
    public function Logout()  // 
    {
        $this->session->unset_userdata("userid");
        $this->session->unset_userdata("name");
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("password");
         redirect(base_url('Login'));  
    }
}
?>