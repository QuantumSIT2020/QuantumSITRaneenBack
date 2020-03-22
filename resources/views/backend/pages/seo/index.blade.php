@extends('backend.layouts.master')

@section('title',__('tr.seo'))

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
                    <form id="basic-form" style="padding:20px;" action="{{ route('testseo_update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-lg-4 file">@lang('tr.Select  logo')</label>
                            <div class="col-md-8">
                                @if(isset($seo_data->title))
                                    <img src="{{ asset('backend/dashboard_images/seo/'.$seo_data->logo) }}" class="img-responsive img-thumbnail" style="display: block;margin-left: auto;margin-right: auto;width: 300px;" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" id="logo">
                        </div>


                        <div class="form-group">
                            <label for="title">@lang('tr.title'):</label>
                            <input type="text" class="form-control" id ="title"  name="title"  value="@if(isset($seo_data->title)) {{ $seo_data->title }} @endif"/>
                        </div>
                        <div class="form-group">
                            <label for="footer">@lang('tr.footer'):</label>
                            <input type="text" class="form-control" id ="footer"  name="footer"  value="@if(isset($seo_data->footer)) {{ $seo_data->footer }} @endif"/>
                        </div>
                        <div class="form-group">
                            <label for="descriptions">@lang('tr.descriptions'):</label>
                            <input type="text" class="form-control" id ="descriptions"  name="descriptions"  value="@if(isset($seo_data->descriptions)) {{ $seo_data->descriptions }} @endif"/>

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








































