<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@lang('tr.Order Invoice')</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box" id="printDiv">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('frontend/assets/images/layout-2/logo/logo-ranen.png') }}" style="width:100%; max-width: 124px;">
                            </td>
                            
                            <td>
                                @php($datetime = DateTime::createFromFormat('YmdHi', '201308131830'))
                                @lang('tr.Invoice'): {{ $mainOrder->code }}<br>
                                @lang('tr.Day'): {{ $datetime->format('d').'-'.$datetime->format('D').'-'.$datetime->format('Y') }}<br>
                                @lang('tr.Time'): {{ explode(' ',$mainOrder->created_at)[1] }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                @lang('tr.Client Name')<br>
                                @lang('tr.Email')
                            </td>
                            
                            <td>
                                {{ $mainOrder->user->name }}<br>
                                {{ $mainOrder->user->email }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
                        
            <tr class="heading">
                <td>
                    @lang('tr.Item')
                </td>
                
                
                <td>
                    @lang('tr.Price')
                </td>
            </tr>

            @foreach ($order as $item)

            <tr class="item">
                <td>
                    {{ $item->name.' x '.$item->quantity }}
                </td>
                <td>
                    {{ $item->price / $item->quantity }}
                </td>
            </tr>
                
            @endforeach
            

            
            
            
            <tr class="total">
                <td></td>
                
                <td>
                   @lang('tr.Total'): EGP {{ $mainOrder->price }}
                </td>
            </tr>
        </table>
    </div>

    <button id="doPrint" style="display: block; text-align: center; margin-left: auto; margin-right: auto; margin-top: 22px; font-size: 25px;">Print</button>
    <br>
    <h3><a href="{{ route('home') }}" id="website" style="display: block; text-align: center; margin-left: auto; margin-right: auto; margin-top: 22px; font-size: 25px;">@lang('tr.Website')</a></h3>

    <script>
        document.getElementById("doPrint").addEventListener("click", function() {
            var x = document.getElementById("doPrint");
            var y = document.getElementById("website");
            x.style.display = "none";
            y.style.display = "none";
            window.print();
            x.style.display = "block";
            y.style.display = "block";
        });
    </script>

</body>
</html>