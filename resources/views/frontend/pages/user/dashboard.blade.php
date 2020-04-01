@extends('frontend.layouts.master')

@section('title',__('tr.Dashboard'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@section('stylesheet')
    <style>
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #007bff;
            background: #b22827;
            font-size: 14px;
            border-radius: 0;
        }

        .nav-pills .nav-link {
            border-radius: .25rem;
            font-size: 14px;
            color: #b22827;
            margin-bottom: 5px;
        }
    </style>
@endsection

@include('frontend.components.breadcrumb')


<section class="section-big-py-space bg-light">
    <div class="container">
        @if($errors->any())
            <div class="row" style="width:100%">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%;">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
            </div>
            <hr>
        @endif


        <div class="row">
            
            <div class="col-lg-2" style="background: white; padding: 15px; box-shadow: 1px 1px 1px 1px #00000021;">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fa fa-user"></i>&nbsp;@lang('tr.Account')
                    </a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa fa-money"></i>&nbsp;@lang('tr.Order History')
                    </a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                  </div>
            </div>
            
            <div class="col-lg-9" style="background: white; padding: 15px; box-shadow: 1px 1px 1px 1px #00000021;margin-left:10px;">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form action="{{ route('frontend_update_profile') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="fname">@lang('tr.First Name')</label>
                                        <input type="text" name="first_name" id="fname" placeholder="@lang('tr.First Name')" class="form-control">
                                    </div>    
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="lname">@lang('tr.Last Name')</label>
                                        <input type="text" name="last_name" id="lname" placeholder="@lang('tr.Last Name')" class="form-control">
                                    </div>    
                                </div>
                                
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email">@lang('tr.Email')</label>
                                        <input type="text" name="email" id="email" placeholder="@lang('tr.Email')" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">@lang('tr.Password')</label>
                                        <input type="password" name="password" id="password" placeholder="@lang('tr.Password')" class="form-control">
                                    </div>    
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">@lang('tr.Confirm Password')</label>
                                        <input type="password" name="password_confirmation" id="password" placeholder="@lang('tr.Confirm Password')" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <button class="btn-normal btn">@lang('tr.Update Profile')</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <table class="table table-bordered" style="width:100%">
                            <thead>
                                <th>#</th>
                                <th>@lang('tr.Code')</th>
                                <th>@lang('tr.Price')</th>
                                <th>@lang('tr.Date/Time')</th>
                                <th>@lang('tr.View')</th>
                            </thead>
                            <tbody>
                                @foreach ($mainOrder as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->code }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td><a href="{{ route('cart_invoices',$order->id) }}" target="_blank"><i class="fa fa-eye"></i><a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                  </div>
            </div>

              
        </div>
    </div>
</section>


@include('frontend.components.contactbanner')

@endsection
