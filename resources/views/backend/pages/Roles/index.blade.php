@extends('backend.layouts.master')

@section('title',__('tr.All Roles'))

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
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at }}</td>
                <td>
                    <a href="" data-id="{{ $role->id }}" data-name="{{ $role->name }}" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning updateRoleBtn" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Update Role')"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('delete_roles',$role->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Delete Role')"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('show_roles',$role->id) }}" class="btn btn-primary" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Show Role')"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('assign_permissions',$role->id) }}" class="btn btn-success" style="border-radius: 0;font-weight: bold;font-size: 10px;" title="@lang('tr.Assign Permissions')"><i class="fa fa-check"></i></a>
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