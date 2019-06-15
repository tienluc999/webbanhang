<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanao_model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
		public function insertData($mahang,$tenhang,$giaca,$review,$anhsanpham)
	{
		$dulieu = array(
			'mahang' => $mahang,
			'tenhang' => $tenhang,
			'giaca' => $giaca,
			'review' => $review,
			'anhsanpham' => $anhsanpham,
		);
			$this->db->insert('quanao', $dulieu);
			return $this->db->insert_id();
	}
			public function getAllData()
		{
			$this->db->select('*');
			$dulieu = $this->db->get('quanao');
			$dulieu = $dulieu->result_array();
			return $dulieu;
		}
			public function getDataByID($key)
		{
			$this->db->select('*');
			$this->db->where('mahang',$key);
			
			$dulieu = $this->db->get('quanao');
			$dulieu = $dulieu->result_array();
			
				// echo "<pre>";
				// var_dump($dulieu);
				// echo "</pre>";
			return $dulieu;
		}
		public function updateByID($mahang,$tenhang,$giaca,$review,$anhsanpham)
		{
			$dulieu = array(
				'mahang' => $mahang,
				'tenhang' => $tenhang,
				'giaca' => $giaca,
				'review' => $review,
				'anhsanpham' => $anhsanpham
			);
			$this->db->where('mahang', $mahang);
			return $this->db->update('quanao', $dulieu);
		}
		public function deleteByID($mahang)
		{
			$this->db->where('mahang', $mahang);
			return $this->db->delete(	'quanao');
		}

}

/* End of file quanao_model.php */
/* Location: ./application/controllers/quanao_model.php */