<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: POST, OPTIONS");
        // header("Access-Control-Allow-Methods: GET, OPTIONS");


	}

	public function index()
	{
		user_session_redirection();
		$data = array(
			'title'					=> global_title(),
			'page'					=> 'Dashboard',
      'page_orig'     => 'Dashboard',
			'global_icon'		=> global_icon(),
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/index',$data);
		$this->load->view('User/global/footer',$data);
	}

	public function profile()
	{
		user_session_redirection();
		$data = array(
			'title'					=> global_title(),
			'page'					=> 'Profile',
      'page_orig'     => 'Profile',
			'global_icon'		=> global_icon(),
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/profile',$data);
		$this->load->view('User/global/footer',$data);
	}

	public function leave()
	{
		user_session_redirection();
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Leave',
      'page_orig'     => 'Leave',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/leave',$data);
		$this->load->view('User/global/footer',$data);
	}

	public function leave_data($id)
	{
		user_session_redirection();
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Leave History',
      'page_orig'     => 'Leave History - '.get_leave_info($id,'leave_name'),
			'global_icon'	=> global_icon(),
			'id'				=> $id
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/leave2',$data);
		$this->load->view('User/global/footer',$data);
	}

	public function leave_history()
	{
		user_session_redirection();
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Leave History',
      'page_orig'     => 'Leave History',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/leave_history',$data);
		$this->load->view('User/global/footer',$data);
	}

	public function logs()
	{
		user_session_redirection();
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Attendance Logs',
      'page_orig'     => 'Attendance Logs',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/logs',$data);
		$this->load->view('User/global/footer',$data);
	}

	public function payslips()
	{
		user_session_redirection();
		$data = array(
			'title'					=> global_title(),
			'page'					=> 'Payslips',
      'page_orig'     => 'Payslips',
			'global_icon'		=> global_icon(),
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/newpaysliplist',$data);
		$this->load->view('User/global/footer',$data);
	}

	public function payslip(){
		user_session_redirection();
		$get = $this->input->get();
		$data = array(
    		'get' 				=> $get,
    		'value'				=> get_all_employee_datatables_payroll_single(user_session_val())
    );
    	$this->load->library('Pdf');
      $this->load->view('User/payslip',$data);
	}

	public function login()
	{
		reuser_session_redirection();
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Login',
            'page_orig'     => 'Login',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('User/login',$data);
		
	}

	public function aboutus()
	{
		user_session_redirection();
		$data = array(
			'title'				=> global_title(),
			'page'				=> 'About Us',
      'page_orig'   => 'About Us',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('User/global/header',$data);
		$this->load->view('User/aboutus',$data);
		$this->load->view('User/global/footer',$data);
		
	}

	public function authentication()
	{
		reuser_session_redirection();
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Authentication',
            'page_orig'     => 'Authentication',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('User/authentication',$data);
		
	}

	public function auth_config(){
		$post = $this->input->post();
		if($post['validation_key'] == random_char_data()){
			$this->session->set_userdata('employee_session',user_session_val_v2());
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}

	public function login_submit(){
		$post = $this->input->post();
		$data = array(
            'username'      	 => $post['username'],
            'password'   		   => $post['password'],
        );
        $return = $this->Api_class->login_user($data);
        if($return['is_success'] == '1'){
        	$random = (rand(10000,999999));
        	$this->session->set_userdata('employee_session_v2',$return['message']);
        	$this->session->set_userdata('random_char',$random);
        	
			  	$data = array(
			  		'subject'			=> 'Authentication Pin',
			  		'email'				=> get_myuser_info_employee_v2($return['message'],'email'),
			  		'random_char'	=> $random,
			  		'full_name'		=> get_myuser_info_employee_v2($return['message'],'firstname').' '.get_myuser_info_employee_v2($return['message'],'lastname'),
			  	);
			  	$sendmail = sendMail($data);
			  	if($sendmail){
			  		echo json_encode($return);		
			  	}else{
			  		$user_array = array(
							'is_success' => '0',
							'message'	 => 'Email failed to send. Please try again',
						);
						echo json_encode($user_array);
			  	}
        	// $this->session->set_userdata('employee_session',$return['message']);
        }else{
        	echo json_encode($return);
        }
        
	}

	public function check_timein_record_user()
    {
      $post = $this->input->post();
      $val = check_timein_record_user();
      echo json_encode($val);
    }

  public function delete_leave(){
        $post = $this->input->post();
        $val = $this->Api_class->delete_leave($post);
        echo json_encode($val);
    }

  public function change_my_info()
    {
      $post = $this->input->post();
      $val = change_my_info($post);
      echo json_encode($val);
    }

  public function change_my_password()
    {
      $post = $this->input->post();
      $val = change_my_password($post);
      echo json_encode($val);
    }

    

    public function attendance_post()
    {
      $post = $this->input->post();
      $val = $this->Api_class->attendance_post($post);
      echo json_encode($val);
    }

  public function logout()
    {
        $this->session->unset_userdata('employee_session');
        redirect(base_url().'', 'location');

    }

  public function leave_form(){
        $post = $this->input->post();
        $val = $this->Api_class->leave_form($post);
        echo json_encode($val);
    }

  public function upload_image()
    {
      	$user_dir_resume4    = './userside';
      	if(!file_exists($user_dir_resume4)){
        	mkdir( $user_dir_resume4, 0755 );
      	}

      	$user_dir_resume    = './userside/'.user_session_val().'/'.get_myuser_info_employee('photo');
      	if(!file_exists($user_dir_resume)){
          	mkdir( $user_dir_resume, 0755 );
      	}

      	$file_path = 'userside/'.user_session_val().'/';

      	$config['upload_path'] = $file_path;
      	$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';//'png|jpeg|jpg';
      	$config['encrypt_name'] = TRUE;
      
      	$this->upload->initialize($config);

      	if (isset($_FILES['file']['name'])) {


              	if (file_exists($file_path. $_FILES['file']['name'])) {
                  	$result = array(
                      	'status'    => 'existing',
                      	'msg'       => 'File already exists.',
                      	'file_data' => ''
                  	);
              	} else {

                  	if (!$this->upload->do_upload('file')) {
                      	$result = array(
                          	'status'    => 'error',
                          	'msg'       => $this->upload->display_errors(),
                          	'file_data' => ''
                      	);
                  	} else {

                      	$upload_data = $this->upload->data();
                      	$result = array(
                          	'status'    => 'success',
                          	'msg'       => 'File successfully uploaded.',
                          	'file_data' => $upload_data,
                      	);
                      	$this->session->set_userdata('last_uploaded_banner', $upload_data['file_name']);
                        $path_image    = './userside/'.user_session_val().'/'.get_myuser_info_cms('photo');
                        if(file_exists($path_image)){
                        	$unlink = @unlink($path_image);
                        }
                      	$data = array(
                        	'photo' 	=> $upload_data['file_name'],
                      	);
                      	$val = upload_image_employee($data);
                  	}
              	}
      	} else {
          	$result = array(
              	'status'    => 'blank',
              	'msg'       => 'Please choose a file.',
              	'file_data' => ''
          	);
      	}
      	echo json_encode($result);
  }


  public function leave_proof()
    {
      	
    	$user_dir_resume4    = './userside';
      	if(!file_exists($user_dir_resume4)){
        	mkdir( $user_dir_resume4, 0755 );
      	}

      	$user_dir_resume    = './userside/'.user_session_val();
      	if(!file_exists($user_dir_resume)){
          	mkdir( $user_dir_resume, 0755 );
      	}

      	$user_dir_resum2    = './userside/'.user_session_val().'/leave_proof';
      	if(!file_exists($user_dir_resum2)){
          	mkdir( $user_dir_resum2, 0755 );
      	}

      	$file_path = 'userside/'.user_session_val().'/leave_proof/';

      	$config['upload_path'] = $file_path;
      	$config['allowed_types'] = '*';//'png|jpeg|jpg';
      	$config['encrypt_name'] = TRUE;
      
      	$this->upload->initialize($config);

      	if (isset($_FILES['file']['name'])) {


              	if (file_exists($file_path. $_FILES['file']['name'])) {
                  	$result = array(
                      	'status'    => 'existing',
                      	'msg'       => 'File already exists.',
                      	'file_data' => ''
                  	);
              	} else {

                  	if (!$this->upload->do_upload('file')) {
                      	$result = array(
                          	'status'    => 'error',
                          	'msg'       => $this->upload->display_errors(),
                          	'file_data' => ''
                      	);
                  	} else {

                      	$upload_data = $this->upload->data();
                      	$result = array(
                          	'status'    => 'success',
                          	'msg'       => 'File successfully uploaded.',
                          	'file_data' => $upload_data,
                      	);
                      	$this->session->set_userdata('last_uploaded_banner', $upload_data['file_name']);
                        $data = array(
                        	'data' 	=> $upload_data['file_name'],
                      	);
                  	}
              	}
      	} else {
          	$result = array(
              	'status'    => 'blank',
              	'msg'       => 'Please choose a file.',
              	'file_data' => ''
          	);
      	}
      	echo json_encode($result);
  }
}