@extends('backend.layouts.master')

@section('title',__('tr.Bundles'))

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('create_bundles') }}" class="btn btn-sm btn-info" title="">@lang('tr.Create bundles')</a>
    </div>
@endsection

{{-- content --}}
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                @lang('tr.Search')
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-12">
                        <form  action="{{ route('search_products') }}" method="GET">
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

    <div class="body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>@yield('title')</h2>
                        <ul class="header-dropdown dropdown">

                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <div class="body">
                        @php($langName = \Lang::getLocale().'_name')
                        <div class="row">
                            @foreach ($bundles as $bundle)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card c_grid c_yellow">

                                        <div class="body text-center ribbon">{{date('Y-m-d')}}
                                            @php($start = \Carbon\Carbon::parse($bundle->end))
                                            @php($end = \Carbon\Carbon::parse(date('y-m-d')))
                                            @php($result = $start->diffInDays($end, false))
                                            <div class="ribbon-box info">
                                                @if($result < 0)
                                                    {{ abs($result) }}
                                                @else
                                                    @lang('tr.Expired')
                                                @endif
                                            </div>



                                            <h6 class="mt-3 mb-0">{{ $bundle->$langName }}</h6>
                                            <br>
                                            <span><strong>@lang('tr.Price'):&nbsp;</strong> </span>
                                            <span style="color: red;">{{ $bundle->price }}</span>
                                            <br>
                                            <strong>@lang('tr.start'):&nbsp;</strong>
                                            <span style="color: red;">{{ $bundle->start }}
                                            </span>|
                                            <strong>@lang('tr.end'):&nbsp;</strong>
                                            <span style="color: red;">{{ $bundle->end }}
                                            </span>
                                            <br><br>


                                            <a href="{{ route('show_bundles',$bundle->id) }}" class="btn btn-success btn-sm">@lang('tr.View')</a>
                                            <a href="{{ route('edit_bundles',$bundle->id) }}" class="btn btn-warning btn-sm">@lang('tr.Edit')</a>
                                            <a href="{{ route('delete_bundles',$bundle->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm">@lang('tr.Delete')</a>


                                            </div>







                                    </div>
                                </div>
                            @endforeach
                        </div>





                        <div class="row">
                            <div class="col-lg-12">
                                {{ $bundles->links() }}
                            </div>
                        </div>


                    </div>
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