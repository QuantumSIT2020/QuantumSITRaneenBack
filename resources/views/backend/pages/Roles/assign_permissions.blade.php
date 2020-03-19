@extends('backend.layouts.master')

@section('title',__('tr.Assign Roles'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

<form style="padding:20px;" action="{{ route('assign_permissions_post',$role->id) }}" method="POST">
@csrf
    <div class="form-group row">
        <h2>{{ $role->name }}&nbsp;@lang('tr.Role')</h2>
    </div>
    <div class="col-sm-12 col-md-10 checkbox-group required">
        {{--  all roles belongs to this user  --}}
        @foreach ($role->permissions as $role_permission) 
            <span>
                <input type="checkbox" name="permission_id[]" id="permission_{{$role_permission->id}}" value="{{ $role_permission->id }}" checked>
                <label for="permission_{{$role_permission->id}}">{{ $role_permission->name }}</label>
            </span><br>
        @endforeach
        {{--  all roles belongs to this user  --}}

        @foreach ($permissions as $permission)
        <span>
            <input type="checkbox" name="permission_id[]" id="permission_{{$permission->id}}" value="{{ $permission->id }}" >
            <label for="permission_{{$permission->id}}">{{ $permission->name }}</label>
        </span><br>
        @endforeach
        <br><br>
        <span class="errorRole" style="color:red;">@lang('tr.Please Choose One Permission at Least')</span>
        </div>
        <hr>
    <div class="form-group row">
        <input type="submit" value="@lang('tr.Assign Role')" class="btn btn-primary col-sm-12 col-md-2">
    </div>

</form>
    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('stylesheet')
    
@endsection
{{-- end additional scripts --}}