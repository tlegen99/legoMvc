<?php include ROOT.'/views/layouts/_header.php'; ?>
	<section>
		<div class="container">
			<div class="row">
				<form action="#" method="POST">
				  <div class="form-group">
				    <label for="name">Логин:</label>
				    <input name="login" type="text" class="form-control" id="name" value="<?= $name; ?>">
				  </div>
				  <div class="form-group">
				    <label for="pwd">Пароль:</label>
				    <input name="password" type="password" class="form-control" id="pwd" value="<?= $password; ?>">
				  </div>
				  <input name="submit" type="submit" class="btn btn-primary" value="Войти">
				</form>
			</div>
		</div>
	</section>
<?php include ROOT.'/views/layouts/_footer.php'; ?>
