<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/datatables.min.css'); ?>">
	<title>List Member</title>
</head>
<body>

			<div>
					<table>
						<thead >
							<tr>
								<th>
									<span></i>ID</span>
								</th>
								<th>
									<span>Usename</span>
								</th>
								<th>
									<span >Address</span>
								</th>
								<th>
									<span >Email</span>
								</th>
								<th>
									<span >Action</span>
								</th>
							</tr>
						</thead>
						<tbody>
						<? foreach ($list_member as $member) : ?>
							<tr>
								<td><strong><?= $member['ID']; ?></strong></td>
								<td><?= $member['username']; ?></td>
								<td><?= $member['email']; ?></td>
								<td><?= $member['password']; ?></td>
								<td>
									<div class="btn-group">
										<a href="<?= base_url('/index.php/member/edit/' . $member['ID']); ?>" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i></a>
										<a href="<?= base_url('/index.php/member/add/' . $member['ID']); ?>" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i></a>

										<a href="<?= base_url('/index.php/member/delete/' . $member['ID']); ?>" class="btn btn-dark btn-sm"><i class="fa fa-trash"></i></a>
									</div>
								</td>
							</tr>
						<? endforeach; ?>
						</tbody>
					</table>
				</div>

</body>
</html>