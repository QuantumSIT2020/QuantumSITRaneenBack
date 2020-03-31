@extends('backend.layouts.master')

@section('title',__('tr.Create Bundle'))

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/jquery-steps/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/imageUpload/image-uploader.min.css') }}">
    <style>
        .wizard > .content{
            min-height: 35em;
        }
    </style>
@endsection
{{-- end additional stylesheets --}}

@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('bundles') }}" class="btn btn-sm btn-primary" title="">@lang('tr.bundles')</a>
    </div>
@endsection

{{-- content --}}
@section('content')
    <div class="row">
        <div class="card">
            <div class="header">
                @yield('title')
            </div>
            <div class="body">
                <form id="example-advanced-form" action="{{ route('store_bundles') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('backend.components.product_bundle.information')

                    @include('backend.components.product_bundle.bundle')
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
    <script src="{{ asset('backend/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/ckeditor/ckeditor.js') }}"></script><!-- Ckeditor -->
    <script src="{{ asset('backend/assets/js/pages/forms/editors.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/jquery-validation/jquery.validate.js') }}"></script><!-- Jquery Validation Plugin Css -->
    <script src="{{ asset('backend/assets/vendor/jquery-steps/jquery.steps.js') }}"></script><!-- JQuery Steps Plugin Js -->
    <script src="{{ asset('backend/assets/js/pages/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('backend/assets/imageUpload/image-uploader.min.js') }}"></script>


    <script>
        $(document).ready(function() {

        });


        $(document).ready(function() {
            var max_fields      = 100;
            var wrapper         = $(".container1");
            var add_button      = $(".add_form_field");
            var skillHtml       = '';
            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;

                    skillHtml += '<div style="border: 1px solid #e4e4e4; padding: 15px;margin-top:10px;">';
                    skillHtml += '<div class="row">';
                    skillHtml += '<div class="col-lg-6"><div class="form-group"><label for="bundle">@lang("tr.Bundle")</label>{!! Form::select("bundle_product_id[]", $product_bundle, null, ["class"=>"custom-select required"]) !!}</div></div>';



                    skillHtml += '</div><br>';


                    skillHtml += '<a href="#" class="delete btn btn-danger">@lang("tr.Delete")</a></div>'; //add input box


                    $(wrapper).append(skillHtml);

                    // skillHtml = '';

                }
                else
                {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click",".delete", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>



    <script>
        var form = $("#example-advanced-form").show();
        var productQty = '';
        form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age-2").val()) < 18)
                {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex)
                {
                    productQty = $('.productQuantity').val();
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Used to skip the "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
                {
                    form.steps("next");
                }
                // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    form.steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                $("#example-advanced-form").submit();
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password-2"
                }
            }
        });


    </script>



    {{-- additional scripts --}}

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(input).siblings("img").attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        CKEDITOR.replace( 'en_description' );
    </script>

    <script>
        CKEDITOR.replace( 'ar_description' );
    </script>

{{-- end additional scripts --}}


@endsection
{{-- end additional scripts --}}