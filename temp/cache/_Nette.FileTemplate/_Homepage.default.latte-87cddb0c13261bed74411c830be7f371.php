<?php //netteCache[01]000402a:2:{s:4:"time";s:21:"0.49756500 1357809453";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:80:"/Users/jan/WEB/Nette-CKEditor-master/adrcup/app/templates/Homepage/default.latte";i:2;i:1354898204;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/jan/WEB/Nette-CKEditor-master/adrcup/app/templates/Homepage/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 's7zs8oq6i2')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb49023bc6f2_content')) { function _lb49023bc6f2_content($_l, $_args) { extract($_args)
?><div id="demo_body">
<?php $iterations = 0; foreach ($flashes as $flash): ?>    <div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>



    <div id="container" class="my-shadow">


        <div id="content">
            <input type="button" value="Nahrát fotografie" class="button upload" id="open-file-upload-dialog" />
            <hr />
            <div id="photos-to-upload">

            </div>

            <hr />
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("taskForm") ? "taskForm" : $_control["taskForm"]), array()) ?>

<!-- Jednoduché vykreslení chyb -->
<?php if ($form->hasErrors()): ?>            <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error): ?>                <li><?php echo Nette\Templating\Helpers::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; endforeach ?>
            </ul>
<?php endif ?>
            <table>
                <tr class="required">
                    <th><?php echo $_form["title_cz"]->getControl()->addAttributes(array()) ?></th>
                    <td><?php if ($_label = $_form["title_cz"]->getLabel()) echo $_label->addAttributes(array()) ?></td>
                </tr>

                <tr class="required">
                    <th><?php echo $_form["title_en"]->getControl()->addAttributes(array()) ?></th>
                    <td><?php if ($_label = $_form["title_en"]->getLabel()) echo $_label->addAttributes(array()) ?></td>
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


<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>

        </div>

        <div id="description">
            <div id="mmenu" style="height: 130px;">
                <input type="button" id="add_folder" value="Nová složka" class="button add" />
                <input type="button" id="add_default" value="Nový soubor" class="button add" />
                <input type="button" id="rename" value="Přejmenovat" class="button edit" />
                <input type="button" id="remove" value="Odstranit" class="button delete" />

            </div>

