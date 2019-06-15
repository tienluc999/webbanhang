<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa thông tin</title>
  <meta name="viewport" content="witdth=device-width, initial-scale=1">
  <script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>1.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url() ?>1.css">
</head>
<body>
      <<?php include "menubar.php" ?>
	   <div class="container">
        <div class="text-xs-center">
            <h3 class="display-3">Sửa thông tin</h3>
            <hr>
        </div> 
    
     <div class="container">
    <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>index.php/quanao/update_qa">
        <?php foreach ($dulieukq as $value): ?>

        <div class="form-group row">
          <div class="col-sm-6">
            <div class="row">
                <label for="anh" class="col-sm-4 form-control-label text-xs-right">Ảnh sản phẩm</label>
            <div class="col-sm-8">  
              <div class="row">
                  <div class="col-sm-6">
                    <img src="<?= $value['anhsanpham'] ?>" alt="" class="img-fluid">
                  </div>
                <input type="hidden" name="mahang" value="<?= $value['mahang'] ?>">
                <input type="hidden" name="anhsanpham2" value="<?= $value['anhsanpham'] ?>">
                <input type="file" name="anhsanpham" class="form-control" id="anhsanpham" placeholder="Upload anh">
              </div>
            </div>
          </div>
        
        <div class="col-sm-12">
            <div class="row">
                <label for="mahang" class="col-sm-4 form-control-label text-xs-right">Mã hàng</label>
            <div class="col-sm-8">
            <input type="text" name="mahang" class="form-control" id="mahang" placeholder="Mã Hàng" value="<?= $value['mahang'] ?>">
              </div>
              </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <label for="tenhang" class="col-sm-4 form-control-label text-xs-right">Tên sản phẩm</label>
            <div class="col-sm-8">
            <input type="text" name="tenhang" class="form-control" id="tenhang" placeholder="Tên sản phẩm" value="<?= $value['tenhang'] ?>">
              </div>
              </div>
        </div>

          <div class="col-sm-12">
              <div class="row">
                  <label for="giaca" class="col-sm-4 form-control-label text-xs-right">Giá</label>
              <div class="col-sm-8">
              <input type="text" name="giaca" class="form-control" id="giaca" placeholder="Giá sản phẩm" value="<?= $value['giaca'] ?>">
                </div>
                </div>
          </div>

        <div class="col-sm-12">
            <div class="row">
                <label for="review" class="col-sm-4 form-control-label text-xs-right">Đánh giá sản phẩm</label>
            <div class="col-sm-8">
            <input type="text" name="review" class="form-control" id="review" placeholder="Đánh giá sản phẩm" value="<?= $value['review'] ?>">
              </div>
            </div>
        </div>
        </div>

        <?php endforeach ?>
        </div>

        <div class="container">
        <div class="form-group row text-xs-center">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-outline-success">Sửa</button>
            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
          </div>
        </div>
  </div>
        </form>

</body>
</html> 