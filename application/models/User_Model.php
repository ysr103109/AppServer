<?php
class User_Model extends CI_Model
{
	function  __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function  user_insert($arr)
	{
		$this->db->insert('UserInformation',$arr);
	}
	function  user_update($id,$arr)
	{
		$this->db->where('id',$id);
		$this->db->update('UserInformation',$arr);
	}
	function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('UserInformation');
	}
	function user_select($aim,$table,$arr)//select $aim from $table where $key = $arr;
	{
		$this->db->where($aim,$arr);
		$this->db->select('*');
		$query=$this->db->get($table);
		return $query->result();
	}
}
