<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/font-awesome.min.css'); ?>">
	<title>Edit Member</title>
</head>
<body>
					<form action="<?= base_url('/index.php/member/update/' . $member['ID']); ?>" method="post">
						<div>
							<h5><i class="fa fa-plus-circle mr-1"></i> Edit Member</h5>
								<label>Username</label>
								<input type="text" name="username" placeholder="Username" class="form-control"  value="<?= $member['username']; ?>">
								<label>Email</label>
								<input type="email" name="email" placeholder="Email" class="form-control" value="<?= $member['email']; ?>">
								<label>password</label>
								<input name="password"  placeholder="password"><?= $member['password']; ?></textarea>
									<button type="submit" class="btn btn-dark">Save</button>
									<a href="<?= base_url(); ?>" class="btn btn-outline-dark">Cancel</a>
								</div>
					</form>
</body>
</html>