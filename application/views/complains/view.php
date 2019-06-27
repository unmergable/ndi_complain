<div class="content-wrapper">
    <div class="container">
    <h3>ข้อมูลการร้องเรียน</h3>
        <table class="table table-striped">
            <tr>
                <td>ชื่อผู้ร้องเรียน</td>
                <td><?=$complain['complain'][0]['name']?></td>
            </tr>
            <tr>
                <td>รหัสบัตรประชาชน</td>    
                <td><?=$complain['complain'][0]['nat_id']?></td>
            </tr>
            <tr>
                <td>เบอร์โทรศัพท์</td>
                <td><?=$complain['complain'][0]['tel']?></td>
            </tr>
            <tr>
                <td>อีเมล</td>
                <td><?=$complain['complain'][0]['email']?></td>
            </tr>
            <tr>
                <td>ที่อยู่</td>
                <td><?=$complain['complain'][0]['addr']?></td>
            </tr>
            <tr>
                <td>ประเภทการร้องเรียน</td>
                <td><?=$complain['complain'][0]['cp_type_id']?></td>
            </tr>
            <tr>
                <td>สถานที่</td>
                <td><?=$complain['complain'][0]['cp_place']?></td>
            </tr>
            <tr>
                <td>รายละเอียด</td>
                <td><?=$complain['complain'][0]['cp_detail']?></td>
            </tr>
            <tr>
                <td>วันที่</td>
                <td><?=$complain['complain'][0]['created_at']?></td>
            </tr>
            <tr><td colspan="2" ><h3>ไฟล์แนบ</h3></td></tr>
            <?php foreach($complain['files'] as $files => $file):?>
                <tr>
                    <td><a href="application\uploads\complains\<?=$file['file_name']?>"><?=$file['file_name']?></a></td>
                    <td><?=$file['file_detail']?></td>
                </tr>
            <?php endforeach?>
        </table>
    </div>
</div>