<!-- the tree container (notice NOT an UL node) -->


            <div id="demo" class="demo"  ></div>

        </div>

    </div>

    <script type="text/javascript">
    $(function () {
    $("#demo")
            .bind("before.jstree", function (e, data) {
                    $("#alog").append(data.func + "<br />");
                      
            })
            .jstree({ 
                    // List of active plugins
                    "plugins" : [ 
                            "themes","json_data","ui","crrm","cookies","dnd","search","types" 
                    ],

                    // I usually configure the plugin that handles the data first
                    // This example uses JSON as it is most common
                    "json_data" : { 
                            // This tree is ajax enabled - as this is most common, and maybe a bit more complex
                            // All the options are almost the same as jQuery's AJAX (read the docs)
                            "ajax" : {
                                    // the URL to fetch the data
                                    "url" : "/json",
                                    // the `data` function is executed in the instance's scope
                                    // the parameter is the node being loaded 
                                    // (may be -1, 0, or undefined when loading the root nodes)
                                    "data" : function (n) { 
                                         
                                            return { 
                                                    "operation" : "get_children", 
                                                    "id" : n.attr ? n.attr("id").replace("node_","") : 1 
                                            }; 
                                    }                                    
                            }
                    },
                    // Configuring the search plugin
                        
                    // Using types - most of the time this is an overkill
                    // read the docs carefully to decide whether you need types
                    "types" : {
                            // I set both options to -2, as I do not need depth and children count checking
                            // Those two checks may slow jstree a lot, so use only when needed
                            "max_depth" : 4,
                            "max_children" : -2,
                            // I want only `drive` nodes to be root nodes 
                            // This will prevent moving or creating any other type as a root node
                            "valid_children" : [ "drive" ],
                            "types" : {
                                    // The default type
                                    "default" : {
                                            // I want this type to have no children (so only leaf nodes)
                                            // In my case - those are files
                                            "valid_children" : "none",
                                            // If we specify an icon for the default type it WILL OVERRIDE the theme icons
                                            "icon" : {
                                                    "image" : "/images/file.png"
                                            }
                                    },
                                    // The `folder` type
                                    "folder" : {
                                            // can have files and other folders inside of it, but NOT `drive` nodes
                                            "valid_children" : [ "default", "folder" ],
                                            "icon" : {
                                                    "image" : "/images/folder.png"
                                            }
                                    },
                                    // The `drive` nodes 
                                    "drive" : {
                                            // can have files and folders inside, but NOT other `drive` nodes
                                            "valid_children" : [ "default", "folder" ],
                                            "icon" : {
                                                    "image" : "/images/root.png"
                                            },
                                            // those prevent the functions with the same name to be used on `drive` nodes
                                            // internally the `before` event is used
                                            "start_drag" : false,
                                            "move_node" : false,
                                            "delete_node" : false,
                                            "remove" : false
                                    }
                            }
                    },
                    // UI & core - the nodes to initially select and open will be overwritten by the cookie plugin

                    // the UI plugin - it handles selecting/deselecting/hovering nodes
                    "ui" : {
                            // this makes the node with ID node_4 selected onload
                            "initially_select" : [ "node_4" ]
                    },
                    // the core plugin - not many options here
                    "core" : { 
                            // just open those two nodes up
                            // as this is an AJAX enabled tree, both will be downloaded from the server
                            "initially_open" : [ "node_2" , "node_3" ] 
                    }
            })
            .bind("create.jstree", function (e, data) {                      
                    $.post(
                            "/json", 
                            { 
                                    "operation" : "create_node", 
                                    "id" : data.rslt.parent.attr("id").replace("node_",""), 
                                    "position" : data.rslt.position,
                                    "title" : data.rslt.name,
                                    "type" : data.rslt.obj.attr("rel")
                            }, 
                            function (r) {                                
                                    if(r.status) {                                                   
                                            $(data.rslt.obj).attr("id", "node_" + r.id);
                                            if(data.rslt.obj.attr("rel") == "default"){                                                                                                             
                                               $.ajax({
                                                    async : false,
                                                    type: 'POST',
                                                    url: '/json/createFile',
                                                    data : { 
                                                            "node_id" : data.rslt.obj.attr("id").replace("node_",""),
                                                            "title" : data.rslt.name
                                                    }
                                                });                                                        
                                            }                                                    
                                    }else{                                      
                                            $.jstree.rollback(data.rlbk);
                                         }   
                                    }                             
                    );
            })                                      
                                        
            .bind("remove.jstree", function (e, data) {    
                         
                data.rslt.obj.each(function () {
                            $.ajax({
                                    async : false,
                                    type: 'POST',
                                    url: "/json",
                                    data : { 
                                            "operation" : "remove_node", 
                                            "id" : this.id.replace("node_",""),
                                            "type" : data.rslt.obj.attr("rel")
                                    }, 
                                    success : function (r) {
                                            if(!r.status) {
                                                    data.inst.refresh();
                                            }
                                    }
                            });
                    });                            
            })
            .bind("rename.jstree", function (e, data) {
                    $.post(
                            "/json", 
                            { 
                                    "operation" : "rename_node", 
                                    "id" : data.rslt.obj.attr("id").replace("node_",""),
                                    "title" : data.rslt.new_name
                            }, 
                            function (r) {
                                    $.ajax({
                                        async : false,
                                        type: 'POST',
                                        url: '/json/renameNode',
                                        data : { 
                                                "node_id" : data.rslt.obj.attr("id").replace("node_",""),
                                                "title" : data.rslt.new_name
                                        }
                                    });
                                    $("#frmtaskForm-title_cz").val(data.rslt.new_name);
                                    if(!r.status) {
                                            $.jstree.rollback(data.rlbk);
                                    }
                            }
                    );
            })
            .bind("move_node.jstree", function (e, data) {
                    data.rslt.o.each(function (i) {
                            $.ajax({
                                    async : false,
                                    type: 'POST',
                                    url: "/json",
                                    data : { 
                                            "operation" : "move_node", 
                                            "id" : $(this).attr("id").replace("node_",""), 
                                            "ref" : data.rslt.cr === -1 ? 1 : data.rslt.np.attr("id").replace("node_",""), 
                                            "position" : data.rslt.cp + i,
                                            "title" : data.rslt.name,
                                            "copy" : data.rslt.cy ? 1 : 0
                                    },
                                    success : function (r) {
                                            if(!r.status) {
                                                    $.jstree.rollback(data.rlbk);
                                            }
                                            else {
                                                    $(data.rslt.oc).attr("id", "node_" + r.id);
                                                    if(data.rslt.cy && $(data.rslt.oc).children("UL").length) {
                                                            data.inst.refresh(data.inst._get_parent(data.rslt.oc));
                                                    }
                                            }
                                            $("#analyze").click();
                                    }
                            });
                    });
            })
            .bind("select_node.jstree", function (event, data) {
                if(data.rslt.obj.attr("rel") == "default"){
                    selectFileInTree(data.rslt.obj.attr("id").replace("node_",""));
                }else if (data.rslt.obj.attr("rel") == "folder" || data.rslt.obj.attr("rel") == "drive"){
                    selectFolderInTree();
                }
                        
            });                                          
    });
    </script>
    <script type="text/javascript" >
    // Code for the menu buttons
    $(function () { 
                
            $("#mmenu input").click(function () {
                    switch(this.id) {
                            case "add_default":
                            case "add_folder":
                                   
                                    $("#demo").jstree("create", null, "last", { "attr" : { "rel" : this.id.toString().replace("add_", "") } });
                                     
                                    break;
                            case "search":
                                    $("#demo").jstree("search", document.getElementById("text").value);
                                    break;
                            case "text": break;
                            case "remove" :
                                    $("#dialog-confirm").css("visibility",  "visible");
                                    $( "#dialog-confirm" ).dialog({
                                           resizable: false,
                                           show : 'fade',
                                           hide : 'fade',   
                                           height:180,
                                           modal: true,
                                           buttons: {
                                               Cancel: function() {
                                                   $( this ).dialog( "close" );
                                               },
                                               "Ostranit": function() {
                                                   $("#demo").jstree("remove");
                                                   $( this ).dialog( "close" );
                                               }
                                           }
                                           });
                                                   
                                    break;
                            default:
                                    
                                    $("#demo").jstree(this.id);
                                    break;
                    }
            });
 
    });
            
             
    </script>

    <script type="text/javascript">
                        $("#open-file-upload-dialog").click(function(){
                            $( "#file-uploader-demo1" ).css("visibility", "visible");
                              $( "#file-uploader-demo1" ).dialog({
                                   resizable: false,
                                   show : 'fade',
                                   width: 303,    
                                   height:500,
                                   modal: true,
                                   buttons: {
                                       "Uložit": function(data) {                                                                                               
                                           var id = $("#hidden_id").text();                                                 
                                            $("body").addClass("loading");
                                           $.get('/administrace/homepage/saveGalleryForId?article_id='+id, function() {})
                                           .complete(function() { 
                                               loadPhotos();
                                                        
                                           });
                                           ;
                                                   
                                           $(".qq-upload-list").text(" ");
                                           $( this ).dialog( "close" );
                                                    
                                       },
                                       Cancel: function() {
                                           $.get('/administrace/homepage/notSaveGalleryForId', function() {});
                                           $(".qq-upload-list").text(" ");
                                           $( this ).dialog( "close" );
                                       }
                                   }
                                   });
                              $( "#file-uploader-demo1" ).dialog("open");
                        });
                        $("#frmtaskForm-create").click(function(){
                            $("body").addClass("loading");
                            $.ajax({
                                    async : false,
                                    type: 'POST',
                                    url: "/administrace/homepage/saveArticle",
                                    data : { 
                                            "article_id" : $("#hidden_id").text(), 
                                            "title_cz" : $("#frmtaskForm-title_cz").val(), 
                                            "title_en" : $("#frmtaskForm-title_en").val(),
                                            "text_cz" : $("#frmtaskForm-text_cz").val(),
                                            "text_en" : $("#frmtaskForm-text_en").val()
                                    },
                                    success : function (r) {
                                            location.reload();
                                    }, 
                                    complete : function (r) {
                                        $("body").removeClass("loading");
                                    }
                            });
                        });
                                


    </script>

</div>
<div id="dialog-confirm" title="Odstranit položku?" style="visibility: hidden">
    <p ><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0; "></span>Tímto trvale odstraníte stránku z menu i jejím obsahem!</p>
</div>
<div id="file-uploader-demo1" style="visibility: hidden" title="Nahrávání fotografií">		
    <noscript>			
    <p>Pro nahrávání fotografií je potřeba zapnout JavaScript.</p>

    </noscript>         
</div>



<?php
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