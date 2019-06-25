<div class="content-wrapper">
    <div class="container">
        <h2>Department</h2>
        <div class="row">
            <div class="col-sm-4">
                <button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#deModal">Add new</button>
                <?=form_open('department/insert', array('id' => 'deform'));?>
                    <div class="modal fade" id="deModal" tabindex="-1" role="dialog" aria-labelledby="deModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deModalLabel">หน่วยงาน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" id="times">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">ชื่อหน่วยงาน</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="detail">รายละเอียด</label>
                                            <textarea name="detail" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="dismiss" class="btn btn-secondary" data-dismiss="modal">ปิดหน้าต่าง</button>
                                        <button class="btn btn-primary" type="submit">เพิ่ม</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                <?=form_close()?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover">
                    <?php foreach ($departments as $department): ?>
                        <tr>
                            <td><?=$department['name']?></td>
                            <td><?=$department['detail']?></td>
                            <td><a  class="btn btn-warning" href="<?=base_url()."remove/".$department['id'];?>" >Delete</a></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>