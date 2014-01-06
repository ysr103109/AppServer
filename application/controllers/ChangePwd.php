<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ChangePwd extends CI_Controller
{
	//改密码
	function change()
	{
		$this->load->library('session');
		if($this->session->userdata('id'))
		{
			//$name = $this->input->post("name");
			//$pwd = $this->input->post("pwd");
			$oldpwd = $this->input->get("oldpwd");
			$newpwd = $this->input->get("newpwd");
			$confirmpwd = $this->input->get("confirmpwd");
			if(!$oldpwd)
			{
				echo '请输入当前密码';
			}
			if($oldpwd&&($oldpwd||$oldpwd))
			{
				echo '请输入新密码';
			}
			if($oldpwd&&$newpwd&&$confirmpwd&&$newpwd!=$confirmpwd)
			{
				echo '请确认新密码';
			}
			if($oldpwd&&$newpwd&&$confirmpwd&&$confirmpwd==$newpwd) 
			{
				$this->load->model('User_Model');
				$id=$this->session->userdata('id');
				$user=$this->User_Model->user_select('id','UserInformation',$id);
				echo $oldpwd;
				if($oldpwd==$user[0]->password)
				{
					$this->load->model('User_Model');
					$arr = array('password'=>$newpwd);
					$this->User_Model->user_update(1,$arr);
					echo '修改成功';
				}
				else if($oldpwd!=$user[0]->password)
				{
					echo '当前密码错误';
				}
			}
		}
		else
		{
			echo '请先登录';
		}
	}
}
?>
</html>