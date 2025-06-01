<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	$link = "https";
else
	$link = "http";

$link .= "://";

$link .= $_SERVER['HTTP_HOST'];