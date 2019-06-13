<div class="content-wrapper">
  <div class="container">
      <h2>Complaint</h2>
      <form>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">ชื่อผู้ร้องเรียน</label>
          <div class="col-sm-4">
            <input type="text" name="cpName" class="form-control" id="inputEmail3" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">เลขที่บัตรประชาชน</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputEmail3" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">เบอร์โทรศัพท์</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" id="inputEmail3" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Email</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" id="inputEmail3" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">สถานที่ติดต่อกลับ</label>
          <div class="col-sm-4">
            <textarea class="form-control" ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">ประเภทการร้องเรียน</label>
          <div class="col-sm-4">
            <select name="" id="" class="form-control">
                <option value="">เลือกประเภท</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">รายละเอียดการร้องเรียน</label>
          <div class="col-sm-4">
            <textarea class="form-control" ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right">เอกสารแนบ</label>
          <div class="col-sm-4">
          <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">
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
                    <input type="file" id="files" name="files[]" multiple  class="form-control"/>                    
                    คำอธิบาย
                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดหน้าต่าง</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">อัพโหลดไฟล์</button>
                </div>
              </div>
            </div>
          </div>
            
            <div class="gallery"></div>
          </div>
        </div>
        <div class="form-group row"><br>
          <label for="inputEmail3" class="col-sm-4 col-form-label text-right"></label>
          <div class="col-sm-4">
              <button type="submit" class="btn btn-primary btn-block">บันทึก</button>
          </div>
        </div>
      </form>
  </div>
</div>
<script>
$(document).ready(function() {
  $('#files').on('change', function() { $(".modal-body").append('<input type="file" name="file[]"/>') });
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span id=\"pip\" class=\"thumbnail\">" +
            "<img src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
            "<span class=\"remove\">ลบออก</span>" +
            "</span>").insertAfter(".gallery");
          $(".remove").click(function(){
            $(this).parent("#pip").remove();
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>