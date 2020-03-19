@extends('backend.layouts.master')

@section('title',__('tr.All Permissions'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>@lang('tr.Name')</th>
            <th>@lang('tr.Created At')</th>
            <th>@lang('tr.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->created_at }}</td>
                <td>
                    <a href="" data-id="{{ $permission->id }}" data-name="{{ $permission->name }}" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Update Permission')"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('delete_permissions',$permission->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Delete Permission')"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('show_permissions',$permission->id) }}" class="btn btn-primary" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Show Permission')"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>@lang('tr.Name')</th>
            <th>@lang('tr.Created At')</th>
            <th>@lang('tr.Action')</th>
        </tr>
    </tfoot>
</table>
    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('stylesheet')
    
@endsection
{{-- end additional scripts --}}