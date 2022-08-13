<main>
	<div class="container-fluid px-2">
		<h1 class="mt-2">Product</h1>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
			<li class="breadcrumb-item active">Product</li>
		</ol>
		<div class="card mb-2">
			<div class="card-body">
				<h1>This is page content</h1>
				<a href="/admin/category/add">Thêm mới</a>
				<table data-toolbar="#toolbar" data-toggle="table" class="table table-hover" id="category">
					<thead style="background: #f1f4f7;">
						<tr>
							<th data-field="id" data-sortable="true">ID</th>
							<th data-field="name" data-sortable="true">Name</th>
							<th data-field="img" data-sortable="true">AVA</th>
                            <th data-field="price" data-sortable="true">Price</th>
							<th data-field="discount" data-sortable="true">Discount</th>
							<th data-field="code_product" data-sortable="true">Code_product</th>
                            <th data-field="quantity" data-sortable="true">Quantity</th>
							<th data-field="manufacturer" data-sortable="true">Manufacturer</th>
							<th data-field="category" data-sortable="true">Category</th>
							<th data-field="review_product" data-sortable="true">Review_product</th>
							<th data-field="urser_size" data-sortable="true">Urser_size</th>
							<th data-field="create_date" data-sortable="true">Create_date</th>
							<th data-field="update_date" data-sortable="true">Update_date</th>
							<th data-field="status" data-sortable="true">Action</th>
						</tr>
					</thead>
					<tbody class="">
						<? if (!empty($lists)) {
							foreach ($lists as $list) { ?>
								<tr>
									<td class="td-count" scope="row"><?= $list['name']; ?></td>
									<td><?= $list['status']; ?></td>
									<td class="form-group">
										<a href="/admin/category/edit?id=<? echo $list['id'] ?>" class="btn btn-primary" style="padding: 4px 6px;"><i class="glyphicon glyphicon-pencil"></i></a>
									</td>
                                    <!-- <td> button edit
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								?>
							   </td> -->
								</tr>
						<? }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
