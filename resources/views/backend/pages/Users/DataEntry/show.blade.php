@extends('backend.layouts.master')

@section('title',__('tr.Show Data entry '.$data->first_name))

{{-- additional stylesheets --}}
@section('stylesheet')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('dataentry') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Data entry')</a>
    <a href="{{ route('create_dataentry') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Create New Data Entry')</a>
</div>
@endsection

{{-- content --}}
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>@yield('title')</h2>
            <ul class="header-dropdown dropdown">
                
                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        <div class="body">
            
            <div class="row">
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="card c_grid c_yellow">
                        <div class="body text-center ribbon">
                            <div class="ribbon-box green">{{ $data->created_at->diffForHumans() }}</div>
                            <div class="circle">
                                @if($data->gender == 1)
                                <img class="rounded-circle" src="{{ asset('backend/assets/man.png') }}" alt="">
                                @else
                                <img class="rounded-circle" src="{{ asset('backend/assets/woman.png') }}" alt="">
                                @endif
                                
                            </div>
                            <h6 class="mt-3 mb-0">{{ $data->first_name.' '.$data->last_name }}</h6>
                            <span>{{ $data->user->email }}</span><br><br>
                            
                            <a href="{{ route('edit_dataentry',$data->id) }}" class="btn btn-success btn-sm">@lang('tr.Edit')</a>
                            <a href="{{ route('delete_dataentry',$data->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-success btn-sm">@lang('tr.Delete')</a>

                            <div class="row text-center mt-4">
                                <div class="col-lg-6 border-right">
                                    <label class="mb-0">@lang('tr.Mobile')</label>
                                    <h4 class="font-20">{{ $data->mobile }}</h4>
                                </div>
                                <div class="col-lg-6">
                                    <label class="mb-0">@lang('tr.Age') </label>
                                    <h4 class="font-20">{{ date_diff(date_create($data->birth_date), date_create('today'))->y }}</h4>
                                </div>
                            </div>
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