@extends('backend.layouts.master')

@section('title',__('tr.All Roles'))

{{-- additional stylesheets --}}
@section('stylesheet')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('create_roles') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Create New Role')</a>
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
            <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="border_cell">@lang('tr.Name')</th>
                            <th class="border_cell">@lang('tr.Created At')</th>
                            <th class="border_cell">@lang('tr.Action')</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="border_cell">{{ $role->name }}</td>
                            <td class="border_cell">{{ $role->created_at }}</td>
                            <td class="border_cell">
                                <a href="{{ route('edit_roles',$role->id) }}"  class="btn btn-warning updateRoleBtn" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Update Role')"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete_roles',$role->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Delete Role')"><i class="fa fa-trash"></i></a>
                                <a href="{{ route('show_roles',$role->id) }}" class="btn btn-primary" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Show Role')"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('assign_permissions',$role->id) }}" class="btn btn-success" style="border-radius: 0;font-weight: bold;font-size: 10px;" title="@lang('tr.Assign Permissions')"><i class="fa fa-check"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th class="border_cell">@lang('tr.Name')</th>
                            <th class="border_cell">@lang('tr.Created At')</th>
                            <th class="border_cell">@lang('tr.Action')</th>
                        </tr>
                    </tfoot>
                </table>
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