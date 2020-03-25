@extends('backend.layouts.master')

@section('title',__('tr.Hot Sale'))

{{-- additional stylesheets --}}
@section('stylesheet')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('create_products') }}" class="btn btn-sm btn-info" title="">@lang('tr.Create products')</a>
</div>
@endsection

{{-- content --}}
@section('content')



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
                    <div class="table-responsive">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="border_cell">@lang('tr.Product')</th>
                                    <th class="border_cell">@lang('tr.Price')</th>
                                    <th class="border_cell">@lang('tr.Start At')</th>
                                    <th class="border_cell">@lang('tr.End At')</th>
                                    <th class="border_cell">@lang('tr.Offer')</th>
                                    <th class="border_cell">@lang('tr.New Price')</th>
                                    <th class="border_cell">@lang('tr.Action')</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @php($langName = \Lang::getLocale().'_name')
                                @foreach ($hotSales as $hotSale)
                                <tr>
                                    <td class="border_cell">{{ $hotSale->product->$langName }}</td>
                                    <td class="border_cell">{{ $hotSale->product->price }}</td>
                                    <td class="border_cell">{{ $hotSale->start_date }}</td>
                                    <td class="border_cell">{{ $hotSale->end_date }}</td>
                                    <td class="border_cell">{{ $hotSale->offer }}</td>
                                    <td class="border_cell">{{ $hotSale->product->price - (($hotSale->offer / 100) * $hotSale->product->price) }}</td>
                                    <td class="border_cell">
                                        <a href="{{ route('delete_hotsale',$hotSale->id) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" style="border-radius: 0;font-weight: bold;font-size: 10px;"  title="@lang('tr.Delete Role')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
        
                            <tfoot>
                                <tr>
                                    <th class="border_cell">@lang('tr.Product')</th>
                                    <th class="border_cell">@lang('tr.Price')</th>
                                    <th class="border_cell">@lang('tr.Start At')</th>
                                    <th class="border_cell">@lang('tr.End At')</th>
                                    <th class="border_cell">@lang('tr.Offer')</th>
                                    <th class="border_cell">@lang('tr.New Price')</th>
                                    <th class="border_cell">@lang('tr.Action')</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
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


    $(".change_status").click(function () {

        var productID = $(this).attr('productID');
        var url = '{{route("products_status", ":id")}}';
        url=url.replace(":id",productID);
        jQuery.ajax({
            type:"get",
            url: url,
            data: {},
            success: function(data) {
                if (data > 0 ){
                    // alert("update successfully");
                    location.reload();
                }
            },
            error: function(data) {

            },
        });

    })





</script>



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