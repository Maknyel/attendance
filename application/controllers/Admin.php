<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: POST, OPTIONS");
        // header("Access-Control-Allow-Methods: GET, OPTIONS");


	}

	public function index()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Dashboard',
      		'page_orig' 	=> 'Dashboard',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/index',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function about_us(){
		user_session_redirection_cms();
	
		$data = array(
			'title'				=> global_title(),
			'page'				=> 'About Us',
      'page_orig' 	=> 'About Us',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/dynamic_content',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function leave()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'				=> global_title(),
			'page'				=> 'Leave',
      'page_orig' 	=> 'Leave',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/leave',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function pending_leaves()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'				=> global_title(),
			'page'				=> 'Pending Leaves',
      'page_orig' 	=> 'Pending Leaves',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/pending_leaves',$data);
		$this->load->view('Admin/global/footer',$data);
	}


	public function attendance()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Attendance',
      		'page_orig' 	=> 'Attendance',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/attendance',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function position()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Position',
      		'page_orig' 	=> 'Position',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/position',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function employee_type()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Employee Type',
      'page_orig' 	=> 'Employee Type',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/employee_type',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function leave_type()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Leave Type',
      'page_orig' 	=> 'Leave Type',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/leave_type',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function holiday()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Holiday',
      		'page_orig' 	=> 'Holiday',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/holiday',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function payroll()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Payroll',
      		'page_orig' 	=> 'Payroll',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/payroll_date',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function backup()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'backup',
      		'page_orig' 	=> 'Backup',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/backup',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function payroll_per_year()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Payroll Per Year',
      		'page_orig' 	=> 'payroll_per_year',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/payroll_per_year',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function backup_db(){
		$this->load->dbutil();

		$prefs = array(     
			'format'      => 'zip',             
			'filename'    => 'my_db_backup.sql'
			);


		$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'pathtobkfolder/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup); 


		$this->load->helper('download');
		force_download($db_name, $backup);
	}

	public function payroll_employers()
	{
		user_session_redirection_cms();
		$get = $this->input->get();
		if(!isset($get['date_from']) || !isset($get['date_to'])){
			redirect(base_url().'cms/payroll', 'location');	
		}
		
		$data = array(
			'title'				=> global_title(),
			'page'				=> 'Payroll',
      'page_orig' 	=> 'Payroll',
      'get' 				=> $get,
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/payroll_employer',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function payslip(){
		user_session_redirection_cms();
		$get = $this->input->get();
		$data = array(
    		'get' 				=> $get,
    		'value'				=> get_all_employee_datatables_payroll_single($get['employee_id'])
    );
    	$this->load->library('Pdf');
      $this->load->view('Admin/payslip_new',$data);
	}

	public function schedule()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Schedule',
      		'page_orig' 	=> 'Schedule',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/schedule',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function employee()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Employee',
      		'page_orig' 	=> 'Employee',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/employee',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function a_employee()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Archive Employee',
      		'page_orig' 	=> 'Archive Employee',
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/a_employee',$data);
		$this->load->view('Admin/global/footer',$data);
	}

	public function view_employee($id)
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Employee',
      'page_orig' 	=> 'Employee',
      'id' 				=> $id,
			'global_icon'	=> global_icon(),
			'is_table'		=> true,
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/employee_view',$data);
		$this->load->view('Admin/global/footer',$data);
	}





	public function profile()
	{
		user_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Profile',
      		'page_orig' => 'Profile',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('Admin/global/header',$data);
		$this->load->view('Admin/global/nav',$data);
		$this->load->view('Admin/profile',$data);
		$this->load->view('Admin/global/footer',$data);
	}


	public function login()
	{
		reuser_session_redirection_cms();
	
		$data = array(
			'title'			=> global_title(),
			'page'			=> 'Login',
			'global_icon'	=> global_icon(),
		);
		$this->load->view('Admin/login',$data);
	}

	public function logout()
    {
        user_session_redirection_cms();
        $this->session->unset_userdata('alarmadmincms');
        redirect(base_url().'cms/login', 'location');

    }

	public function login_submit(){
		$post = $this->input->post();
		$data = array(
            'username'      	 => $post['username'],
            'password'   		   => $post['password'],
        );
        $return = $this->Admin_class->login_user($data);
        if($return['is_success'] == '1'){
        	$this->session->set_userdata('alarmadmincms',$return['message']);
        }
        echo json_encode($return);
	}


	public function update_profile_admin(){
        $post = $this->input->post();
        $val = $this->Admin_class->update_profile_admin_user($post);
        echo json_encode($val);
    }

  public function update_content(){
        $post = $this->input->post();
        $val = $this->Admin_class->update_content($post);
        if($val == '1'){
        	$user_array = array(
							'is_success' => '1',
							'message'	 => 'Successfully Updated',
						);
        }else{
        	$user_array = array(
							'is_success' => '0',
							'message'	 => 'Theres something wrong. Please try again',
						);

        }
        echo json_encode($user_array);
    }

    

  public function holiday_form(){
        $post = $this->input->post();
        $val = $this->Admin_class->holiday_form($post);
        echo json_encode($val);
    }

  public function employee_type_form(){
        $post = $this->input->post();
        $val = $this->Admin_class->employee_type_form($post);
        echo json_encode($val);
    }

  public function leave_form(){
        $post = $this->input->post();
        $val = $this->Admin_class->leave_form($post);
        echo json_encode($val);
    }


  public function delete_leave(){
        $post = $this->input->post();
        $val = $this->Admin_class->delete_leave($post);
        echo json_encode($val);
    }
    
  public function update_leave(){
        $post = $this->input->post();
        $val = $this->Admin_class->update_leave($post);
        echo json_encode($val);
    }

  public function update_password_admin(){
        $post = $this->input->post();
        $val = $this->Admin_class->update_password_admin_user($post);
        echo json_encode($val);
    }  


    public function uploadmyimageadmin()
    {
      	$user_dir_resume4    = './user_image_semi';
      	if(!file_exists($user_dir_resume4)){
        	mkdir( $user_dir_resume4, 0755 );
      	}

      	$user_dir_resume    = './user_image_semi/'.get_myuser_info_cms('id');
      	if(!file_exists($user_dir_resume)){
          	mkdir( $user_dir_resume, 0755 );
      	}

      	$file_path = 'user_image_semi/'.get_myuser_info_cms('id').'/';

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
                        $path_image    = './user_image_semi/'.get_myuser_info_cms('id').'/'.get_myuser_info_cms('photo');
                        if(file_exists($path_image)){
                        	$unlink = @unlink($path_image);
                        }
                      	$data = array(
                        	'photo' 	=> $upload_data['file_name'],
                      	);
                      	$val = upload_image_admin_cms($data);
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

  public function attendance_form(){
        $post = $this->input->post();
        $val = $this->Admin_class->attendance_form($post);
        echo json_encode($val);
    }

  public function position_form(){
        $post = $this->input->post();
        $val = $this->Admin_class->position_form($post);
        echo json_encode($val);
    }

  public function schedule_form(){
        $post = $this->input->post();
        $val = $this->Admin_class->schedule_form($post);
        echo json_encode($val);
    }
  public function employee_form(){
        $post = $this->input->post();
        $val = $this->Admin_class->employee_form($post);
        echo json_encode($val);
    }


  public function restore_db(){

  }

  public function try_email(){
  	$random = (rand(10000,999999));
  	$data = array(
  		'random_char'	=> $random,
  		'full_name'		=> 'Firstname Lastname',
  	);
  	$this->load->view('email_template',$data);
  }

    
    

    

}