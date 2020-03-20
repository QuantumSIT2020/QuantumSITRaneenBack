@extends('backend.layouts.master')

@section('title',__('tr.Update Roles'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2> @yield('title')</h2>
        </div>
        
        <div class="body">
            <form style="padding:20px;" action="{{ route('update_roles') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.Name')</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <input class="form-control" name="name" type="text" value="{{ $role->name }}" placeholder="@lang('tr.Name')" required>
                    </div>
                </div>

                <hr>
                <div class="form-group row">
                    <input type="submit" value="@lang('tr.Save')" class="btn btn-primary col-sm-12 col-md-2">
                </div>

            </form>
        </div>
    </div>
</div>
    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('stylesheet')
    
@endsection
{{-- end additional scripts --}}