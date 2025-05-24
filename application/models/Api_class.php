<?php

class Api_class extends CI_Model
{

	public function login_user($data){
		$encodedpass = base64_encode($data['password']);
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where(array('is_deleted'=>'0','username'=>$data['username'],'password'=>$encodedpass));
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

	public function attendance_post($post){
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where(array('id'=>user_session_val()));
		$query = $this->db->get()->result_array();
		$query = current($query);
		if($query){
			if(check_timein_record(user_session_val()) == 0){
				$arrayName = array(
					'employee_id' 						=> user_session_val(),
					'date' 								=> current_ph_date(),
					'time_in' 							=> current_ph_time(),
				);
				$queryv2 = $this->db->insert('attendance', $arrayName);
				if($queryv2){
					$user_array = array(
						'is_success' => '1',
						'message'	 => 'Good day '.$query['firstname'].' '.$query['lastname'].', Your Time IN:'.current_ph_date().' '.current_ph_time(),
					);
				}else{
					$user_array = array(
						'is_success' => '0',
						'message'	 => 'Wrong Query',
					);
				}
			}else{
				// if(isset($post['report'])){
					$arrayName = array(
						'time_out' 							=> current_ph_time(),
						// 'report'							=> $post['report'],
					);
					$this->db->where(array('employee_id'=>user_session_val(),'date'=>current_ph_date()));
		      		$queryv2 = $this->db->update('attendance', $arrayName);
					if($queryv2){
						$user_array = array(
							'is_success' => '1',
							'message'	 => 'Good day '.$query['firstname'].' '.$query['lastname'].', Your Time OUT:'.current_ph_date().' '.current_ph_time(),
						);
					}else{
						$user_array = array(
							'is_success' => '0',
							'message'	 => 'Wrong Query',
						);
					}
				// }else{
				// 	$user_array = array(
				// 			'is_success' => '0',
				// 			'message'	 => 'Please add report parameter',
				// 		);
				// }
					
			}
				
			

		}else{
			$user_array = array(
				'is_success' => '0',
				'message'	 => 'No User Exist',
			);
		}

		return $user_array;
	}

	public function leave_form($post){
		$arrayName = array(
			'reason'                  						=> $post['reason'],
            'leave_type'              						=> $post['leave_type'],
            'date_leave'                 					=> $post['date_leave'],
            'is_half_day'                  					=> $post['is_half_day'],
            'file_uploaded'									=> $post['file_uploaded'],
            
            'employee_id' 									=> user_session_val(),
            'leave_added' 									=> current_ph_date(),
		);
		$query = $this->db->insert('leave_credits', $arrayName);
		if($query){	
			return 1;
		}else{
			return 0;
		}
	}


	
}