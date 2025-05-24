<?php
if (!function_exists('global_title')) {
	function global_title(){
		return 'Callmax Solutions';
	}
}

if (!function_exists('getWorkingDays')) {
	function getWorkingDays($startDate,$endDate,$holidays){
		// do strtotime calculations just once
	    $endDate = strtotime($endDate);
	    $startDate = strtotime($startDate);


	    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
	    //We add one to inlude both dates in the interval.
	    $days = ($endDate - $startDate) / 86400 + 1;

	    $no_full_weeks = floor($days / 7);
	    $no_remaining_days = fmod($days, 7);

	    //It will return 1 if it's Monday,.. ,7 for Sunday
	    $the_first_day_of_week = date("N", $startDate);
	    $the_last_day_of_week = date("N", $endDate);

	    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
	    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
	    if ($the_first_day_of_week <= $the_last_day_of_week) {
	        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
	        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
	    }
	    else {
	        // (edit by Tokes to fix an edge case where the start day was a Sunday
	        // and the end day was NOT a Saturday)

	        // the day of the week for start is later than the day of the week for end
	        if ($the_first_day_of_week == 7) {
	            // if the start date is a Sunday, then we definitely subtract 1 day
	            $no_remaining_days--;

	            if ($the_last_day_of_week == 6) {
	                // if the end date is a Saturday, then we subtract another day
	                $no_remaining_days--;
	            }
	        }
	        else {
	            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
	            // so we skip an entire weekend and subtract 2 days
	            $no_remaining_days -= 2;
	        }
	    }

	    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
	//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
	   $workingDays = $no_full_weeks * 5;
	    if ($no_remaining_days > 0 )
	    {
	      $workingDays += $no_remaining_days;
	    }

	    //We subtract the holidays
	    foreach($holidays as $holiday){
	        $time_stamp=strtotime($holiday);
	        //If the holiday doesn't fall in weekend
	        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
	            $workingDays--;
	    }

	    return $workingDays;
	}
}



if (!function_exists('global_icon')) {
	function global_icon(){
		return base_url().'assets/admin_template/dist/img/Callmax.png';
	}
}

if (!function_exists('user_session_redirection')) {
	function user_session_redirection(){
		$CI =& get_instance();
		if(!$CI->session->userdata('employee_session')){
			redirect(base_url().'login', 'location');
		}
	}
}


if (!function_exists('reuser_session_redirection')) {
	function reuser_session_redirection(){
		$CI =& get_instance();
		if($CI->session->userdata('employee_session')){
			redirect(base_url().'', 'location');
		}
	}
}

if (!function_exists('user_session_redirection_cms')) {
	function user_session_redirection_cms(){
		$CI =& get_instance();
		if(!$CI->session->userdata('alarmadmincms')){
			redirect(base_url().'cms/login', 'location');
		}
	}
}


if (!function_exists('reuser_session_redirection_cms')) {
	function reuser_session_redirection_cms(){
		$CI =& get_instance();
		if($CI->session->userdata('alarmadmincms')){
			redirect(base_url().'cms', 'location');
		}
	}
}

if (!function_exists('user_session_valcms')) {
	function user_session_valcms(){
		$CI =& get_instance();
		return $CI->session->userdata('alarmadmincms');
	}
}

