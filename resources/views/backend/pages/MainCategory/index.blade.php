

    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <div class="m-portlet m-portlet--mobile m-portlet--body-progress-">

        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        @lang('tr.MainCategory')
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('create_MainCategory') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>@lang('tr.Add New ')</span>
												</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>


        <div class="m-portlet__body">
            <table id="example"  class="table table-bordered table table-hover">
                <thead >
                <tr>
                    <th>@lang('tr.main_image')</th>
                    <th>@lang('tr.en_name')</th>
                    <th>@lang('tr.ar_name') </th>
                    <th>@lang('tr.en_desc')</th>
                    <th>@lang('tr.ar_desc')</th>
                    <th>@lang('tr.Action')</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($MainCategory_data as $index => $MainCategory)
                    <td ><img src="{{ URL::to('/') }}/backend/dashboard_images/MainCategory/{{$MainCategory->main_image }}" class="img-thumbnail" width="200" /></td>
                    <td >{{ $MainCategory->en_name }}</td>
                    <td >{{ $MainCategory->ar_name }}</td>
                    <td >{{ $MainCategory->en_desc }}</td>
                    <td >{{ $MainCategory->ar_desc }}</td>

                    <td>
                        <a href="{{ route('show_MainCategory', $MainCategory->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('edit_MainCategory', $MainCategory->id) }}" class="btn btn-warning">Edit</a>
                        <form  onclick="return confirm('Are You Sure ?')"  action="{{ route('delete_MainCategory', $MainCategory->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>@lang('tr.main_image')</th>
                    <th>@lang('tr.en_name')</th>
                    <th>@lang('tr.ar_name') </th>
                    <th>@lang('tr.en_desc')</th>
                    <th>@lang('tr.ar_desc')</th>
                    <th>@lang('tr.Action')</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>

