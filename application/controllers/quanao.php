<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "UploadHandler.php";

class quanao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('quanao_model');
		$ketqua = $this->quanao_model->getAllData();
		$ketqua = array("mangketqua" => $ketqua);
		//truyen du lieu
		$this->load->view('index', $ketqua);	
	}
	public function item_add()
	{
		
		//xu li anh
		$target_dir = "FileUpload/";
		$target_file = $target_dir . basename($_FILES["anhsanpham"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhsanpham"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;} 
		    else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// // Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "File đã có.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["anhsanpham"]["size"] > 500000) {
		    echo "File quá lớn";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Chỉ nhận file ảnh";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "File chưa được đăng lên.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhsanpham"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["anhsanpham"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		$mahang = $this->input->post('mahang'); ;
		$tenhang = $this->input->post('tenhang');
		$giaca = $this->input->post('giaca');
		$review = $this->input->post('review');
		$anhsanpham = base_url()."FileUpload/".basename($_FILES["anhsanpham"]["name"]) ;

		
		//Gọi model		
		$this->load->model('quanao_model');	
		$trangthai = $this->quanao_model->insertData($mahang,$tenhang,$giaca,$review,$anhsanpham);
		if ($trangthai) 
		{
			$this->load->view('thanhcong');
		}
		else
		{
			echo 'Thất bại';
		}
	}
	public function sua_tt($mahang)
		{
			
			$this->load->model('quanao_model');
			$ketqua = $this->quanao_model->getDataByID($mahang);
			//chuyen sang dang mang
			$ketqua = array('dulieukq' =>$ketqua );
			$this->load->view('suathongtin', $ketqua, FALSE);
		}
	public function xoa_tt($mahang)
		{
			$this->load->model('quanao_model');
			if($this->quanao_model->deleteByID($mahang))
			{
				$this->load->view('xoathanhcong');
			}
			else
			{
				echo 'xóa không thành công';
			}
		}	
	public function update_qa()
	{
			//lấy dữ liệu về view
			$mahang = $this->input->post('mahang'); ;
			$tenhang = $this->input->post('tenhang');
			$giaca = $this->input->post('giaca');
			$review = $this->input->post('review');
			//upload anh
			
		$target_dir = "FileUpload/";
		$target_file = $target_dir . basename($_FILES["anhsanpham"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhsanpham"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// // Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "File đã có.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["anhsanpham"]["size"] > 500000) {
		    echo "File quá lớn";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Chỉ nhận file ảnh";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		   // echo "File chưa được đăng lên.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhsanpham"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["anhsanpham"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}

		$anhsanpham = basename($_FILES["anhsanpham"]["name"]);
	
		if($anhsanpham)
		{
			$anhsanpham = base_url()."fileupload/". basename($_FILES["anhsanpham"]["name"]);
		}	
		else 		//neu khong dung anh sanpham 2
		{
			$anhsanpham = $this->input->post('anhsanpham2');
		}

		$this->load->model('quanao_model');
		if($this->quanao_model->updateByID($mahang,$tenhang,$giaca,$review,$anhsanpham))
		{
			$this->load->view('thanhcong');
		}
		else
			{echo 'sai';}
	}
	public function ajax_add()
		{
			$mahang = $this->input->post('mahang'); ;
			$tenhang = $this->input->post('tenhang');
			$giaca = $this->input->post('giaca');
			$review = $this->input->post('review');
			$anhsanpham = $this->input->post('anhsanpham');
			//base_url()."FileUpload/".basename($_FILES["anhsanpham"]["name"]) ;

			
			//Gọi model		
			$this->load->model('quanao_model');	
			$trangthai = $this->quanao_model->insertData($mahang,$tenhang,$giaca,$review,$anhsanpham);
			if ($trangthai) 
			{
				echo 'Thành công';
			}
			else
			{
				echo 'Thất bại vcl';
			}
		}	
		public function uploadfile()
		{
			$uploadfile = new UploadHandler();
		}
		public function denSuaThongTin()
		{
				$this->load->model('quanao_model');
				$ketqua = $this->quanao_model->getAllData();
				$ketqua = array("mangketqua" => $ketqua);
				//truyen du lieu
				$this->load->view('additem_view', $ketqua);	
		}
}	

		

/* End of file additeam.php */
/* Location: ./application/controllers/additeam.php */