<html>
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#sortable .item").append('<div class="sort control">S</div><div class="copy control">C</div><div class="remove control">R</div>');
            $("#sortable").sortable({
                handle : '.item',
                placeholder: 'placeholder'
            }).disableSelection();
            $(".item").draggable({
                connectToSortable: '#sortable',
                handle: '.copy',        
                helper: 'clone',   
                placeholder: 'placeholder'             
            });
            $(".item .remove").live('click', function() {
                $(this).closest('.item').remove()
            });                     
        });
    </script>
    <style type="text/css">
        #sortable {
            width: 200px;
            margin: 0 auto;
        }
        .item {
            background-color: #CC9;
            height: 50px;
            margin-bottom: 10px;
            position: relative;
        }   
        .control {
            cursor: move;
            position: absolute;         
            top: 0;         
            width: 30px;
            height: 50px;
        }
        .sort {
            right: 60px;
            background-color:#F00;          
        }
        .copy {         
            right: 30px;            
            background-color:#0F0;          
        }
        .remove {   
            cursor: default;
            right: 0px;         
            background-color:#0FF;          
        }
        
        .placeholder {
            height: 50px;
            margin-bottom: 10px;
            width: 100%;
            background-color: #000;
        }
    </style>
</head>
<body>
<div id="sortable">
    <div class="item" style="background-color:#6FF">One</div>
    <div class="item" style="background-color:#6F6">Two</div>
    <div class="item" style="background-color:#FF9">Three</div>
    <div class="item" style="background-color:#F9F">Four</div>
</div>
</body>