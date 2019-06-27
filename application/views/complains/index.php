<div class="content-wrapper">
	<div class="container">
		<h3>Complain List</h3>
		<table class="table table-hover">
			<tr>
				<th>วันที่ร้องเรียน</th>
				<th>ประเภทการร้องเรียน</th>
				<th>รายละเอียด</th>
			</tr>
			<?php $i=0;foreach ($complains as $complain):$i++;$id=$complain['id']; ?>
				<tr style="cursor: pointer" onclick='window.location.href="./complain/<?=$id?>"'>
					<td><?=$complain['created_at']?></td>
					<td><?=$complain['cp_type_id']?></td>
					<td><?=$complain['cp_detail']?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>