<?php //netteCache[01]000398a:2:{s:4:"time";s:21:"0.03249600 1354876030";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:76:"/Users/jan/WEB/Nette-CKEditor-master/adrcup/app/templates/Json/default.latte";i:2;i:1353421746;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/jan/WEB/Nette-CKEditor-master/adrcup/app/templates/Json/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 't85ptz7ru6')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb12699271f4_content')) { function _lb12699271f4_content($_l, $_args) { extract($_args)
;echo Nette\Templating\Helpers::escapeHtml($json, ENT_NOQUOTES) ?>

 
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = '@json.latte'; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 