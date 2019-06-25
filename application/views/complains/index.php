<div class="content-wrapper">
	<div class="container">
		<h3>Complain List</h3>
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>ประเภทการร้องเรียน</th>
				<th>วันที่ร้องเรียน</th>
				<th>รายละเอียด</th>
			</tr>
			<?php $i=0;foreach ($complains as $complain):$i++; ?>
				<tr>
					<td><?=$i?></td>
					<td><?=$complain['cp_type_id']?></td>
					<td><?=$complain['created_at']?></td>
					<td><?=$complain['cp_detail']?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>