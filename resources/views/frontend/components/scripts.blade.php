<script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".parentlevel").mouseenter(function () {
            $(this).find(".menulevel").css("display", "block");
        });

        $(".parentlevel").mouseleave(function () {
            $(this).find(".menulevel").css("display", "none");
        });

        $(".secondparentlevel").mouseenter(function () {
            $(this).find(".secondmenulevel").css("display", "block");
        });

        $(".secondparentlevel").mouseleave(function () {
            $(this).find(".secondmenulevel").css("display", "none");
        });






    });
</script>

<script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementsByClassName("category-header");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>


<!-- slick js-->
<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>

<!-- popper js-->
<script src="{{ asset('frontend/assets/js/popper.min.js') }}" ></script>

<!-- Timer js-->
<script src="{{ asset('frontend/assets/js/menu.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('frontend/assets/js/bootstrap.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('frontend/assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('frontend/assets/js/slider-animat-three.js') }}"></script>
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
<script src="{{ asset('frontend/assets/js/modal.js') }}"></script>
<script src="{{ asset('frontend/assets/js/productsfilter.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function(){
        $('.tab-title li:first').addClass('current');
        $('.tab-content-cls div:first').addClass('active default');
        $('.tab-content-cls div:first').css('display','block');
    });
</script>

{{-- Add To WishList --}}

<script>
    $(document).ready(function(){
    var addToWishListUrl = '{{ route("frontend_addwishlist",["id"=>"#id"]) }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    $('.addToWishList').on('click',function(e){
        e.preventDefault();
        var self = $(this);
        addToWishListUrl = addToWishListUrl.replace('#id',$(this).data('product'));
        jQuery.ajax({
            url: addToWishListUrl,
            method: 'get',
        success: function(result){
            if (result.added == "added") {
                Command: toastr["success"]('@lang("tr.Add To Wishlist")', "@lang('tr.Done')")
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "300",
                    "timeOut": "300",
                    "extendedTimeOut": "300",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                
                $(self).html('<i class="fa fa-heart" aria-hidden="true"></i>');
                $(self).attr('title','@lang("tr.Remove From Wishlist")');
                $('#wishVal').html(parseInt($('#wishVal').text()) + 1);
                

            }if (result.deleted == "deleted") {
                Command: toastr["warning"]('@lang("tr.Remove From Wishlist")', "@lang('tr.Done')")
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "300",
                    "timeOut": "300",
                    "extendedTimeOut": "300",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                // console.log($(self).text());
                $(self).html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
                $(self).attr('title','@lang("tr.Add To Wishlist")');
                
                if($('#wishVal').text() != 0){
                    $('#wishVal').html(parseInt($('#wishVal').text()) - 1);
                }
            }
        }});
    });



    
});
</script>

<script>
   jQuery(document).ready(function(){
       $('.searchProduct').on("input", function(){
           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
         jQuery.ajax({
            url: "{{ route('frontend_search') }}",
            method: 'get',
            data: {
               search: $(this).val(),
            },
            success: function(result){
               if($('#search').val() != ''){
                   console.log(result.results);
                   if(result.results.length > 0){
                       $('#list-results').html('');
                       $('#search').addClass('afterSearch');
                       
                   }else{

                   }
                   
                   
               }else{
                   
               }
            }});
       });
   });
</script>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e817cf1047b80c5"></script>
@if (Session::has('success'))
    <script>
        Command: toastr["success"]('{{ Session::get("success") }}', "@lang('tr.Done')")
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "300",
                "timeOut": "300",
                "extendedTimeOut": "300",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
    </script>
@endif
@yield('javascript')