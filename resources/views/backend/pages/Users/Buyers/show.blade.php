@extends('backend.layouts.master')

@section('title',__('tr.Show Customer '.$customer->first_name))

{{-- additional stylesheets --}}
@section('stylesheet')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('customers') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Customers')</a>
    <a href="{{ route('create_customers') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Create New Customer')</a>
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
                
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card c_grid c_yellow">
                        <div class="body text-center ribbon">
                            <div class="ribbon-box green">{{ $customer->country()[$customer->country] }}</div>
                            <div class="circle">
                                @if($customer->gender == 1)
                                <img class="rounded-circle" src="{{ asset('backend/assets/man.png') }}" alt="">
                                @else
                                <img class="rounded-circle" src="{{ asset('backend/assets/woman.png') }}" alt="">
                                @endif
                                
                            </div>
                            <h6 class="mt-3 mb-0">{{ $customer->first_name.' '.$customer->last_name }}</h6>
                            <span>{{ $customer->user->email }}</span><br><br>
                            
                            <a href="{{ route('edit_customers',$customer->id) }}" class="btn btn-success btn-sm">@lang('tr.Edit')</a>
                            <a href="{{ route('delete_customers',$customer->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-success btn-sm">@lang('tr.Delete')</a>

                            <div class="row text-center mt-4">
                                <div class="col-lg-6 border-right">
                                    <label class="mb-0">@lang('tr.Mobile')</label>
                                    <h4 class="font-20">{{ $customer->mobile }}</h4>
                                </div>
                                <div class="col-lg-6">
                                    <label class="mb-0">@lang('tr.Age') </label>
                                    <h4 class="font-20">{{ date_diff(date_create($customer->birth_date), date_create('today'))->y }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card c_grid c_yellow">
                        <div class="body ribbon">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">@lang('tr.Order Mobile')<span class="badge badge-info">{{ $customer->order_mobile }}</span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">@lang('tr.Order Email')<span class="badge badge-info">{{ $customer->order_email }}</span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">@lang('tr.City')<span class="badge badge-info">{{ $customer->city()[$customer->city] }}</span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">@lang('tr.Address')<span class="badge badge-info">{{ $customer->address }}</span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">@lang('tr.Postal Code')<span class="badge badge-info">{{ $customer->postal_code }}</span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">@lang('tr.Join At')<span class="badge badge-info">{{ $customer->created_at->diffForHumans() }}</span></li>
                            </ul>

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