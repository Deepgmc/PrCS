<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

   public function getComments($commentType, $comId)
	{
		$this->load->model('comments_model');
		$comments = $this->comments_model->get_comments(
			$commentType,
			$comId,
			$this->session->userdata('userId')
		);
		echo json_encode($comments);
	}

   public function saveComment($commentType, $comId)
	{
		$this->load->model('comments_model');
		$text = trim($_POST['text']);
		$insert_date = $this->comments_model->save_comment(
			$commentType,
			$comId,
			$this->session->userdata('userId'),
			$text
		);
		echo json_encode(
			array(
				'date' => $insert_date
			)
		);
	}

	public function login()
	{
		$login = trim($_POST['login']);
		$this->load->model('user_model');
		$result = $this->user_model->get_current_user_data($login);
		if(!!$result){
			$this->session->set_userdata('isLogined', true);
			$this->session->set_userdata('userName', $result[0]->name);
			$this->session->set_userdata('userId', $result[0]->id);
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}
}
