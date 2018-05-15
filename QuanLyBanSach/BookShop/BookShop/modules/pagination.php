<link rel="stylesheet" href="../css/pag.css">

<div class="container">
    <ul class="pagination" id="mypage">
        <li class="disabled"><a href="#">«</a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
    </ul>
</div>

<script>
    // Add active class to the current button (highlight it)

    $('#mypage').find('li').click(function (e) {
        $('#mypage').find('li').removeClass('active');
        //$('[name="httt"]').val($(this).data('val'));
        //alert($(this).data('val'));
        $(this).addClass('active');
        return false
            ;
    });
</script>