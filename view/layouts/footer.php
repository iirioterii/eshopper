<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-right">Copyright © 2015</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->


<script src="/view/assets/js/jquery.js"></script>
<script src="/view/assets/js/jquery.cycle2.min.js"></script>
<script src="/view/assets/js/jquery.cycle2.carousel.min.js"></script>

<script src="/view/assets/js/bootstrap.min.js"></script>
<script src="/view/assets/js/jquery.scrollUp.min.js"></script>
<script src="/view/assets/js/price-range.js"></script>
<script src="/view/assets/js/jquery.prettyPhoto.js"></script>
<script src="/view/assets/js/main.js"></script>



<script>
    $(document).ready(function() {
        $(".add-to-cart").click(function() {
            var id = $(this).attr("data-id");
            $.post("/cart/ajaxAdd/"+id, {}, function(data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>