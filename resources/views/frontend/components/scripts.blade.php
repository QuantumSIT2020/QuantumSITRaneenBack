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

@yield('javascript')