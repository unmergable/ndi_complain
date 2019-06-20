<pre>
<?php  var_dump($_POST); ?>
</pre>
<div class="content-wrapper">
  <div class="container">
      <h2>Complaint</h2>
      <form action="" method="POST">
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">ชื่อผู้ร้องเรียน<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <input type="text" name="name" class="form-control" requireder>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">เลขที่บัตรประชาชน<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <input type="text" name="nat_id" class="form-control" pattern=".{13,13}" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" requireder title="เลขที่บัตรประชาชน 13 หลัก">
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">เบอร์โทรศัพท์<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <input type="text" name="tel" class="form-control" maxlength="10" requireder>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">Email</label>
          <div class="col-sm-4">
            <input type="email" name="email" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">สถานที่ติดต่อกลับ<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <textarea name="addr" class="form-control" ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">ประเภทการร้องเรียน<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <select name="cp_type_id" id="" class="form-control" requireder>
                <option value="">เลือกประเภท</option>
                <option value="1">ทดสอบ</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">รายละเอียดการร้องเรียน<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <textarea name="cp_detail" class="form-control" requireder></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">เอกสารแนบ</label>
          <div class="col-sm-4">
          <button type="button" id="popup" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">
            เพิ่มเอกสาร
          </button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">แนบไฟล์เอกสาร</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    เลือกไฟล์
                    <div id="filepick"></div>             
                    คำอธิบาย
                    <div id="filedetail"></div> 
                </div>
                <div class="modal-footer">
                  <button type="button" id="dismiss" class="btn btn-secondary" data-dismiss="modal">ปิดหน้าต่าง</button>
                  <button type="button" id="upload" class="btn btn-primary" data-dismiss="modal">อัพโหลดไฟล์</button>
                </div>
              </div>
            </div>
          </div>
            <div class="store"></div>
            <table class="table table-bordered " id="gallery"></table>
          </div>
        </div>
        <div class="form-group row"><br>
          <label  class="col-sm-4 col-form-label text-right"></label>
          <div class="col-sm-4">
              <button type="submit" class="btn btn-primary btn-block">บันทึก</button>
          </div>
        </div>
      </form>
  </div>
</div>
<script>

  var link = 0;
  $('#popup').click(function(){
      link++;
        $('#filepick').children().hide();
        $('#filedetail').children().hide();
        //var slug = Math.random().toString(36).substring(7);
        $('<input type="file" id="files" name="'+link+'[]" multiple onchange="previewFiles(\''+link+'\')"  class="form-control" />').appendTo('#filepick')
        $('<textarea id="fileDetail" name="dt['+link+']"  cols="30" rows="10" class="form-control"></textarea>').appendTo('#filedetail')
  });

  $('#dismiss').click(function(){
      $('input[name="'+link+'"]:visible').remove()
      $('textarea[name="dt_'+link+'"]:visible').remove()
  });
  
  function previewFiles(link) {
    var preview = document.querySelector('#gallery');
    var files   = document.querySelector('input[type=file]').files;
    function readAndPreview(file) {
      // Make sure `file.name` matches our extensions criteria
      if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
        var reader = new FileReader();
        reader.addEventListener("load", function () {
          $('#gallery').empty();
          var image = new Image();
          image.height = 100;
          image.title = file.name;
          image.src = this.result;
          $('#upload').click(function(){
            detail = $('textarea[name="dt_'+link+'"]').value;
            console.log($('textarea[name="dt_'+link+'"]'))
            $('<tr><td id="pip">'+file.name+'</td><td>'+detail+'</td><td><i class="fa fa-times remove"></i></td></tr>').appendTo('#gallery');
            $(".remove").click(function(){
              //console.log($(this).context.parentNode.previousSibling.innerText)
              $(this).closest('tr').remove();
              $('input[name="'+link+'"]').remove()
              $('textarea[name="dt_'+link+'"]').remove()
            });
          })
        }, false);
        reader.readAsDataURL(file);
      }
    }
     
    if (files) {
      [].forEach.call(files, readAndPreview);
    }
  }

</script>