<footer class="text-center" style="margin-top: 160px; margin-bottom: 20px">
    <p class="copyright">Copyright&nbsp;©&nbsp;2021 Powered by <code>SSS.MS</code></p>
</footer>


<script type="text/javascript">
    if($.cookie('time')){
        $("#time").val($.cookie('time'));
    }
    $("#time").change(function(){
        var time = $(this).val();
        $.cookie('time', time);
        <?php if(!isset($_SESSION['is_login']) && !$_SESSION['is_login']){ ?>
        if(time == 'forever'){
            alert('需要登陆后才可以能选择');
            $(this).val("7d");
            return ;
        }
        <?php } ?>
        
    });

</script>

</body>
</html>