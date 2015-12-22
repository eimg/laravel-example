@extends("template")

@section("main")
<h2>Login</h2>

<? if(count($errors)): ?>
<div class="errors">
	<ul>
		<? foreach($errors->all() as $err): ?>
			<li><?= $err ?></li>
		<? endforeach; ?>
	</ul>
</div>
<? endif; ?>

<? if(session('info')): ?>
<div class="info">
	<?= session('info') ?>
</div>
<? endif; ?>

<form method="post" action="<?= URL::to('user/login') ?>">
	<input type="hidden" name="_token" value="<?= csrf_token() ?>">
	
	<input type="email" name="email" required placeholder="Your Email"><br>
	<input type="password" name="password" required placeholder="Password">

	<br><br>

	<input type="submit" value="Login">
	<a href='<?= URL::to('user/register') ?>'>Register</a>
</form>
@stop