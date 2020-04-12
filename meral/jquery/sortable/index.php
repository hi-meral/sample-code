<html> 
<head> 

    <!--<script src="./js/jquery.min.js" type="text/javascript"></script> -->
    <!--<script src="./js/jquery-ui.min.js" type="text/javascript"></script> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>

</head> 
<style>
	#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
	#sortable .item { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em;  border:1px solid red; }
        .item .remove{ float:right;}
        .item .up{ float:right;}
        .item .down{ float:right;}
</style>
	
<a href='#' onclick='add_sub(); return false;'>Add new div</a>

<div class="demo">

    <div id="sortable">
        <?php $m=1; ?>
            <?php for(; $m<=7; $m++) { ?>
            <div class="item" id="<?php echo $m; ?>" ><span class="show_hide" >*</span><span class="sort">Item <?php echo $m; ?> </span><span class="remove" > | Delete</span><span class="up"> | Up  </span><span class="down"> | Down </span>
    
            <div style="border:1px solid green; height:50px;display:none;" id="sub<?php echo $m; ?>"  >
                
            </div>
            </div>
            <?php } ?>

    </div>
</div><!-- End demo -->


<script>
	$(function() {
		$( "#sortable" ).sortable({
                    update: function(event, ui)
                    {
                        saveNow(this);
                    },
                    handle : '.sort'
                });
	});
        
        $(".item .remove").live('click', function() {
                $(this).closest('.item').remove();
                 saveNow("#sortable");
        });
        
        $('.up').click(function(){
            var current = $(this).parent()
            current.prev().before(current);
            saveNow("#sortable");
        });
        
        $('.down').click(function(){
          var current = $(this).parent();
              current.next().after(current);
              saveNow("#sortable");
        });
        
       showH();
        
        function saveNow(ele)
        {
            var result = $(ele).sortable('toArray');
            alert(result);
        }
        var counter = <?php echo $m; ?>;
        function add_sub() {
                var nid = counter++;
		//var contents = '<div class="item" id="'+ nid +'" ><span>*</span>Item '+ nid +' <span class="remove" > | Delete</span><span id="b'+ nid +'" class="up"> | Up  </span><span id="a'+ nid +'" class="down"> | Down </span></div> ';
                var contents = '<div class="item" id="'+ nid +'" ><span class="show_hide" >*</span><span class="sort">Item '+ nid +' </span><span class="remove" > | Delete</span><span class="up"> | Up  </span><span class="down"> | Down </span><div style="border:1px solid green; height:50px;display:none;" id="sub'+ nid +'" ></div></div>'
		$('#sortable').append(contents);
                
                $('#'+nid +' .up').click(function(){
                    var current = $(this).parent()
                    current.prev().before(current);
                    saveNow("#sortable");
                });
                
                $('#'+nid + ' .down').click(function(){
                  var current = $(this).parent();
                      current.next().after(current);
                        saveNow("#sortable");
                });
                
                //$('#sortable').sortable("refresh");
                saveNow("#sortable");
                showH();
		
	}
        
        function showH()
        {
            $('.show_hide').click(function(){
               var pid = $(this).parent().attr('id');
               $('#sub'+pid).toggle();
            });
        }
        
        
        
        
	</script>