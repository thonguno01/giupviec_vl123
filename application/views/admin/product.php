<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">Quản lý sản phẩm</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
			<li class="breadcrumb-item active">Quản lý sản phẩm</li>
		</ol>
		<a href="/admin/product/add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="margin-bottom:20px">Thêm mới</a>
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
				DataTable Product
			</div>
			<div class="card-body">
				<table id="datatablesSimple">
					<thead>
						<tr>
							<th data-field="id" data-sortable="true">ID</th>
							<th data-field="name" data-sortable="true">Tên</th>
							<th data-field="img" data-sortable="true">Ảnh</th>
							<th data-field="des_img" data-sortable="true">Ảnh mô tả</th>
							<th data-field="price" data-sortable="true">Giá</th>
							<th data-field="discount" data-sortable="true">Giảm giá</th>
							<th data-field="code_product" data-sortable="true">Mã sản phẩm</th>
							<th data-field="quantity" data-sortable="true">Số lượng</th>
							<th data-field="manufacturer" data-sortable="true">Hãng sản xuất</th>
							<th data-field="category" data-sortable="true">Loại sản phẩm</th>
							<th data-field="model" data-sortable="true">Model</th>
							<th data-field="create_date" data-sortable="true">Ngày tạo</th>
							<th data-field="update_date" data-sortable="true">Ngày sửa</th>
							<th data-field="status" data-sortable="true">Trạng thái</th>
							<th data-field="status" data-sortable="true">Hành động</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
						<th data-field="id" data-sortable="true">ID</th>
						<th data-field="id" data-sortable="true">ID</th>
							<th data-field="name" data-sortable="true">Tên</th>
							<th data-field="img" data-sortable="true">Ảnh</th>
							<th data-field="des_img" data-sortable="true">Ảnh mô tả</th>
							<th data-field="price" data-sortable="true">Giá</th>
							<th data-field="discount" data-sortable="true">Giảm giá</th>
							<th data-field="code_product" data-sortable="true">Mã sản phẩm</th>
							<th data-field="quantity" data-sortable="true">Số lượng</th>
							<th data-field="manufacturer" data-sortable="true">Hãng sản xuất</th>
							<th data-field="category" data-sortable="true">Loại sản phẩm</th>
							<th data-field="model" data-sortable="true">Model</th>
							<th data-field="create_date" data-sortable="true">Ngày tạo</th>
							<th data-field="update_date" data-sortable="true">Ngày sửa</th>
							<th data-field="status" data-sortable="true">Trạng thái</th>
							<th data-field="status" data-sortable="true">Hành động</th>
						</tr>
					</tfoot>
					<tbody>
						<?
						foreach ($lists as $list) { ?>
							<tr>
								<td class="td-count" scope="row"><?= $list['id']; ?></td>
								<td><?= $list['name']; ?></td>
								<td> <img width="94" height="85px" src="<?= "/upload/products/product_".$list['id'].'/' . $list['image']; ?>"></td>
								<td><? $des_path = preg_split("/[,]+/",$list['des_image']);
								foreach($des_path as $path){?>
									<img width="94" height="85px" src="<?= "/upload/products/product_".$list['id'].'/' . $path; ?>">
								<?}?></td>
								<td><?=number_format($list['price'], 0, ',', '.').'đ'; ?></td>
								<td><?=number_format($list['discount'], 0, ',', '.').'đ'; ?></td>
								<td><?= $list['code_product']; ?></td>
								<td><?= $list['quantity']; ?></td>
								<td>
								<?foreach($list_manufacturer as $list_manu){
									if($list_manu->id==$list['manufacturer_id']){
										echo $list_manu->name;
									}
								}?>
							</td>
								<td><?foreach($list_category as $list_cate){ 
									if($list_cate->id==$list['category']){
										echo $list_cate->name;
									}
								}?></td>
								<td><?= $list['model']; ?></td>
								<td><?= $list['create_date']; ?></td>
								<td><?= $list['update_date']; ?></td>
								<td><? if ($list['status'] == 0) echo 'Ẩn';
									else echo 'Hiện' ?></td>
								<td><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="location.href='/admin/product/edit?id=<? echo $list['id'] ?>'"><i class="fa fa-edit"></i></button></td>
							</tr>
						<? }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
