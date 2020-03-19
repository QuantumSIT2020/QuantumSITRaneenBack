@extends('backend.layouts.master')

@section('title',__('tr.Update Permissions'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

<form style="padding:20px;" action="{{ route('update_permissions',$id) }}" method="POST">
    @csrf
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.Name')</label>
        <div class="col-sm-12 col-md-10">
            <input class="form-control" name="name" type="text" value="{{ $role->name }}" placeholder="@lang('tr.Name')" required>
        </div>
    </div>

    <hr>
    <div class="form-group row">
        <input type="submit" value="@lang('tr.Save')" class="btn btn-primary col-sm-12 col-md-2">
    </div>

</form>
    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('stylesheet')
    
@endsection
{{-- end additional scripts --}}