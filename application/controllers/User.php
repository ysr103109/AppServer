<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	function insert()
	{
		$this->load->model('User_Model');
		$arr = array('name'=>'ul','password'=>'1234');
		$this->User_Model->user_insert($arr);		
	}
	function update()
	{
		$this->load->model('User_Model');
		$arr = array('name'=>'小乔','phonenumber'=>'18897348746','school'=>'bb','password'=>'123456');
		$this->User_Model->user_update(1,$arr);
	}
	function delete()
	{
		$this->load->model('User_Model');
		$this->User_Model->user_delete(3);
	}
	function select()
	{
		$this->load->model('User_Model');
		$arr = $this->User_Model->user_select('id','UserInformation',1);
		//var_dump($arr);
		//echo $arr;
		echo $arr[0]->id;
	}
}
?>
</html>