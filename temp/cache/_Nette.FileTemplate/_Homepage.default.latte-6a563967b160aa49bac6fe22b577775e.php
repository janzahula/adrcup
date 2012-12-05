<?php //netteCache[01]000395a:2:{s:4:"time";s:21:"0.67165900 1354291489";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:73:"/Users/jan/WEB/Nette-CKEditor-master/app/templates/Homepage/default.latte";i:2;i:1354291487;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/jan/WEB/Nette-CKEditor-master/app/templates/Homepage/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'omet01agrc')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb369fdd798f_content')) { function _lb369fdd798f_content($_l, $_args) { extract($_args)
;Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("taskForm") ? "taskForm" : $_control["taskForm"]), array()) ?>

<!-- Jednoduché vykreslení chyb -->
<?php if ($form->hasErrors()): ?><ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error): ?>    <li><?php echo Nette\Templating\Helpers::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; endforeach ?>
</ul>
<?php endif ?>
<table>
    <tr class="required">
        <th><?php if ($_label = $_form["title_cz"]->getLabel()) echo $_label->addAttributes(array()) ?></th>
        <td><?php echo $_form["title_cz"]->getControl()->addAttributes(array()) ?></td>
    </tr>

    <tr class="required">
        <th><?php if ($_label = $_form["title_en"]->getLabel()) echo $_label->addAttributes(array()) ?></th>
        <td><?php echo $_form["title_en"]->getControl()->addAttributes(array()) ?></td>
    </tr>
</table>
<div class="required">
    <br />
    <p><b> Text česky</b></p>
     
    <?php echo $_form["text_cz"]->getControl()->addAttributes(array()) ?>

</div>
<div class="required">
<br />
<p><b> Text anglicky</b></p>

       <?php echo $_form["text_en"]->getControl()->addAttributes(array()) ?>

</div>
<br />
 
<div >
    
    <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

    
</div>


<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;
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