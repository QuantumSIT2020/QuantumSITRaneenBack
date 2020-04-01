@extends('backend.layouts.master')

@section('title',__('tr.Subscribe'))

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('create_Subscribe') }}" class="btn btn-sm btn-info" title=""><i class="fa fa-plus"></i>@lang('tr.Create Subscribe')</a>
    </div>
@endsection

{{-- content --}}
@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="mail-inbox">
                <div class="mobile-left">
                    <a href="javascript:void(0);" class="btn btn-primary toggle-email-nav"><i class="fa fa-bars"></i></a>
                </div>
                <div class="body mail-left">
                    <div class="mail-compose m-b-20">
                        <a href="#" class="btn btn-danger btn-block btn-round">Compose</a>
                    </div>
                    <div class="mail-side">
                        <ul class="nav">
                            <li><a href="{{ route('contactus') }}"><i class="icon-drawer"></i>@lang('tr.Contact Us')<span class="badge badge-primary float-right">{{ \App\Models\contactUs::count() }}</span></a></li>
                            <li class="active"><a href="{{ route('Subscribe') }}"><i class="icon-cursor"></i>@lang('tr.Subscribes')<span class="badge badge-warning float-right">{{ \App\Models\subscribe::count() }}</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="body mail-right check-all-parent">
                    
                    <div class="mail-action clearfix m-l-15">
                        <div class="pull-left">
                            <h5>@lang('tr.Subscribes')</h5>
                        </div>
                    </div>
                    <div class="mail-list">
                        <ul class="list-unstyled">
                            
                            @foreach ($subscribe as $sub)

                            <li class="clearfix">
                                <div class="md-right">
                                    <img class="rounded" src="{{ asset('backend/assets/images/xs/avatar1.jpg') }}" alt="">
                                    <p class="sub"><a href="#" class="mail-detail-expand">{{ $sub->email }}</a></p>
                                    <span class="time">{{ $sub->created_at->diffForHumans() }}</span>
                                </div>
                            </li>
                                
                            @endforeach
                            
                            
                        </ul>
                    </div>

                    <ul class="pagination mb-0">
                        {{ $subscribe->links() }}
                    </ul>
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


