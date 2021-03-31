<?php get_header(); ?>

<!-- 页面主要内容 start -->
<style>
	.form-signin {
		width: 100%;
		max-width: 420px;
		padding: 30px;
		margin: 80px auto;
		background-color: #fff6db;
		border-radius: 8px;
	}

	.form-label-group {
		position: relative;
		margin-bottom: 1rem;
	}

	.form-label-group input,
	.form-label-group label {
		height: 3.125rem;
		padding: .75rem;
	}

	.form-label-group label {
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		width: 100%;
		margin-bottom: 0;
		/* Override default `<label>` margin */
		line-height: 1.5;
		color: #495057;
		pointer-events: none;
		cursor: text;
		/* Match the input under the label */
		border: 1px solid transparent;
		border-radius: .25rem;
		transition: all .1s ease-in-out;
	}

	.form-label-group input::-webkit-input-placeholder {
		color: transparent;
	}

	.form-label-group input::-moz-placeholder {
		color: transparent;
	}

	.form-label-group input:-ms-input-placeholder {
		color: transparent;
	}

	.form-label-group input::-ms-input-placeholder {
		color: transparent;
	}

	.form-label-group input::placeholder {
		color: transparent;
	}

	.form-label-group input:not(:-moz-placeholder-shown) {
		padding-top: 1.25rem;
		padding-bottom: .25rem;
	}

	.form-label-group input:not(:-ms-input-placeholder) {
		padding-top: 1.25rem;
		padding-bottom: .25rem;
	}

	.form-label-group input:not(:placeholder-shown) {
		padding-top: 1.25rem;
		padding-bottom: .25rem;
	}

	.form-label-group input:not(:-moz-placeholder-shown)~label {
		padding-top: .25rem;
		padding-bottom: .25rem;
		font-size: 12px;
		color: #777;
	}

	.form-label-group input:not(:-ms-input-placeholder)~label {
		padding-top: .25rem;
		padding-bottom: .25rem;
		font-size: 12px;
		color: #777;
	}

	.form-label-group input:not(:placeholder-shown)~label {
		padding-top: .25rem;
		padding-bottom: .25rem;
		font-size: 12px;
		color: #777;
	}

	.form-label-group input:-webkit-autofill~label {
		padding-top: .25rem;
		padding-bottom: .25rem;
		font-size: 12px;
		color: #777;
	}

	/* Fallback for Edge
-------------------------------------------------- */
	@supports (-ms-ime-align: auto) {
		.form-label-group {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column-reverse;
			flex-direction: column-reverse;
		}

		.form-label-group label {
			position: static;
		}

		.form-label-group input::-ms-input-placeholder {
			color: #777;
		}
	}
</style>
<div class="container">
	<form class="form-signin" method="POST">
		<div class="text-center mb-4">
			<h1 class="h3 mb-3 font-weight-normal">免费注册账号</h1>
			<p>已有有账号，请 <a href="?a=login">登录</a></p>
		</div>

		<div class="form-label-group">
			<input type="text" id="inputUsername" name="username" class="form-control" pattern="[A-Za-z0-9]{4,12}" placeholder="用户名" required autofocus>
			<label for="inputUsername">用户名</label>
			<small class="form-text text-muted">
				仅支持字母开头的4-12位字符
			</small>
		</div>

		<div class="form-label-group">
			<input type="password" id="inputPassword" name="password" class="form-control" pattern="[A-Za-z0-9]{4,12}" placeholder="密码" required>
			<label for="inputPassword">密码</label>
			<small class="form-text text-muted">
				密码长度应该在6-21位之间
			</small>
		</div>
		<div class="form-label-group">
			<input type="password" id="inputPassword" name="password1" class="form-control" placeholder="重复密码">
			<label for="inputPassword">重复密码</label>
		</div>

		<button class="btn btn-lg btn-primary btn-block" type="submit">立即登录</button>
	</form>

</div>
<!-- 页面主要内容 end -->

<?php get_footer(); ?>