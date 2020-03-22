@extends('backend.layouts.master')

@section('title',__('tr.SoicalMedia'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">

                <div class="body">
                    <form id="basic-form" style="padding:20px;" action="{{ route('soicalmedia_update') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="facebook">@lang('tr.facebook'):</label>
                            <input type="text" class="form-control" id ="facebook"  name="facebook"  value="@if(isset($soicalmedia_data->facebook)) {{ $soicalmedia_data->facebook }} @endif"/>
                        </div>
                        <div class="form-group">
                            <label for="twitter">@lang('tr.twitter'):</label>
                            <input type="text" class="form-control" id ="twitter"  name="twitter"  value="@if(isset($soicalmedia_data->twitter)) {{ $soicalmedia_data->twitter }} @endif"/>
                        </div>
                        <div class="form-group">
                            <label for="instagram">@lang('tr.instagram'):</label>
                            <input type="text" class="form-control" id ="instagram"  name="instagram"  value="@if(isset($soicalmedia_data->instagram)) {{ $soicalmedia_data->instagram }} @endif"/>

                        </div>


                        <div class="form-group">
                            <label for="massenger">@lang('tr.massenger'):</label>
                            <input type="text" class="form-control" id ="massenger"  name="massenger"  value="@if(isset($soicalmedia_data->massenger)) {{ $soicalmedia_data->massenger }} @endif"/>
                        </div>
                        <div class="form-group">
                            <label for="whatsup">@lang('tr.whatsup'):</label>
                            <input type="text" class="form-control" id ="whatsup"  name="whatsup"  value="@if(isset($soicalmedia_data->whatsup)) {{ $soicalmedia_data->whatsup }} @endif"/>
                        </div>
                        <div class="form-group">
                            <label for="address">@lang('tr.address'):</label>
                            <input type="text" class="form-control" id ="address"  name="address"  value="@if(isset($soicalmedia_data->address)) {{ $soicalmedia_data->address }} @endif"/>

                        </div>
                        <div class="form-group">
                            <label for="gmail">@lang('tr.gmail'):</label>
                            <input type="text" class="form-control" id ="gmail"  name="gmail"  value="@if(isset($soicalmedia_data->gmail)) {{ $soicalmedia_data->gmail }} @endif"/>

                        </div>
                        <div class="form-group">
                            <label for="phone_number">@lang('tr.phone_number'):</label>
                            <input type="text" class="form-control" id ="phone_number"  name="phone_number"  value="@if(isset($soicalmedia_data->phone_number)) {{ $soicalmedia_data->phone_number }} @endif"/>

                        </div>



                        <button type="submit" class="btn btn-primary">@lang('tr.save')</button>
                    </form>
                </div>
            </div>
        </div>

    </div>



@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            var url = '';
            var lang = '{{ \Lang::getLocale() }}';
            if (lang == 'ar') {
                url = '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json';
            }else{
                url = '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json';
            }

            $('#example').DataTable( {
                "language": {
                    "url": url
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        text: "@lang('tr.Copy')",
                        key: {
                            key: 'c',
                            altKey: true
                        }
                    },
                    {
                        extend: 'print',
                        text: "@lang('tr.Print')",
                        key: {
                            key: 'p',
                            altKey: true
                        }
                    },

                ]
            } );
        } );
    </script>
@endsection
{{-- end additional scripts --}}








































