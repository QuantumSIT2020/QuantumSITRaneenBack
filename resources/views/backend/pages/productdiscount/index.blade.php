@extends('backend.layouts.master')

@section('title',__('tr.Discont'))

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('create_discount') }}" class="btn btn-sm btn-info" title=""><i class="fa fa-plus"></i>@lang('tr.Create New discount')</a>
    </div>
@endsection

{{-- content --}}
@section('content')


    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                @lang('tr.Search')
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-12">
                        <form  action="{{ route('search_SubCategory') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="@lang('tr.Search')" aria-label="@lang('tr.Search')" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">@lang('tr.Search')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>@yield('title')</h2>
                        <ul class="header-dropdown dropdown">

                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <div class="body">

                        <div class="row">
                            @foreach ($product_sale as $sale)
                                <div class="col-lg-6 col-md-4 col-sm-6">
                                    <div class="card c_grid c_yellow">
                                        <div class="body text-center ribbon">
                                            <div class="ribbon-box info">{{ $sale->created_at->diffForHumans() }}</div>
                                            <div class="circle">

                                                <img class="rounded-circle" src="{{ asset('backend/dashboard_images/products/'.$sale->products->product_image) }}" alt="">


                                            </div>
                                            <h6 class="mt-3 mb-0">{{ $sale->products->en_name.' | '.$sale->products->ar_name }}</h6>
                                            <br>
                                            <span><strong>Price:</strong> </span><span style="color: red;">{{ $sale->products->price }}</span><br><br>
                                            <span><strong>Discount:</strong> </span><span style="color: red;">{{ $sale->discount }}</span><strong>%</strong><br><br>

                                            <a href="{{ route('show_discount',$sale->id) }}" class="btn btn-success btn-sm">@lang('tr.View')</a>
                                            <a href="{{ route('edit_discount',$sale->id) }}" class="btn btn-warning btn-sm">@lang('tr.Edit')</a>
                                            <a href="{{ route('delete_discount',$sale->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm">@lang('tr.Delete')</a>

                                            <button type="button" class="btn btn-info change_status" productsaleID="{{$sale->id}}">
                                                @if($sale->isactive ==1)
                                                    <?="DeActive"?>
                                                @else
                                                    <?="Active" ?>
                                                @endif
                                            </button>

                                            <div class="row text-center mt-4">
                                                <div class="col-lg-6 border-right">
                                                    <label class="mb-0">@lang('tr.Brand')</label>
                                                    @if(\Lang::getLocale() == 'en')
                                                        <h4 class="font-20">{{ $sale->products->SubCategory->en_name }}</h4>
                                                    @else
                                                        <h4 class="font-20">{{ $sale->products->SubCategory->ar_name }}</h4>
                                                    @endif

                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="mb-0">@lang('tr.Manufacturer') </label>
                                                    @if(\Lang::getLocale() == 'en')
                                                        <h4 class="font-20">{{ $sale->products->Manufacturer->en_name }}</h4>
                                                    @else
                                                        <h4 class="font-20">{{ $sale->products->Manufacturer->ar_name }}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                {{ $product_sale->links() }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
{{-- end content --}}


<script>


    $(".change_status").click(function () {

        var productsaleID = $(this).attr('productsaleID');
        var url = '{{route("discount_status", ":id")}}';
        url=url.replace(":id",productsaleID);
        jQuery.ajax({
            type:"get",
            url: url,
            data: {},
            success: function(data) {
                if (data > 0 ){
                    alert("update successfully");
                    location.reload();
                }
            },
            error: function(data) {

            },
        });

    })





</script>


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

