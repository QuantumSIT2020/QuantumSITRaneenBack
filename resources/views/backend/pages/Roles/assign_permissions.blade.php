@extends('backend.layouts.master')

@section('title',__('tr.Assign Roles'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')



<div class="card">
    <div class="header">
        
        <h2>{{ $role->name }}&nbsp;@lang('tr.Role') : &nbsp;&nbsp;&nbsp;&nbsp;
        <span style="background: white; padding: 10px; border: 1px solid;">
            <input type="checkbox" id="checkAll">&nbsp;<label for="checkAll">@lang('tr.Check All')</label>
        </span>
        </h2>
    </div>
    <div class="body">
        <form style="padding:20px;" action="{{ route('assign_permissions_post',$role->id) }}" method="POST">
            @csrf
                <div class="row">
                    @foreach ($role->permissions as $role_permission) 
                        <div class="col-lg-2" style="background: white; padding: 10px; margin-bottom: 10px;box-shadow: 2px 2px 2px 2px #b5b5b587;line-height: 5px;margin-right:5px;">
                            <span>
                                <input type="checkbox" name="permission_id[]" id="permission_{{$role_permission->id}}" value="{{ $role_permission->id }}" checked>
                                <label for="permission_{{$role_permission->id}}">{{ ucwords(str_replace('_',' ',$role_permission->name)) }}</label>
                            </span><br>
                        </div>
                    @endforeach
                </div>
            
                <div class="row">
                    @foreach ($permissions as $permission)
                    <div class="col-lg-2" style="background: white; padding: 10px; margin-bottom: 10px;box-shadow: 2px 2px 2px 2px #b5b5b587;line-height: 5px;margin-right:5px;">
                        <span>
                            <input type="checkbox" name="permission_id[]" id="permission_{{$permission->id}}" value="{{ $permission->id }}" >
                            <label for="permission_{{$permission->id}}">{{ ucwords(str_replace('_',' ',$permission->name)) }}</label>
                        </span><br>
                    </div>
                    @endforeach
                </div>
            
                
                    <hr>
                <div class="form-group row">
                    <input type="submit" value="@lang('tr.Assign Role')" class="btn btn-primary col-sm-12 col-md-2">
                </div>
            
            </form>
    </div>
</div>
    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endsection
{{-- end additional scripts --}}