<?php //netteCache[01]000406a:2:{s:4:"time";s:21:"0.03964600 1357809585";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"/Users/jan/WEB/Nette-CKEditor-master/adrcup/app/administrace/templates/@layout.latte";i:2;i:1355824563;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/jan/WEB/Nette-CKEditor-master/adrcup/app/administrace/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '2zeyf8gqd3')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb07cd0336e8_title')) { function _lb07cd0336e8_title($_l, $_args) { extract($_args)
?>Adrenalincup<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb4037f6b61b_head')) { function _lb4037f6b61b_head($_l, $_args) { extract($_args)
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

        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/ckeditor/adapters/jquery.js"></script>        
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jstree/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jstree/jquery.hotkeys.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jstree/jquery.jstree.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui-min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.zclip.min.js"></script>
<script src="<?php echo htmlSpecialChars($basePath) ?>/js/lightbox.js"></script>
<link href="<?php echo htmlSpecialChars($basePath) ?>/css/lightbox.css" rel="stylesheet" />

        <link type="text/css" rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/jstree/syntax/!style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/jstree/!style.css" />
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/css/jstree/syntax/!script.js"></script>
        <script src="<?php echo htmlSpecialChars($baseUrl) ?>/js/fileuploader.js" type="text/javascript"></script>
<!--        <script type="text/javascript">
        $(document).ready(function() {
            
              $(".menu-item").each(function() {   
 
                if (this.href == window.location.href) {
                    
                    $(this).parent().attr("id", "selected");
                }
            });
        });
            
        
        </script>-->
        <script>  
        function loadPhotos(){            
            var id = $("#hidden_id").text(); 
            $("body").addClass("loading");
            $("#photos-to-upload").text(" ");
            $.get('/administrace/homepage/reloadPhotos?article_id='+id, function(data) {                
                for(var i in data.photos){
                     $("#photos-to-upload")                      
                     .append('<div class="image_wrapper" id="wrapper_'+data.photos[i]+'">\n\
                                <div id="copy_'+data.photos[i]+'">\n\
                                    <a href=/images/galerie/'+id+'/800'+data.photos[i]+' rel=lightbox[roadtrip]><img src=/images/galerie/'+id+'/140'+data.photos[i]+' class="pic" id="pic_'+i+'" /></a>\n\
                                </div>\n\
                                <div class="transbox" id="transbox_'+i+'">\n\
                                <a href="#"  title="Odstranit">\n\
                                <img src="/images/delete.png" id="delete_img_'+data.photos[i]+'" class="delete_img" alt="Odstranit">\n\
                                </a><a href="#"  title="Kopírovat">\n\
                                <img src="/images/copy.png" id="copy_img_'+data.photos[i]+'" class="copy_img"  alt="Kopírovat" style="float:right;">\n\
                                </a>\n\
                                </div>\n\
                                </div>'    
                             );
                }
            })
            .complete(function() {
                $("body").removeClass("loading"); 
                
            $(".pic").hover(function () {
                                        var id_obr = "#transbox_" + $(this).attr('id').replace("pic_",""); 
                                        $(id_obr).css("display", "block").fadeIn();
                              },
                              function () {
                                        var id_obr = "#transbox_" + $(this).attr('id').replace("pic_",""); 
                                        $(id_obr).css("display", "none");
                              });
            $(".transbox").hover(function () {
                                         var id_obr = "#"+$(this).attr('id');
                                        $(id_obr).css("display", "block").fadeIn();
                              },
                              function () {
                                         var id_obr = "#"+$(this).attr('id');
                                        $(id_obr).css("display", "none");
                              });
                              
            $(".delete_img").click(function(){
                                 
                                  var id = $(this).attr('id').replace("delete_img_","");
                                  
                                  $.ajax({
                                            async : false,
                                            type: 'POST',
                                            url: '/json/deleteImage',
                                            data : { 
                                                    "image_id" : id
                                                    }, 
                                            complete : function () {
                                               var id_wrapper = "#wrapper_"+id;
                                               loadPhotos();
                                                
                                            }
                                        });
                               });                  
            $(".copy_img").click(function(){
                                var id = $(this).attr('id').replace("copy_img_","");
                                var obr = "#copy_"+id;
                                    $(this).zclip({
                                        path:'js/ZeroClipboard.swf',
                                        copy:$(obr).html()
                                    });
                                });
            });
            
            
            
        }
             
        function selectFileInTree(id){
            $("#content").css("visibility", "visible");
            $.get('/administrace/homepage/getByTreeId?treeId='+id, function(data) {
                            $("#frmtaskForm-title_cz").val(data.title_cz);
                            $("#frmtaskForm-title_en").val(data.title_en);
                            $("#frmtaskForm-text_cz").val(data.text_cz);
                            $("#frmtaskForm-text_en").val(data.text_en);
                            $("#hidden_id").text(data.hidden_id);
                            $("#photos-to-upload").text(" ");
                            //loadPhotos();
                        })
                        .complete(function() { 
                            loadPhotos();                                                       
                        });
        } 
        
        function selectFolderInTree(){
            $("#content").css("visibility", "hidden");
        }            
        $(document).ready(function() {
            $("#frmform-odeslat").attr("disabled", "disabled");
            
            $(".menu-item").each(function(index) {   
                var longhref = window.location.href;
                
                if(longhref.indexOf(this.href) >= 0){
                    //alert("hura");
                }
                if(longhref.indexOf(this.href) >= 0){
                    $(".menu-item").each(function() {
                        $(this).parent().attr("id", "");
                    });
                    $(this).parent().attr("id", "selected");
                }
            });
            $("#logout-button").click(function(){
                window.location.href = "/administrace/homepage/logout";
            });
        });
        function createUploader(){            
            var uploader = new qq.FileUploader({
                element: document.getElementById('file-uploader-demo1'),
                action: '/upload/upload.php',
                debug: false,
                sizeLimit: 2097152,
                allowedExtensions: ['jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF'],
                onComplete: function(id, fileName, responseJSON){
                    $("#frmform-odeslat").removeAttr("disabled", "disabled");
                }
            });              
        }
         window.onload = createUploader;        
        </script> 

	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    </head>

    <body>

    <!--<script> document.body.className+=' js' </script>-->
        <div id="dhead">

            <div id="main-menu">
                <div class="menu-item-wrapper"><a class="menu-item" href="/administrace/">Obsah</a></div>
                <div class="menu-item-wrapper"><a class="menu-item" href="/administrace/registrace/">Registrace</a></div>
                <div class="menu-item-wrapper"><a class="menu-item" href="/administrace/eshop/">eShop</a></div>
                <div id="main-header">
<?php if ($user->isLoggedIn()): ?>
                    <img src="/images/user_lock.png" width="30" /> <?php echo Nette\Templating\Helpers::escapeHtml($user->identity->name, ENT_NOQUOTES) ?>

                    <input type="button" value="Odhlásit" class="button edit" id="logout-button" />
<?php endif ?>
                 
            </div>
            </div>
            
        </div>
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
        <span id="hidden_id" style="display: none"></span>
         <div class="modal"><!-- Place at bottom of page --></div>
    </body>
</html>
