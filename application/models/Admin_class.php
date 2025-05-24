<?php

class Admin_class extends CI_Model
{

	public function login_user($data){
		$encodedpass = base64_encode($data['password']);
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array('username'=>$data['username'],'password'=>$encodedpass));
		$query = $this->db->get()->result_array();
		$query = current($query);
		if($query){
				$user_array = array(
					'is_success' => '1',
					'message'	 => $query['id'],
				);	
			
		}else{
			$user_array = array(
				'is_success' => '0',
				'message'	 => 'Incorrect username or password. Please try again',
			);
		}
		return $user_array;
	}

	public function add_admin($post){

		$arrayName = array(
			'firstname'              					=> $post['firstname'],
            'lastname'              					=> $post['lastname'],
            'middlename'              					=> $post['middlename'],
            'username'              					=> $post['username'],
            'password'              					=> base64_encode($post['password']),
            'created_on'              					=> current_ph_date(),
		);
		if(admin_exists($post['username']) > 0){
			return "username exists";
		}else{
			$query = $this->db->insert('admin', $arrayName);
			if($query){	
				return "added";
			}else{
				return "query error";
			}	
		}
		
	}

	public function update_profile_admin_user($post){
	      $this->db->where('id', user_session_valcms());
	      $query = $this->db->update('admin', $post);

	      if($query){
	        return 1;// Success Message
	      } else {
	        return $query;// Failed Message
	      }
	    
	}

	public function update_content($post){
	      $this->db->where('id', 1);
	      $query = $this->db->update('settings', $post);

	      if($query){
	        return 1;// Success Message
	      } else {
	        return $query;// Failed Message
	      }
	    
	}

	public function update_leave($post){
	      $this->db->where('leave_id', $post['leave_id']);
	      $query = $this->db->update('leave_credits', array('hr_approved'=>$post['hr_approved'],'decline_reason'=>$post['reason']));

	      if($query){
	        return 1;// Success Message
	      } else {
	        return $query;// Failed Message
	      }
	    
	}

	public function update_password_admin($post){
	      $this->db->where('cms_user_id', user_session_valcms());
	      $query = $this->db->update('cms_user', $post);

	      if($query){
	        return 1;// Success Message
	      } else {
	        return $query;// Failed Message
	      }
	    
	}

	public function update_profile_admin($post){
	      $this->db->where('cms_user_id', user_session_valcms());
	      $query = $this->db->update('cms_user', $post);

	      if($query){
	        return 1;// Success Message
	      } else {
	        return $query;// Failed Message
	      }
	    
	}

	public function update_password_admin_user($post){
	      $this->db->where('id', user_session_valcms());
	      $query = $this->db->update('admin', array('password'=>base64_encode($post['password'])));

	      if($query){
	        return 1;// Success Message
	      } else {
	        return $query;// Failed Message
	      }
	    
	}


	// attendance_form
	public function attendance_form($post){
		switch ($post['crud_type']) {
			case 'add':
				$arrayName = array(
					'employee_id'                  					=> $post['employee_id'],
	                'date'              							=> $post['date'],
	                'time_in'                 						=> $post['time_in'],
	                'time_out'                  					=> $post['time_out'],
	                
	                'num_hr' 								=> user_session_valcms(),
				);
				$query = $this->db->insert('attendance', $arrayName);
				if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'edit':
				$arrayName = array(
					'employee_id'                  					=> $post['employee_id'],
	                'date'              							=> $post['date'],
	                'time_in'                 						=> $post['time_in'],
	                'time_out'                  					=> $post['time_out'],
	                
					'num_hr' 							=> user_session_valcms(),
				);
				$this->db->where('id', $post['id']);
	      		$query = $this->db->update('attendance', $arrayName);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}

			break;
			case 'delete':
				$data2 = array(
				'id'				=> $post['id'],
				);
				$this->db->where($data2);
				$query = $this->db->delete('attendance');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;
			case 'get_by_id':
				$this->db->select('*');
				$this->db->from('attendance');
				$this->db->where('id',$post['id']);
				$query = $this->db->get()->result_array();
				
				return current($query);
			break;
			
			default:
				return 0;
			break;
		}
	}

	// holiday_form
	public function holiday_form($post){
		switch ($post['crud_type']) {
			case 'add':
				$arrayName = array(
					'name'                  							=> $post['name'],
					'holiday_date'                  					=> $post['holiday_date'],
	                
				);
				$query = $this->db->insert('regular_holiday', $arrayName);
				if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'edit':
				$arrayName = array(
					'name'                  							=> $post['name'],
					'holiday_date'                  					=> $post['holiday_date'],
	                
				);
				$this->db->where('regular_holiday', $post['regular_holiday']);
	      		$query = $this->db->update('regular_holiday', $arrayName);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}

			break;
			case 'delete':
				$data2 = array(
				'regular_holiday'				=> $post['regular_holiday'],
				);
				$this->db->where($data2);
				$query = $this->db->delete('regular_holiday');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;
			case 'get_by_id':
				$this->db->select('*');
				$this->db->from('regular_holiday');
				$this->db->where('regular_holiday',$post['regular_holiday']);
				$query = $this->db->get()->result_array();
				
				return current($query);
			break;
			
			default:
				return 0;
			break;
		}
	}

	public function employee_type_form($post){
		switch ($post['crud_type']) {
			case 'add':
				$arraytype = array(
					'type'                  							=> $post['type'],
					
	                
				);
				$query = $this->db->insert('employee_type', $arraytype);
				if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'edit':
				$arraytype = array(
					'type'                  							=> $post['type'],
					
	                
				);
				$this->db->where('id', $post['id']);
	      		$query = $this->db->update('employee_type', $arraytype);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}

			break;
			case 'delete':
				$data2 = array(
				'id'				=> $post['id'],
				);
				$this->db->where($data2);
				$query = $this->db->delete('employee_type');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;
			case 'get_by_id':
				$this->db->select('*');
				$this->db->from('employee_type');
				$this->db->where('id',$post['id']);
				$query = $this->db->get()->result_array();
				
				return current($query);
			break;
			
			default:
				return 0;
			break;
		}
	}

	public function leave_form($post){
		switch ($post['crud_type']) {
			case 'add':
				$arraytype = array(
					'leave_type'                  							=> $post['leave_type'],
					'leave_name'                  							=> $post['leave_name'],
					
	                
				);
				$query = $this->db->insert('leaves', $arraytype);
				if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'edit':
				$arraytype = array(
					'leave_type'                  							=> $post['leave_type'],
					'leave_name'                  							=> $post['leave_name'],
					
	                
				);
				$this->db->where('leave_id', $post['leave_id']);
	      		$query = $this->db->update('leaves', $arraytype);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}

			break;
			case 'delete':
				$data2 = array(
				'leave_id'				=> $post['leave_id'],
				);
				$this->db->where($data2);
				$query = $this->db->delete('leaves');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;
			case 'get_by_id':
				$this->db->select('*');
				$this->db->from('leaves');
				$this->db->where('leave_id',$post['leave_id']);
				$query = $this->db->get()->result_array();
				
				return current($query);
			break;
			
			default:
				return 0;
			break;
		}
	}

	// position_form
	public function position_form($post){
		switch ($post['crud_type']) {
			case 'add':
				$arrayName = array(
					'description'                  					=> $post['description'],
	                'rate'              							=> $post['rate'],
	                
				);
				$query = $this->db->insert('position', $arrayName);
				if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'edit':
				$arrayName = array(
					'description'                  					=> $post['description'],
	                'rate'              							=> $post['rate'],
	                
				);
				$this->db->where('id', $post['id']);
	      		$query = $this->db->update('position', $arrayName);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}

			break;
			case 'delete':
				$data2 = array(
				'id'				=> $post['id'],
				);
				$this->db->where($data2);
				$query = $this->db->delete('position');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;
			case 'get_by_id':
				$this->db->select('*');
				$this->db->from('position');
				$this->db->where('id',$post['id']);
				$query = $this->db->get()->result_array();
				
				return current($query);
			break;
			
			default:
				return 0;
			break;
		}
	}

	public function delete_leave($post){
		$data2 = array(
			'leave_id'				=> $post['id'],
		);
		$this->db->where($data2);
		$query = $this->db->delete('leave_credits');
		if($query){
			return 1;
		}else{
			return 0;
		}
	}

	// schedule_form
	public function schedule_form($post){
		switch ($post['crud_type']) {
			case 'add':
				$arrayName = array(
					'time_in'                  					=> $post['time_in'],
	                'time_out'              					=> $post['time_out'],
	                
				);
				$query = $this->db->insert('schedules', $arrayName);
				if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'edit':
				$arrayName = array(
					'time_in'                  					=> $post['time_in'],
	                'time_out'              					=> $post['time_out'],
	                
				);
				$this->db->where('id', $post['id']);
	      		$query = $this->db->update('schedules', $arrayName);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}

			break;
			case 'delete':
				$data2 = array(
				'id'				=> $post['id'],
				);
				$this->db->where($data2);
				$query = $this->db->delete('schedules');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;
			case 'get_by_id':
				$this->db->select('*');
				$this->db->from('schedules');
				$this->db->where('id',$post['id']);
				$query = $this->db->get()->result_array();
				
				return current($query);
			break;
			
			default:
				return 0;
			break;
		}
	}

	// employee_form
	public function employee_form($post){
		switch ($post['crud_type']) {
			case 'add':
				$arrayName = array(
					'employee_id'                  				=> $post['employee_id'],
	                'firstname'              					=> $post['firstname'],
	                'lastname'              					=> $post['lastname'],
	                'address'              						=> $post['address'],
	                'birthdate'              					=> $post['birthdate'],
	                'contact_info'              				=> $post['contact_info'],
	                'gender'              						=> $post['gender'],
	                'position_id'              					=> $post['position_id'],
	                'schedule_id'              					=> $post['schedule_id'],
	                'username'              					=> $post['username'],
	                'employee_type'              				=> $post['employee_type'],
	                'email'										=> $post['email'],
	                'sss'										=> $post['sss'],
					'philhealth'								=> $post['philhealth'],
					'landbank'									=> $post['landbank'],
					'tin'										=> $post['tin'],
	                'password'              					=> base64_encode($post['password']),
	                'created_on'              					=> current_ph_date(),
				);
				$query = $this->db->insert('employees', $arrayName);
				if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'edit':
				$arrayName = array(
					'employee_id'                  				=> $post['employee_id'],
	                'firstname'              					=> $post['firstname'],
	                'lastname'              					=> $post['lastname'],
	                'address'              						=> $post['address'],
	                'birthdate'              					=> $post['birthdate'],
	                'contact_info'              				=> $post['contact_info'],
	                'gender'              						=> $post['gender'],
	                'position_id'              					=> $post['position_id'],
	                'schedule_id'              					=> $post['schedule_id'],
	                'username'              					=> $post['username'],
	                'employee_type'              				=> $post['employee_type'],
	                'email'              						=> $post['email'],
	                'sss'										=> $post['sss'],
					'philhealth'								=> $post['philhealth'],
					'landbank'									=> $post['landbank'],
					'tin'										=> $post['tin'],
	                'password'              					=> base64_encode($post['password']),
	                
				);
				$this->db->where('id', $post['id']);
	      		$query = $this->db->update('employees', $arrayName);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}

			break;
			case 'delete':
				// $data2 = array(
				// 'id'				=> $post['id'],
				// );
				// $this->db->where($data2);
				// $query = $this->db->delete('employees');
				// if($query){
				// 	return 1;
				// }else{
				// 	return 0;
				// }

				// archive
				$arrayName = array(
					'is_deleted'              					=> 1,
	                
				);
				$this->db->where('id', $post['id']);
	      		$query = $this->db->update('employees', $arrayName);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'retrieve':
				$arrayName = array(
					'is_deleted'              					=> 0,    
				);
				$this->db->where('id', $post['id']);
	      		$query = $this->db->update('employees', $arrayName);
	      		if($query){	
					return 1;
				}else{
					return 0;
				}
			break;
			case 'get_by_id':
				$this->db->select('*');
				$this->db->from('employees');
				$this->db->where('id',$post['id']);
				$query = $this->db->get()->result_array();
				
				return current($query);
			break;
			
			default:
				return 0;
			break;
		}
	}

	
}