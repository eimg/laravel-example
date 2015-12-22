@extends("template")

@section("main")
<? if(session('info')): ?>
<div class="info">
	<?= session('info') ?>
</div>
<? endif; ?>

<form action="<?= URL::to('user/profile') ?>" method="post">

	<input type="hidden" name="_token" value="<?= csrf_token() ?>">

	<input type="text" name="name" required value="<?= $name ?>">
	Name<br>
	<input type="email" name="email" required value="<?= $email ?>">
	Email<br><br>
	<input type="text" name="phone" value="<?= $phone ?>">
	Phone<br>

	<input type="text" name="address" value="<?= $address ?>">
	Address

	<br><br>
	<input type="password" name="password">
	Password
	<br><br>

	<input type="submit" value="Update">
	
	<br><br>

	<a href="<?= URL::to("user/logout") ?>">Logout</a> |
	<a href='<?= URL::to("user/delete/$id") ?>'>Delete Account</a>
</form>
@stop