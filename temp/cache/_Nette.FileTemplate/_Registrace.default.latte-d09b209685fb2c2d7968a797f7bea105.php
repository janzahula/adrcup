<?php //netteCache[01]000417a:2:{s:4:"time";s:21:"0.66840000 1357809588";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:95:"/Users/jan/WEB/Nette-CKEditor-master/adrcup/app/administrace/templates/Registrace/default.latte";i:2;i:1355823587;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/jan/WEB/Nette-CKEditor-master/adrcup/app/administrace/templates/Registrace/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'zfqqsk7gdl')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb87a521aa17_content')) { function _lb87a521aa17_content($_l, $_args) { extract($_args)
;$iterations = 0; foreach ($flashes as $flash): ?><div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>

<div id="container" class="my-shadow">
    <a href="kompletni" style="text-decoration: none; display: inline-block"><input type="button" value="Kompletní" class="button edit" /></a>
    <a href="nekompletni" style="text-decoration: none; display: inline-block"><input type="button" value="Nekompletní" class="button edit" /></a>
    <a href="hledam" style="text-decoration: none; display: inline-block"><input type="button" value="Jednotlivec" class="button edit" /></a>
    <hr />
</div><?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 