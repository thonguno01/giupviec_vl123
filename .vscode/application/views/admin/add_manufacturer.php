<main>
	<div class="container-fluid px-2">
		<h1 class="mt-2">Manufacturer</h1>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="/admin/manufacturer">Manufacturer</a></li>
			<li class="breadcrumb-item active">add</li>
		</ol>
		<div class="card mb-2">
			<div class="card-body">
				<h1>Thêm mới danh mục</h1>
				<?php echo $this->session->flashdata('insert_status'); ?>
				<form method="post" action="/admin/manufacturer/add">
					<div class="form-group">
						<label for="manufacturer_name">Tên danh mục</label>
						<input type="text" class="form-control" id="manufacturer_name" name="manufacturer_name" placeholder="Nhập tên danh mục">
					</div>
					<?php echo form_error('manufacturer_name'); ?>
					<label for="status" style="margin-top: 20px">Trạng thái</label>
					<select class="form-control" id="status" name="status">
						<option value="1">Hiện</option>
						<option value="0">Ẩn</option>
					</select>
					<button type="submit" class="btn btn-primary" style="margin-top:20px">Submit</button>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
