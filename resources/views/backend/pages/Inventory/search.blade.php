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
    <a href="{{ route('dataentry') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Data Entry')</a>
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
                    <form  action="{{ route('search_dataentry') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ old('search') }}" name="search" placeholder="@lang('tr.Search')" aria-label="@lang('tr.Search')" aria-describedby="basic-addon2">
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

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>@yield('title')</h2>
            <ul class="header-dropdown dropdown">
                
                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        <div class="body">
            @if(count($data) > 0)
            <div class="row">
                @foreach ($data as $d)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card c_grid c_yellow">
                        <div class="body text-center ribbon">
                            <div class="circle">
                                @if($d->gender == 1)
                                <img class="rounded-circle" src="{{ asset('backend/assets/man.png') }}" alt="">
                                @else
                                <img class="rounded-circle" src="{{ asset('backend/assets/woman.png') }}" alt="">
                                @endif
                                
                            </div>
                            <h6 class="mt-3 mb-0">{{ $d->first_name.' '.$d->last_name }}</h6>
                            <span>{{ $d->user->email }}</span><br><br>
                            
                            <a href="{{ route('show_dataentry',$d->data_id) }}" class="btn btn-success btn-sm">@lang('tr.View')</a>
                            <a href="{{ route('edit_dataentry',$d->data_id) }}" class="btn btn-success btn-sm">@lang('tr.Edit')</a>
                            <a href="{{ route('delete_dataentry',$d->data_id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-success btn-sm">@lang('tr.Delete')</a>

                            <div class="row text-center mt-4">
                                <div class="col-lg-6 border-right">
                                    <label class="mb-0">@lang('tr.Mobile')</label>
                                    <h4 class="font-20">{{ $d->mobile }}</h4>
                                </div>
                                <div class="col-lg-6">
                                    <label class="mb-0">@lang('tr.Age') </label>
                                    <h4 class="font-20">{{ date_diff(date_create($d->birth_date), date_create('today'))->y }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12">
                    {{ $data->links() }}
                </div>
            </div>

            @else

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card w_card3">
                        <div class="body">
                            <div class="text-center"><i class="fa fa-warning text-info"></i>
                                <h4 class="m-t-25 mb-0">@lang('tr.There are no results')</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif

            
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