if(!function_exists('get_all_report')){
	function get_all_report(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('report');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_holiday_datatables')){
	function get_all_holiday_datatables(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('regular_holiday');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('pushallholiday')){
	function pushallholiday(){
		$CI =& get_instance();
		$CI->db->select('holiday_date');
		$CI->db->from('regular_holiday');
		$result = $CI->db->get()->result_array();
		$arrayreturn = array();
		foreach ($result as $key => $value) {
			array_push($arrayreturn, $value['holiday_date']);
		}
		return $arrayreturn;
	}
}


if(!function_exists('minus_late_minhour')){
	function minus_late_minhour($time_in,$time_out){
		$start_date = new DateTime($time_in);
		$since_start = $start_date->diff(new DateTime($time_out));
		$data = "";
		$data .= $since_start->h.' hour'.(($since_start->h > 1)?'s':'').', ';
		$data .= $since_start->i.' minute'.(($since_start->i > 1)?'s':'').'';
		// $data .= $since_start->s.' seconds ';
		return $data;
	}
}

if(!function_exists('converttimeintimeout')){
	function converttimeintimeout($emp_in,$emp_out,$is_overtime=null){
		// $result_in_out = strtotime($emp_in) - strtotime($emp_out);
		// $result_hours = abs(floor($result_in_out/3600));
		// return $result_hours;
		$datetime1 = new DateTime($emp_in);
		$datetime2 = new DateTime($emp_out);
		$interval = $datetime1->diff($datetime2);
		// return $interval->format('%h %im');
		$data = $interval->format('%h');
		$data2 = $interval->format('%i')/60;
		$data3 = $data + $data2;
		if($is_overtime == 'is_overtime'){
			if($data3 >= 9){
				return (int)$data3-8;
			}else{
				return 0;
			}
			
			
		}else{
			if($data3 > 8){
				return 8;
			}else{
				return $data3;
			}
		}
		
		// return $data3;
	}
}

if(!function_exists('converttimeintimeoutv2')){
	function converttimeintimeoutv2($emp_in,$emp_out){
		// $result_in_out = strtotime($emp_in) - strtotime($emp_out);
		// $result_hours = abs(floor($result_in_out/3600));
		// return $result_hours;
		$datetime1 = new DateTime($emp_in);
		$datetime2 = new DateTime($emp_out);
		$interval = $datetime1->diff($datetime2);
		// return $interval->format('%h %im');
		$data = $interval->format('%h');
		$data2 = $interval->format('%i')/60;
		$data3 = $data + $data2;
		return $data3;
				// return $data3;
	}
}

if(!function_exists('converttimeintimeout_day')){
	function converttimeintimeout_day($day){
		return $day/8;
	}
}

if(!function_exists('sendMail')){
	function sendMail($data){

		$CI =& get_instance();
		// insert_email_database($data);
		$message = $CI->load->view('email_template',$data,true);

		$config = array(
			'protocol' 		=> 'smtp',
			'smtp_host' 	=> 'smtp.hostinger.ph',
			'smtp_port' 	=> 587,
			'smtp_user' 	=> 'callmaxsolutions@cvsu-b-website.online',
			'smtp_pass' 	=> 'P@s$w0rd123!',
			'mailtype'  	=> 'html',
			'wordwrap'  	=> TRUE,
			'charset'   	=> 'utf-8',
		);

		$CI->email->set_newline("\r\n");
		$CI->email->initialize($config);
		$CI->email->from('callmaxsolutions@cvsu-b-website.online', global_title());
		$CI->email->to( $data['email'] );

		$CI->email->subject($data['subject']);
		$CI->email->message( $message );
		return $CI->email->send();
		
	}
}

if(!function_exists('get_all_sensor_avail')){
	function get_all_sensor_avail(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('sensor');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}


if (!function_exists('user_session_val')) {
	function user_session_val(){
		$CI =& get_instance();
		return $CI->session->userdata('employee_session');
	}
}

if (!function_exists('user_session_val_v2')) {
	function user_session_val_v2(){
		$CI =& get_instance();
		return $CI->session->userdata('employee_session_v2');
	}
}

if (!function_exists('random_char_data')) {
	function random_char_data(){
		$CI =& get_instance();
		return $CI->session->userdata('random_char');
	}
}

if(!function_exists('get_myuser_info_cms')){
	function get_myuser_info_cms($field){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('admin');
		$CI->db->where('id', user_session_valcms());
		$result = $CI->db->get()->result_array();
		$result = current($result);
		return ($result[$field]);
	}
}

if(!function_exists('get_is_parttimer')){
	function get_is_parttimer($id,$field,$is_need_string=null){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('employee_type');
		$CI->db->where('id', $id);
		$result = $CI->db->get()->result_array();
		$result = current($result);
		if($result){
			if($is_need_string){
				return $result[$field];
			}
			if($result[$field] == "Part Time"){
				return 1;
			}else{
				return 2;
			}
			// return ($result[$field]);	
		}else{
			return 0;
		}
		
	}
}

if(!function_exists('get_settings_field')){
	function get_settings_field($id,$field){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('settings');
		$CI->db->where('id', $id);
		$result = $CI->db->get()->result_array();
		$result = current($result);
		return ($result[$field]);
	}
}

if(!function_exists('get_leave_info')){
	function get_leave_info($leave_id,$field){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('leaves');
		$CI->db->where('leave_id', $leave_id);
		$result = $CI->db->get()->result_array();
		$result = current($result);
		return ($result[$field]);
	}
}

if(!function_exists('get_myuser_info_employee')){
	function get_myuser_info_employee($field){
		$CI =& get_instance();
		// $CI->db->select('*');
		$CI->db->select('employees.*, schedules.time_in, schedules.time_out, position.description');
		$CI->db->from('employees');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->join('position', 'employees.position_id = position.id', 'left');
		$CI->db->where('employees.id', user_session_val());
		$result = $CI->db->get()->result_array();
		$result = current($result);
		return ($result[$field]);
	}
}

if(!function_exists('get_myuser_info_employee_v2')){
	function get_myuser_info_employee_v2($id,$field){
		$CI =& get_instance();
		// $CI->db->select('*');
		$CI->db->select('employees.*, schedules.time_in, schedules.time_out, position.description');
		$CI->db->from('employees');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->join('position', 'employees.position_id = position.id', 'left');
		$CI->db->where('employees.id', $id);
		$result = $CI->db->get()->result_array();
		$result = current($result);
		return ($result[$field]);
	}
}

if(!function_exists('get_myuser_info_employee_by_id')){
	function get_myuser_info_employee_by_id($id,$field){
		$CI =& get_instance();
		// $CI->db->select('*');
		$CI->db->select('employees.*, schedules.time_in, schedules.time_out, position.description');
		$CI->db->from('employees');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->join('position', 'employees.position_id = position.id', 'left');
		$CI->db->where('employees.id', $id);
		$result = $CI->db->get()->result_array();
		$result = current($result);
		return ($result[$field]);
	}
}

if(!function_exists('upload_image_employee')) {
	function upload_image_employee($data) {
		$CI =& get_instance();
		$CI->db->where('id', user_session_val());
		$query = $CI->db->update('employees', $data);
		if($query){
			return 1;
		}else{
			return 0;
		}
	}
}

if(!function_exists('change_my_info')) {
	function change_my_info($data) {
		$CI =& get_instance();
		$CI->db->where('id', user_session_val());
		$query = $CI->db->update('employees', $data);
		if($query){
			return 1;
		}else{
			return 0;
		}
	}
}

if(!function_exists('change_my_password')) {
	function change_my_password($data) {
		$CI =& get_instance();
		$CI->db->where('id', user_session_val());
		$query = $CI->db->update('employees', array('password'=>$data['password']));
		if($query){
			return 1;
		}else{
			return 0;
		}
	}
}

if(!function_exists('upload_image_admin_cms')) {
	function upload_image_admin_cms($data) {
		$CI =& get_instance();
		$CI->db->where('id', user_session_valcms());
		$query = $CI->db->update('admin', $data);
		if($query){
			return 1;
		}else{
			return 0;
		}
	}
}

if(!function_exists('upload_image')) {
	function upload_image($data) {
		$CI =& get_instance();
		$CI->db->where('user_id', $data['user_id']);
		$query = $CI->db->update('users', $data);
		if($query){
			return 1;
		}else{
			return 0;
		}
	}
}

if(!function_exists('current_ph_date_time')){
	function current_ph_date_time(){
		date_default_timezone_set("Asia/Manila");
				return date("Y-m-d H:i:s a");
	}
}

if(!function_exists('current_ph_date_year')){
	function current_ph_date_year(){
		date_default_timezone_set("Asia/Manila");
				return date("Y");
	}
}

if(!function_exists('current_ph_date_day')){
	function current_ph_date_day(){
		date_default_timezone_set("Asia/Manila");
				return date("d");
	}
}

if(!function_exists('current_ph_date')){
	function current_ph_date(){
		date_default_timezone_set("Asia/Manila");
				return date("Y-m-d");
	}
}

if(!function_exists('current_ph_time')){
	function current_ph_time(){
		date_default_timezone_set("Asia/Manila");
				return date("H:i:s a");
	}
}

if(!function_exists('check_timein_record')){
	function check_timein_record($user_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('attendance');
		$CI->db->where('employee_id', $user_id);
		$CI->db->where('date', current_ph_date());
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('admin_exists')){
	function admin_exists($username){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('admin');
		$CI->db->where('username', $username);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('num_user_rows')){
	function num_user_rows($username){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('users');
		$CI->db->where('username', $username);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}


if(!function_exists('num_user_rows_id')){
	function num_user_rows_id($username,$user_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('users');
		$CI->db->where('username', $username);
		$CI->db->where('user_id<>', $user_id);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('users_number_id_exist')){
	function users_number_id_exist($user_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('users');
		$CI->db->where('user_id', $user_id);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}





if(!function_exists('dashboard_count')){
	function dashboard_count($data){
		$CI =& get_instance();
		switch ($data) {
			case 'employees':
				$CI->db->select('*');
				$CI->db->from('employees');
				$result = $CI->db->get();
				return $result->num_rows();
			break;

			case 'on_time_percentage':
				$CI->db->select('*');
				$CI->db->from('attendance');
				$result = $CI->db->get();
				$total = $result->num_rows();

				$CI->db->select('*');
				$CI->db->from('attendance');
				$CI->db->where('status',1);
				$result = $CI->db->get();
				$early = $result->num_rows();
                  
                 $percentage = ($early/$total)*100;
				return number_format($percentage, 2);
			break;

			case 'on_time_today':
				$CI->db->select('*');
				$CI->db->from('attendance');
				$CI->db->where('date',current_ph_date());
				$CI->db->where('status',1);
				$result = $CI->db->get();
				return $result->num_rows();
			break;

			case 'late_today':
				$CI->db->select('*');
				$CI->db->from('attendance');
				$CI->db->where('date',current_ph_date());
				$CI->db->where('status',0);
				$result = $CI->db->get();
				return $result->num_rows();
			break;
			
			default:
				// code...
				break;
		}
		
		
	}
}

if(!function_exists('leave_value')){
	function leave_value($data){
		$CI =& get_instance();
		$arraydata = array(
			'annual' => 'Annual Leave',
			'sick' => 'Sick Leave',
			'no_pay' => 'No Pay Leave',
		);
		return $arraydata[$data];
	}
}

if(!function_exists('minus_leave')){
	function minus_leave($data){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('leave_credits');
		$CI->db->where('YEAR(date_leave)',date('Y'));
		$CI->db->where('leave_type',$data);
		$CI->db->where('hr_approved','1');
		$CI->db->where('employee_id',user_session_val());
		// $result = $CI->db->get();
		// $leave = $result->num_rows();
		$result = $CI->db->get()->result_array();
		$leave = 0;
		foreach ($result as $key => $value) {
			if($value['is_half_day'] == '1'){
				$leave = $leave + 0.5;
			}else{
				$leave = $leave + 1;
			}
		}
		return date('m') - $leave;
	}
}

if(!function_exists('leave_count')){
	function leave_count($data){
		$CI =& get_instance();
		switch ($data) {
			case 'annual':
				$CI->db->select('*');
				$CI->db->from('leave_credits');
				$CI->db->where('YEAR(date_leave)',date('Y'));
				$CI->db->where('leave_type','annual');
				$CI->db->where('hr_approved','1');
				$CI->db->where('employee_id',user_session_val());
				$result = $CI->db->get();
				$leave = $result->num_rows();
				return date('m') - $leave;
			break;

			case 'sick':
				$CI->db->select('*');
				$CI->db->from('leave_credits');
				$CI->db->where('YEAR(date_leave)',date('Y'));
				$CI->db->where('leave_type','sick');
				$CI->db->where('hr_approved','1');
				$CI->db->where('employee_id',user_session_val());
				$result = $CI->db->get();
				$leave = $result->num_rows();
				return date('m') - $leave;
			break;

			case 'no_pay':
				$CI->db->select('*');
				$CI->db->from('leave_credits');
				$CI->db->where('YEAR(date_leave)',date('Y'));
				$CI->db->where('leave_type','no_pay');
				$CI->db->where('hr_approved','1');
				$CI->db->where('employee_id',user_session_val());
				$result = $CI->db->get();
				$leave = $result->num_rows();
				return date('m') - $leave;
			break;

			
			
			default:
				// code...
				break;
		}
		
		
	}
}

if(!function_exists('get_all_leaves')){
	function get_all_leaves($id=null){
		$CI =& get_instance();
		$CI->db->select('leave_credits.*,leaves.leave_name,leaves.leave_id');
		$CI->db->from('leave_credits');
		$CI->db->where('leave_credits.employee_id',user_session_val());
		if($id){
			$CI->db->where('leaves.leave_id',$id);
		}
		$CI->db->join('leaves', 'leave_credits.leave_type = leaves.leave_id', 'left');
		$CI->db->order_by('leave_credits.leave_id','desc');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_leaves_datatables')){
	function get_all_leaves_datatables(){
		$CI =& get_instance();
		$CI->db->select('leaves.leave_name,leave_credits.*,employees.firstname,employees.lastname,employees.is_deleted');
		$CI->db->from('leave_credits');
		$CI->db->join('leaves', 'leave_credits.leave_type = leaves.leave_id', 'left');
		$CI->db->join('employees', 'leave_credits.employee_id = employees.id', 'left');
		$CI->db->where('employees.is_deleted', '0');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_leaves_datatables_pending')){
	function get_all_leaves_datatables_pending(){
		$CI =& get_instance();
		$CI->db->select('leave_credits.*,employees.firstname,employees.lastname,employees.is_deleted,leaves.leave_name');
		$CI->db->from('leave_credits');
		$CI->db->join('leaves', 'leave_credits.leave_type = leaves.leave_id', 'left');
		$CI->db->join('employees', 'leave_credits.employee_id = employees.id', 'left');
		$CI->db->where('leave_credits.hr_approved',0);
		$CI->db->where('employees.is_deleted', '0');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}


if(!function_exists('dashboard_data_count')){
	function dashboard_data_count($year,$month,$status){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('attendance');
		$CI->db->where('MONTH(date)',$month);
		$CI->db->where('YEAR(date)',$year);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('pending_leaves_count')){
	function pending_leaves_count(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('leave_credits');
		$CI->db->where('YEAR(date_leave)',date('Y'));
		$CI->db->where('hr_approved',0);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('get_all_attendance_datatables')){
	function get_all_attendance_datatables(){
		$CI =& get_instance();
		$CI->db->select('attendance.*, employees.*, employees.employee_id AS empid, employees.schedule_id, schedules.time_in as time_inn, attendance.id AS attid');
		$CI->db->from('attendance');
		$CI->db->join('employees', 'attendance.employee_id = employees.id', 'left');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->where('employees.is_deleted', '0');
		$CI->db->order_by('attendance.date','desc');
		$CI->db->order_by('attendance.time_in','desc');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_myyear_all_attendance_datatables')){
	function get_myyear_all_attendance_datatables(){
		$CI =& get_instance();
		$CI->db->select('attendance.*');
		$CI->db->from('attendance');
		$CI->db->where('employee_id',user_session_val());
		$CI->db->order_by('date','desc');
		$CI->db->order_by('time_in','desc');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_employee_datatables_a')){
	function get_all_employee_datatables_a(){
		$CI =& get_instance();
		$CI->db->select('employees.*, schedules.time_in, schedules.time_out, position.description, employee_type.type');
		$CI->db->from('employees');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->join('employee_type', 'employees.id = employee_type.id', 'left');
		$CI->db->join('position', 'employees.position_id = position.id', 'left');
		$CI->db->where('employees.is_deleted', '1');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_employee_datatables')){
	function get_all_employee_datatables(){
		$CI =& get_instance();
		$CI->db->select('employees.*, schedules.time_in, schedules.time_out, position.description, employee_type.type');
		$CI->db->from('employees');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->join('position', 'employees.position_id = position.id', 'left');
		$CI->db->join('employee_type', 'employees.employee_type = employee_type.id', 'left');
		$CI->db->where('employees.is_deleted', '0');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_employee_datatables_payroll')){
	function get_all_employee_datatables_payroll(){
		$CI =& get_instance();
		$CI->db->select('employees.*, schedules.time_in, schedules.time_out, position.description, position.rate');
		$CI->db->from('employees');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->join('position', 'employees.position_id = position.id', 'left');
		$CI->db->where('employees.is_deleted', '0');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_employee_datatables_payroll_single')){
	function get_all_employee_datatables_payroll_single($id){
		$CI =& get_instance();
		$CI->db->select('employees.*, schedules.time_in, schedules.time_out, position.description, position.rate');
		$CI->db->from('employees');
		$CI->db->join('schedules', 'employees.schedule_id = schedules.id', 'left');
		$CI->db->join('position', 'employees.position_id = position.id', 'left');
		$CI->db->where('employees.id',$id);
		$result = $CI->db->get()->result_array();
		return current($result);
	}
}

if(!function_exists('get_all_month_attendance_by_employer')){
	function get_all_month_attendance_by_employer($date_from,$date_to,$employee_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('attendance');
		$CI->db->where('employee_id',$employee_id);
		$CI->db->where('date>=',$date_from);
		$CI->db->where('date<=',$date_to);
		$result = $CI->db->get()->result_array();
		$data = 0;
		foreach ($result as $key => $value) {
			$data = $data + converttimeintimeout_day(converttimeintimeoutv2($value['time_in'],$value['time_out']));
		}
		return $data;
		// return json_encode($result);
	}
}

if(!function_exists('get_all_month_attendance_by_employer_overtime')){
	function get_all_month_attendance_by_employer_overtime($date_from,$date_to,$employee_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('attendance');
		$CI->db->where('employee_id',$employee_id);
		$CI->db->where('date>=',$date_from);
		$CI->db->where('date<=',$date_to);
		$result = $CI->db->get()->result_array();
		$data = 0;
		foreach ($result as $key => $value) {
			$data = $data + converttimeintimeout_day(converttimeintimeout($value['time_in'],$value['time_out'],'is_overtime'));
		}
		return $data;
		// return json_encode($result);
	}
}

function count_available_holidays($date_from,$date_to){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('regular_holiday');
	$CI->db->where('holiday_date>=',$date_from);
	$CI->db->where('holiday_date<=',$date_to);
	$result = $CI->db->get();
	return $result->num_rows();
}

if(!function_exists('total_salary')){
	function total_salary($rate,$days_rendered,$total_days,$leave,$holidays=null){
		$day_15 = $rate/2;
		$holidays_data = 0;
		if($holidays){
			$holidays_data = $holidays;
		}
		$renderedequi = ($days_rendered + $leave + $holidays_data)/$total_days;
		return $day_15 * $renderedequi;
	}
}

if(!function_exists('ssscomputation')){
	function ssscomputation($value){
		if($value < 135){
			return 0;
		}else if($value < 3250 && $value > 135){
			return 135;
		}else if($value >= 3250 && $value < 3750){
			return 157.50;
		}else if($value >= 3750 && $value < 4250){
			return 180;
		}else if($value >= 4250 && $value < 4750){
			return 202.5;
		}else if($value >= 4750 && $value < 5250){
			return 225;
		}else if($value >= 5250 && $value < 5750){
			return 247.5;
		}else if($value >= 5750 && $value < 6250){
			return 270;
		}else if($value >= 6250 && $value < 6750){
			return 292.5;
		}else if($value >= 6750 && $value < 7250){
			return 315;
		}else if($value >= 7250 && $value < 7750){
			return 337.5;
		}else if($value >= 7750 && $value < 8250){
			return 360;
		}else if($value >= 8250 && $value < 8750){
			return 382.5;
		}else if($value >= 8750 && $value < 9250){
			return 405;
		}else if($value >= 9250 && $value < 9750){
			return 427.5;
		}else if($value >= 9750 && $value < 10250){
			return 450;
		}else if($value >= 10250 && $value < 10750){
			return 472.5;
		}else if($value >= 10750 && $value < 11250){
			return 495;
		}else if($value >= 11250 && $value < 11750){
			return 517.5;
		}else if($value >= 11750 && $value < 12250){
			return 540;
		}else if($value >= 12250 && $value < 12750){
			return 562.5;
		}else if($value >= 12750 && $value < 13250){
			return 585;
		}else if($value >= 13250 && $value < 13750){
			return 607.5;
		}else if($value >= 13750 && $value < 14250){
			return 630;
		}else if($value >= 14250 && $value < 14750){
			return 652.5;
		}else if($value >= 14750 && $value < 15250){
			return 675;
		}else if($value >= 15250 && $value < 15750){
			return 697.5;
		}else if($value >= 15750 && $value < 16250){
			return 720;
		}else if($value >= 16250 && $value < 16750){
			return 742.5;
		}else if($value >= 16750 && $value < 17250){
			return 765;
		}else if($value >= 17250 && $value < 17750){
			return 787.5;
		}else if($value >= 17750 && $value < 18250){
			return 810;
		}else if($value >= 18250 && $value < 18750){
			return 832.5;
		}else if($value >= 18750 && $value < 19250){
			return 855;
		}else if($value >= 19250 && $value < 19750){
			return 877.5;
		}else if($value >= 19750 && $value < 20250){
			return 900;
		}else if($value >= 20250 && $value < 20750){
			return 922.5;
		}else if($value >= 20750 && $value < 21250){
			return 945;
		}else if($value >= 21250 && $value < 21750){
			return 967.5;
		}else if($value >= 21750 && $value < 22250){
			return 990;
		}else if($value >= 22250 && $value < 22750){
			return 1012.5;
		}else if($value >= 22750 && $value < 23250){
			return 1035;
		}else if($value >= 23250 && $value < 23750){
			return 1057.5;
		}else if($value >= 23750 && $value < 24250){
			return 1080;
		}else if($value >= 24250 && $value < 24750){
			return 1102.5;
		}else if($value >= 24750){
			return 1125;
		}else{
			return 0;
		}
	}
}

if(!function_exists('get_value_deduction')){
	function get_value_deduction($type,$value,$total_rate,$emp_status=null){
		$valueadd = $value * 2;
		switch ($type) {
			case 'sss':
				if($valueadd == 0){
					return 0;
				}
				if($emp_status){
					if($emp_status == '1'){
						return 0;
					}
				}
				return (ssscomputation($value));
				break;
			case 'pagibig':
				if($valueadd == 0){
					return 0;
				}

				if($emp_status){
					if($emp_status == '1'){
						return 0;
					}
				}
				
				return (100/2);
				
				break;
			case 'philhealth':
				if($valueadd == 0){
					return 0;
				}

				if($emp_status){
					if($emp_status == '1'){
						return 0;
					}
				}
				
				return ($value*0.035)/2;
				
				break;
			case 'tax':
				if($valueadd == 0){
					return 0;
				}
				
				$totalannual_rate = ($value * 2) * 12;


				if($totalannual_rate >= 250000 && $totalannual_rate < 400000){
					$excess_toval = $totalannual_rate - 250000;
					$computetax = $excess_toval * 0.20;
					return ($computetax/12)/2;
				}else if($totalannual_rate >= 400000 && $totalannual_rate < 800000){
					$excess_toval = $totalannual_rate - 400000;
					$computetax = 30000 + ($excess_toval * 0.25);
					return ($computetax/12)/2;
				}else if($totalannual_rate >= 800000 && $totalannual_rate < 2000000){
					$excess_toval = $totalannual_rate - 800000;
					$computetax = 130000 + ($excess_toval * 0.30);
					return ($computetax/12)/2;
				}else if($totalannual_rate >= 2000000 && $totalannual_rate < 8000000){
					$excess_toval = $totalannual_rate - 2000000;
					$computetax = 490000 + ($excess_toval * 0.32);
					return ($computetax/12)/2;
				}else if($totalannual_rate >= 8000000){
					$excess_toval = $totalannual_rate - 8000000;
					$computetax = 2410000 + ($excess_toval * 0.35);
					return ($computetax/12)/2;
				}else{
					return 0;
				}
				
			break;
			
			default:
				// code...
				break;
		}
	}
}

if(!function_exists('countleave_perid')){
	function countleave_perid($date_from,$date_to,$employee_id){
		$CI =& get_instance();
		$CI->db->select('leave_credits.*,leaves.leave_type');
		$CI->db->from('leave_credits');
		$CI->db->join('leaves', 'leave_credits.leave_type = leaves.leave_id', 'left');
		$CI->db->where('leaves.leave_type','paid');
		$CI->db->where('leave_credits.employee_id',$employee_id);
		$CI->db->where('leave_credits.date_leave>=',$date_from);
		$CI->db->where('leave_credits.date_leave<=',$date_to);
		$CI->db->where('leave_credits.hr_approved','1');

		// $CI->db->where('(leave_type = "annual" OR leave_type = "sick")');
		$arrayres =  $CI->db->get()->result_array();
		$datareturn = 0;
		foreach ($arrayres as $key => $value) {
			if($value['is_half_day'] == '1'){
				$datareturn = $datareturn + 0.5;
			}else{
				$datareturn = $datareturn + 1;
			}
		}
		return $datareturn;
	}
}

if(!function_exists('get_all_position_datatables')){
	function get_all_position_datatables(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('position');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_employee_type')){
	function get_all_employee_type(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('employee_type');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_leave_type')){
	function get_all_leave_type(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('leaves');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_leave_type_bytype')){
	function get_all_leave_type_bytype($leave_type){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('leaves');
		$CI->db->where('leave_type',$leave_type);
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('monthdata')){
	function monthdata($data){
		$months = array(
		    'January',
		    'February',
		    'March',
		    'April',
		    'May',
		    'June',
		    'July ',
		    'August',
		    'September',
		    'October',
		    'November',
		    'December',
		);
		return $months[$data];
	}
}

if(!function_exists('lastday_ofthemonth')){
	function lastday_ofthemonth($data){
		return date("Y-m-t", strtotime($data));
	}
}



if(!function_exists('get_all_schedule_datatables')){
	function get_all_schedule_datatables(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('schedules');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('get_all_employees_datatables')){
	function get_all_employees_datatables(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('employees');
		$result = $CI->db->get()->result_array();
		return ($result);
	}
}

if(!function_exists('check_timein_record_user')){
	function check_timein_record_user(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('attendance');
		$CI->db->where('employee_id', user_session_val());
		$CI->db->where('date', current_ph_date());
		$result = $CI->db->get();
		$data = current($result->result_array());
		if($data){
			return array(
				'is_success'			=> '1',
				'message'				=> $data
			);
		}else{
			return array(
				'is_success'			=> '0',
				'message'				=> []
			);
		}
	}
}
?>