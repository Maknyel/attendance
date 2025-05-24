<?php
if(!function_exists('add_api_slash')){
	function add_api_slash($post){
		$CI =& get_instance();
		if(num_user_rows_api_arduino($post['sensor_name']) == 0){
			
			$data = array(
				'sensor_name' 				=> $post['sensor_name'],
				'sensor_value'				=> $post['sensor_value'],
				'sensor_last_updated'		=> current_ph_date_time(),
			);
			$query = $CI->db->insert('sensor', $data);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}else{
			$data2 = array(
				'sensor_name' 				=> $post['sensor_name'],
				'sensor_value'				=> $post['sensor_value'],
				'sensor_last_updated'		=> current_ph_date_time(),

			);
			$CI->db->where(array('sensor_name'=>$post['sensor_name']));
			$query = $CI->db->update('sensor', $data2);
			if($query){
				return 1;
			}else{
				return 0;
			}


		}
		
	}
}

if(!function_exists('num_user_rows_api_arduino')){
	function num_user_rows_api_arduino($sensor_name){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('sensor');
		$CI->db->where('sensor_name', $sensor_name);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}


?>