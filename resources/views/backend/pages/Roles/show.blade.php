@extends('backend.layouts.master')

@section('title',__('tr.Show Roles'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

<div class="col-lg-12">
    @foreach($roles as $r)
        @if($r->name == $role->name)
            <ul class="listBox">
                @foreach ($r->users as $u)
                    <li>{{$u->name}}</li>
                @endforeach
            </ul>
        @endif
    @endforeach
</div>
    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('stylesheet')
    
@endsection
{{-- end additional scripts --}}