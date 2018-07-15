    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                        <a class="logo" href="#"><img src="https://indefiniteloop.com/blog/img/posts/15-09-2015/logo2.jpg" alt="Logo Image"></a>                      
                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->

                <div class="col-lg-4 col-md-6">
                        <div class="footer-section">
                        <h4 class="title"><b>CATAGORIES</b></h4>
                        <span id="content">
                            
                        </span>
                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->             

            </div><!-- row -->
        </div><!-- container -->
    </footer>


@section('footer-script')
    <script type="text/javascript">
        $(function() {
            $.ajax({
                type: "GET",
                url: '{{ URL::to("comment/ajax_category_footer") }} ',
                dataType: 'json',
                success: function(data){
                    $("#content").html(data.content);
                }
            });
        });
    </script>
@endsection