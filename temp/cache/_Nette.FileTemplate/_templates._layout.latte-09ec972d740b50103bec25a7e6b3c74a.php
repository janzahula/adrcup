<?php //netteCache[01]000402a:2:{s:4:"time";s:21:"0.58500300 1357849565";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:80:"/Users/jan/WEB/Nette-CKEditor-master/adrcup/app/frontend/templates/@layout.latte";i:2;i:1357849562;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/jan/WEB/Nette-CKEditor-master/adrcup/app/frontend/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '79whhk000m')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbafa665cd86_title')) { function _lbafa665cd86_title($_l, $_args) { extract($_args)
?>Adrenalincup<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb09b6bd5585_head')) { function _lb09b6bd5585_head($_l, $_args) { extract($_args)
;
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
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="description" content="Adrenalincup" />
<?php if (isset($robots)): ?>        <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

        <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?></title>

        <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" type="text/css" />
        <link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" type="text/css" />
        <link href="<?php echo htmlSpecialChars($baseUrl) ?>/css/fileuploader.css" rel="stylesheet" type="text/css" />	
        <link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" type="image/x-icon" />
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>


        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/lightbox.js"></script>
        <link href="<?php echo htmlSpecialChars($basePath) ?>/css/lightbox.css" rel="stylesheet" />

        <link type="text/css" rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/jstree/syntax/!style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/jstree/!style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/menu.css" />
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/css/jstree/syntax/!script.js"></script>
        <script src="<?php echo htmlSpecialChars($baseUrl) ?>/js/fileuploader.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($baseUrl) ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($baseUrl) ?>/js/jquery.easing.compatibility.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($baseUrl) ?>/js/cycle.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />

        <script>  
             $(document).ready(function() {
                 $('#banner').cycle({
                    fx:      'fade', 
                    speed:    2000, 
                    timeout:  0,
                    next:   '#button-next', 
                    prev:   '#button-prew' 
                });
                $('#banner').cycle({
                    fx:      'fade', 
                    speed:    2000, 
                    timeout:  2000
                   
                });
             });
        </script> 

	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    </head>

    <body>

    <!--<script> document.body.className+=' js' </script>-->
        <div id="dhead">

            <div id="main-menu">
                <img src="/images/button-prew.png" id="button-prew" />

<!--                <div class="menu-item-wrapper"><a class="menu-item" href="/administrace/">Obsahs</a></div>
                <div class="menu-item-wrapper"><a class="menu-item" href="/administrace/registrace/">Registrace</a></div>
                <div class="menu-item-wrapper"><a class="menu-item" href="/administrace/eshop/">eShop</a></div>-->

 <img src="/images/button-next.png" id="button-next" />
                <ul id="menu">



<?php $iterations = 0; foreach ($item->children as $first): if (!empty($first->children)): ?>
                    <li><a href="#" class="drop"><?php echo Nette\Templating\Helpers::escapeHtml($first->title_cz, ENT_NOQUOTES) ?></a>

<?php $w = 104*$first->numberOfColumns() ?>
                        <div class="dropdown_4columns" style="width: <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeCss($w)) ?>px" >    

<?php $iterations = 0; foreach ($first->children as $second): if ($second->type == 'folder' || $second->type == 'drive'): ?>
                                    <div class="col_1">
                                        <h3><?php echo Nette\Templating\Helpers::escapeHtml($second->title_cz, ENT_NOQUOTES) ?> </h3>
                                        <ul>

<?php $iterations = 0; foreach ($second->children as $third): ?>
                                            <li><a href="#"><?php echo Nette\Templating\Helpers::escapeHtml($third->title_cz, ENT_NOQUOTES) ?></a></li>
<?php $iterations++; endforeach ?>

                                        </ul>
                                    </div>


<?php endif ?>

<?php $iterations++; endforeach ?>
                            <div class="col_1">
                                
                                <ul>
                                     
<?php $iterations = 0; foreach ($first->children as $second_default): if ($second_default->type == 'default'): ?>
                            
                                    
                             
                                    <li><h4><a href="#"><?php echo Nette\Templating\Helpers::escapeHtml($second_default->title_cz, ENT_NOQUOTES) ?></a></h4></li>
                             
                             
                                
                            
                              
<?php endif ?>
                            
<?php $iterations++; endforeach ?>
                                    </ul>
                            </div>
                        </div>
                    </li>
<?php else: ?>
                    <li><a href="#" class="drop"><?php echo Nette\Templating\Helpers::escapeHtml($first->title_cz, ENT_NOQUOTES) ?></a></li>
<?php endif ;$iterations++; endforeach ?>




                </ul>








                <div id="main-header">




                   
                </div>
            </div>

        </div>
        <div id="banner">
            <img src="/images/banner1.png" style="width: 100%; min-width: 1200px;   z-index: 1" class="banner-image" />
            <img src="/images/banner2.jpg" style="width: 100%; min-width: 1200px;   z-index: 1" class="banner-image" />
            <img src="/images/banner3.jpg" style="width: 100%; min-width: 1200px;   z-index: 1" class="banner-image" />
            <img src="/images/banner4.jpg" style="width: 100%; min-width: 1200px;   z-index: 1" class="banner-image" />
        </div>
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
        <span id="hidden_id" style="display: none"></span>
         <div class="modal"><!-- Place at bottom of page --></div>
    </body>
</html>
