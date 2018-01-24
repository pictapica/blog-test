<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="pull-right">
                <a href="#" class="fa fa-facebook-square fa-lg btn-md valign"></a>
                <a href="#" class="fa fa-google-plus-square fa-lg btn-md valign"></a>
                <a href="#" class="fa fa-twitter-square fa-lg btn-md valign"></a>
                <a href="#" class="fa fa-pinterest-square fa-lg btn-md valign"></a>
            </div>
        </div>
    </div>
</nav>
<script>
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
});
</script>

