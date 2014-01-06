<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function  index()
	{
		
	}
	//登录验证
	public function checklogin()
	{
		//$name = $this->input->post("name");
		//$pwd = $this->input->post("pwd");
	
		$name = $this->input->get("name");
		$pwd = $this->input->get("pwd");
		if($name&&$pwd)
		{
			$this->load->model('User_Model');
			$user=$this->User_Model->user_select('name','UserInformation',$name);
			if($user)
			{
				if($user[0]->password==$pwd)
				{
					echo '登录成功';
					$this->load->library('session');
					$usersession=array('id'=>$user[0]->id);
					$this->session->set_userdata($usersession);
					echo '<br />';
					echo $this->session->userdata('id');
				}
				else
				{
					echo '密码不正确';
				}
			}
			else
			{
				echo '用户不存在';
			}
		}
		if(!$name&&$pwd)
		{
			echo '请输入用户名';
		}
		if($name&&!$pwd)
		{
			echo '请输入密码';
		}
		else if(!$name&&!$pwd)
		{
			echo '请输入用户名和密码';
		}
	}
	
	//检测session
	function checksession()
	{
		$this->load->library('session');
		if($this->session->userdata('id'))
		{
			echo '已经登录';
		}
		else
		{
			echo '未登录';
		}
	}
	
	//登出
	function loginout()
	{
	$this->load->library('session');
		if($this->session->userdata('id'))
		{
			$this->session->unset_userdata('id');
			echo '已退出';
		}
		else
		{
			echo '未登录';
		}
	}
	public function render ($code, $message, $result = '')
	{
		echo json_encode(array(
				'code'		=> $code,
				'message'	=> $message,
				'result'	=> $result
		));
		exit;
	}
}
?>
</html>