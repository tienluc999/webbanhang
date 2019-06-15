<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chỉnh sửa thông tin</title>
  <meta name="viewport" content="witdth=device-width, initial-scale=1">
  <script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>


  <script type="text/javascript" src="<?= base_url() ?>jqueryupload/js/jquery.fileupload.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>jqueryUpload/js/vendor/jquery.ui.widget.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>1.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
  <!-- jquery upload -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url() ?>1.css">
</head>
<body>
    <?php include "menubar.php" ?>
<div class="container">
	   <div class="container">
        <div class="text-xs-center">
            <h3 class="display-3">Danh sách các đơn hàng</h3>
            <hr>
        </div> </div>


        <div class="container">
        <div class="row">
        <div class="card-desk-wrapper">
         <div class="card-deck ">
            <?php foreach ($mangketqua as $value): ?>
             <div class="col-sm-4 ">
            <div class="card">
              <img class="card-img-top img-fluid" src="<?= $value['anhsanpham'] ?>" alt="Card image cap">
                <div class="card-block">
                  <h5 class="card-title ten">Tên sản phẩm: <b><?= $value['tenhang'] ?></b></h5>
                  <p class="card-text ma">Mã hàng: <b><?= $value['mahang'] ?></b></p>
                  <p class="card-text gica">Giá cả: <b><?= $value['giaca'] ?> đ</b></p>
                  <p class="card-text"><small class="text-muted"><b><?= $value['review'] ?></b></small></p>
                  <p class="card-text editns">
                  <small><a href="<?= base_url() ?>index.php/quanao/sua_tt/<?= $value['mahang'] ?>" class="btn btn-warning btn-xs">Sửa nội dung <i class="fa fa-pencil"></i></a></small>
                  <small><a href="<?= base_url() ?>index.php/quanao/xoa_tt/<?= $value['mahang'] ?>" class="btn btn-outline-danger btn-xs">Xóa nội dung <i class="fa fa-remove"></i></a></small>
                  </p>
                </div>
            </div>
            </div>
            <?php endforeach ?>
          
    
          </div>
        </div>
        <div class="text-xs-center">
                  <br>
        <br>

          <h5 class="display-3">Thêm mới mặt hàng</h5>
          <hr>
        </div> 

    <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>index.php/quanao/item_add"> 

        <div class="form-group row">
          <div class="col-sm-6">
            <div class="row">
                <label for="anh" class="col-sm-4 form-control-label text-xs-right">Ảnh sản phẩm</label>
            <div class="col-sm-8">
                <input type="file" name="anhsanpham" class="form-control" id="anhsanpham" placeholder="Upload anh">
              </div>
            </div>
          </div>
        
        <div class="col-sm-6">
            <div class="row">
                <label for="mahang" class="col-sm-4 form-control-label text-xs-right">Mã hàng</label>
            <div class="col-sm-8">
            <input type="text" name="mahang" class="form-control" id="mahang" placeholder="Mã Hàng">
              </div>
              </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
                <label for="tenhang" class="col-sm-4 form-control-label text-xs-right">Tên sản phẩm</label>
            <div class="col-sm-8">
            <input type="text" name="tenhang" class="form-control" id="tenhang" placeholder="Tên sản phẩm">
              </div>
              </div>
        </div>

          <div class="col-sm-6">
              <div class="row">
                  <label for="giaca" class="col-sm-4 form-control-label text-xs-right">Giá</label>
              <div class="col-sm-8">
              <input type="text" name="giaca" class="form-control" id="giaca" placeholder="Giá sản phẩm">
                </div>
                </div>
          </div>

        <div class="col-sm-6">
            <div class="row">
                <label for="review" class="col-sm-4 form-control-label text-xs-right">Đánh giá sản phẩm</label>
            <div class="col-sm-8">
            <input type="text" name="review" class="form-control" id="review" placeholder="Đánh giá sản phẩm">
              </div>
            </div>
        </div>
        </div>
        <div class="form-group row text-xs-center">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-outline-success">Thêm mới</button>
            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
          </div>
        </div>
      </form>
  </div>


</body>
</html> 