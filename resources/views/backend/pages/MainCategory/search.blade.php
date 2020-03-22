@extends('backend.layouts.master')

@if(isset($_GET['search']))
    @php($search = $_GET['search'])
@else
    @php($search = '')
@endif

@section('title',__('tr.Search').' - '.$search)

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('MainCategory') }}" class="btn btn-sm btn-primary" title="">@lang('tr.MainCategory')</a>
    </div>
@endsection

{{-- content --}}
@section('content')



    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    @lang('tr.Search')
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form  action="{{ route('search_MainCategory') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="search" placeholder="@lang('tr.Search')" aria-label="@lang('tr.Search')" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">@lang('tr.Search')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($MainCategory_data as $index => $MainCategory)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card c_grid c_yellow">
                    <div class="body text-center ribbon">
                        <div class="ribbon-box green">New</div>
                        <div class="circle">
                            <img class="rounded-circle" src="{{ URL::to('/') }}/backend/dashboard_images/MainCategory/{{$MainCategory->main_image }}" alt="">
                        </div>
                        @if(\Lang::getLocale() == 'en')
                            <h5 class="mt-3 mb-0">{{ $MainCategory->en_name }}</h5>
                        @else
                            <h5 class="mt-3 mb-0">{{ $MainCategory->ar_name }}</h5>
                        @endif

                           <br><br>
                        <a href="{{ route('show_MainCategory', $MainCategory->id) }}" class="btn btn-success btn-sm">@lang('tr.View')</a>
                        <a href="{{ route('edit_MainCategory', $MainCategory->id) }}" class="btn btn-warning btn-sm">@lang('tr.Edit')</a>
                        <a href="{{ route('delete_MainCategory', $MainCategory->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm">@lang('tr.Delete')</a>


                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="row">
        <div class="col-lg-12">
            {{ $MainCategory_data->links() }}
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