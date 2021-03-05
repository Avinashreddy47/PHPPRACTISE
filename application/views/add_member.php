<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/font-awesome.min.css'); ?>">
	<title>Add Member</title>
</head>
<body>
					<form action="<?= base_url('/index.php/member/insert'); ?>" method="post">
							<h5>Add Member</h5>
						</div>
								<label>Username</label>
								<input type="text" name="username" placeholder="Username" class="form-control">
								<label>Email</label>
								<input type="email" name="email" placeholder="Email" class="form-control">
								<label>password</label>
								<input name="password" class="form-control" placeholder="password"></input>
							</div>
									<button type="submit" class="btn btn-dark">Add</button>
									<a href="<?= base_url(); ?>">Cancel</a>			
						</div>
					</form>
</body>
</html>