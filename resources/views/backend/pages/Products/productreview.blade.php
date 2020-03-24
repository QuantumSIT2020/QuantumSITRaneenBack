@extends('backend.layouts.master')

@section('title',__('tr.reviews'))

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('create_reviews') }}" class="btn btn-sm btn-info" title="">@lang('tr.Create Review')</a>
    </div>
@endsection

{{-- content --}}
@section('content')



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
                                <th class="border_cell">@lang('tr.User Name')       </th>
                                <th class="border_cell">@lang('tr.Product Name')    </th>
                                <th class="border_cell">@lang('tr.Review')          </th>
                                <th class="border_cell">@lang('tr.Comments')        </th>



                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($Reviews as $index => $Review)
                                <tr>
                                    <td  class="border_cell">{{ $Review->User->name }}                         </td>
                                    <td  class="border_cell">{{ $Review->Product->en_name }}                   </td>
                                    <td  class="border_cell">{{ $Review->reviews }}                            </td>
                                    <td  class="border_cell">{{ $Review->comments }}                           </td>


                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <th class="border_cell">@lang('tr.User Name')       </th>
                                <th class="border_cell">@lang('tr.Product Name')    </th>
                                <th class="border_cell">@lang('tr.Review')          </th>
                                <th class="border_cell">@lang('tr.Comments')        </th>

                            </tr>
                            </tfoot>
                        </table>
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