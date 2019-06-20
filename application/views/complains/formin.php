<style>
  /* Style the form */
  #regForm {
    background-color: #ffffff;
    margin: 100px auto;
    padding: 40px;
    width: 100%;
    min-width: 300px;
  }

  /* Style the input fields */
  input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none; 
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }

  /* Mark the active step: */
  .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #4CAF50;
  }
</style>
<div class="content-wrapper">
  <pre>
    <?=var_dump($_POST)?>
  </pre>
  <form id="regForm" action="" method="POST">
  <?php echo form_open_multipart('complain/insert')?>
    <h1 class="text-center">Complain </h1>

    <div class="tab">
      <div class="form-group row">
        <label  class="col-sm-4 col-form-label text-right">ชื่อผู้ร้องเรียน<span class="text-red">*</span></label>
        <div class="col-sm-4 req">
          <input type="text" name="name" oninput="this.className = ''">
        </div>
      </div>
      <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">เลขที่บัตรประชาชน<span class="text-red">*</span></label>
          <div class="col-sm-4 req">
            <input type="text" name="nat_id" pattern=".{13,13}" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');this.className='';"  title="เลขที่บัตรประชาชน 13 หลัก">
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">เบอร์โทรศัพท์<span class="text-red">*</span></label>
          <div class="col-sm-4 req">
            <input type="text" name="tel" oninput="this.className = ''" maxlength="10" >
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">Email</label>
          <div class="col-sm-4">
            <input type="email" name="email">
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">สถานที่ติดต่อกลับ<span class="text-red">*</span></label>
          <div class="col-sm-4 req">
            <textarea name="addr" class="form-control" ></textarea>
          </div>
        </div>
    </div>


    <div class="tab">
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">สถานที่เกิดเหตุ<span class="text-red">*</span></label>
          <div class="col-sm-4 req">
            <textarea name="place" class="form-control" ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">ประเภท<span class="text-red">*</span></label>
          <div class="col-sm-4 req">
            <select name="type" id="" class="form-control">
              <option value="">เลือกประเภท</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label text-right">รายละเอียด<span class="text-red">*</span></label>
          <div class="col-sm-4 req">
            <textarea name="detail" class="form-control" ></textarea>
          </div>
        </div>
    </div>

    <div class="tab"> <!-- ATTACH FILES TAB -->
      <div class="form-group row">
        <label  class="col-sm-4 col-form-label text-right">เอกสารแนบ</label>
        <div class="col-sm-4">
        <button type="button" id="popup" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
          เพิ่มเอกสาร
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แนบไฟล์เอกสาร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" id="times">&times;</span>
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
                <button type="button" class="btn btn-primary upload" data-dismiss="modal">อัพโหลดไฟล์</button>
              </div>
            </div>
          </div>
        </div>
          <div class="store"></div>
          <table class="table table-bordered " id="gallery"></table>
        </div>
      </div>
      
    </div>

    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>

      <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>
</div>


<script>
  var link = 0;
  $('#popup').click(function(){
      link++;
        $('<input type="file" id="files" name="file_'+link+'[]"   class="form-control" />').appendTo('#filepick')
        $('<textarea id="fileDetail" name="detail_'+link+'[]"  cols="30" rows="10" class="form-control"></textarea>').appendTo('#filedetail')
        $('.upload').replaceWith('<button type="button" class="btn btn-primary upload" onclick="previewFiles('+link+')" data-dismiss="modal">อัพโหลดไฟล์</button>')
  });

  $('#dismiss,#times').click(function(){
    $('#filepick').children().remove();
    $('#filedetail').children().remove();
  });

  $('#exampleModal').on('hidden.bs.modal', function () {
    $('#filepick').children().remove();
    $('#filedetail').children().remove();
  })
  
  function previewFiles(link) {
    var preview = document.querySelector('#gallery');
    var files   = document.querySelector('input[name="file_'+link+'[]"]').files;
    var detail = $('textarea[name="detail_'+link+'[]"]').val();
    function readAndPreview(file) {
      if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
        var reader = new FileReader();
        reader.addEventListener("load", function () {
            $('<tr id="'+link+'"><td>'+file.name+'</td><td>'+detail+'</td><td><i class="fa fa-times remove"></i></td></tr>').appendTo('#gallery')
            $('input[name="file_'+link+'[]"]').appendTo('#gallery').hide()
            $('textarea[name="detail_'+link+'[]"]').appendTo('#gallery').hide()
            $(".remove").click(function(){
              var trId = $(this).closest('tr').attr('id')
              $(this).closest('tr').remove();
              $('input[name="file_'+trId+'[]"]').remove()
              $('textarea[name="detail_'+trId+'[]"]').remove()
            });

        }, false);
        reader.readAsDataURL(file);
      }
    }
    if (files) {
      [].forEach.call(files, readAndPreview);
    }
  }

  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
      //...the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false:
        valid = false;
      }
      // FOR TEST
      valid = true;
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
  }

</script>