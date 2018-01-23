<?php

namespace Banana\htmlHelper;

class htmlHelper {
	public static funtion loadCss($file)
	{
		return '<link rel="stylesheet" href="'__DIR__'././'.$file.'">';
	}
}