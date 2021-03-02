<?php
	header("content-type:image/png");
	session_start();

	require "vendor/autoload.php";

	use Gregwar\Captcha\CaptchaBuilder;

	$builder = new CaptchaBuilder(4);

	// 可以设置图片宽高及字体
	$builder->build($width = 100, $height = 30, $font = null);

	$_SESSION['vstr'] = $builder->getPhrase();

	$builder->output();
?>