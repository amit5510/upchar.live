<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercreate extends CI_Controller 
{
	 function __construct() 
	 {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 $this->load->model('usercreatemodel');
	}
	 
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('user');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function create()
	{ 
		if(isset($_POST['submit'])){
			$id=base64_decode($this->input->post('eid'));
			if($id=='')
			{
				if($this->usercreatemodel->checkusername())
				{
					if($this->usercreatemodel->usercreateinsert())
					{
						$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
					else
					{
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
				}
				else
				{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Username already exist..</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
			else
			{	
				if($this->usercreatemodel->usercreateedit($id))
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Updated Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
		}
		redirect(base_url().'users/usercreate');
	}
	
	public function fetch()
	{ 
	
		$id=base64_decode($this->input->post('uid'));
		$alldata=array();
		$data=$this->db->get_where('login',array('id'=>$id))->row(); 
		$alldata['id']=base64_encode($data->id);
		$alldata['name']=$data->name;
		$alldata['mobile']=$data->mobile;
		$alldata['email']=$data->email;
		$alldata['dob']=$data->dob;
		$alldata['role']=$data->role;
		$alldata['userid']=$data->username;
		$alldata['active']=$data->status;
		echo json_encode($alldata);
	
	}
	
	public function gettable()
	{
		$getdatas=$this->db->get_where('login',array());
		foreach($getdatas->result() as $getdata)
		{	
			if($getdata->status=='1')
			{
				$active="<p style='color:#6ebd28'>Active</p>";
			}
			else if($getdata->status=='0')
			{
				$active="<p style='color:#f10e0e'>In-Active</p>";
			}
			echo '<tr class="active">
			<td class="tabledata">'.$getdata->id.'</td>
			<td class="tabledata">'.$getdata->name.'</td>
			<td class="tabledata">'.$getdata->address.'</td>
			<td class="tabledata">'.$getdata->mobile.'</td>
			<td class="tabledata">'.$getdata->email.'</td>
			<td class="tabledata">'.$getdata->dob.'</td>
			<td class="tabledata">'.$getdata->username.'</td>
			<td class="tabledata">'.getRoleName($getdata->role).'</td>
			<td class="tabledata">'.$active.'</td>
			<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($getdata->id).'">Select</a></td>
			<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$getdata->id.'">Delete</a></td>
		  </tr>';
		}
	}
	
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->usercreatemodel->usermoddelete($uid))
		{
			echo "Y";
		}
	}
}
