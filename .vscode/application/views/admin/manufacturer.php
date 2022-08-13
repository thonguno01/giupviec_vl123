<main>
	<div class="container-fluid px-2">
		<h1 class="mt-2">Manufacturer</h1>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
			<li class="breadcrumb-item active">Manufacturer</li>
		</ol>
		<div class="card mb-2">
			<div class="card-body">
				<h1>This is page content</h1>
				<a href="/admin/manufacturer/add">Thêm mới</a>
				<table data-toolbar="#toolbar" data-toggle="table" class="table table-hover" id="manufacturer">
					<thead style="background: #f1f4f7;">
						<tr>
							<th data-field="name" data-sortable="true">Name</th>
							<th data-field="status" data-sortable="true">Status</th>
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
										<a href="/admin/manufacturer/edit?id=<? echo $list['id'] ?>" class="btn btn-primary" style="padding: 4px 6px;"><i class="glyphicon glyphicon-pencil"></i></a>
									</td>
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
