@extends("template")

@section("main")
<h2>Register</h2>

<? if(count($errors)): ?>
<div class="errors">
	<ul>
		<? foreach($errors->all() as $err): ?>
			<li><?= $err ?></li>
		<? endforeach; ?>
	</ul>
</div>
<? endif; ?>

<form action="<?= URL::to('user/register') ?>" method="post">

	<input type="hidden" name="_token" value="<?= csrf_token() ?>">

	<input type="text" name="name" required placeholder="Your Name"><br>
	<input type="email" name="email" required placeholder="Your Email"><br>
	<input type="password" name="password" required placeholder="Password"><br>
	<input type="password" name="password_again" required placeholder="Password Again">

	<br><br>

	<input type="submit" value="Register">
	<a href='<?= URL::to('user/login') ?>'>Login</a>
</form>
@stop