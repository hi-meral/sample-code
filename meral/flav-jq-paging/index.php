<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./jquery.simplePagination.js"></script>
<script type="text/javascript">

$(function() {
    $('#paging').pagination({
        items: 100,
        itemsOnPage: 10,
        cssStyle: 'light-theme',
		onPageClick : function(page){ alert(page); }
    });
});

</script>

<link type="text/css" rel="stylesheet" href="./simplePagination.css"/>

<div id="paging" >




</div>
