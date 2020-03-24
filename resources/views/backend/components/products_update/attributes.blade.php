<h3>@lang('tr.Product Attributes')</h3>
                <fieldset style="border:0;width:100%;overflow-y: scroll;">
                    <h3>@lang('tr.Product Attributes')</h3><hr>


                    <div class="row">
                        <div class="col-lg-12">
                                <div class="card">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="border_cell">@lang('tr.GroupAttributes') </th>
                                                <th class="border_cell">@lang('tr.value')           </th>
                                                <th class="border_cell">@lang('tr.Quantity')        </th>
                                                <th class="border_cell">@lang('tr.Action')          </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Product_attribute as $attribute)
                                            <tr>
                                                @if(\Lang::getLocale() == 'en')
                                                    <td>{{ $attribute->attribute->GroupAttributes->en_name }}</td>
                                                @else
                                                    <td>{{ $attribute->attribute->GroupAttributes->ar_name }}</td>

                                                @endif

                                                    @if(\Lang::getLocale() == 'en')
                                                        <td>{{ $attribute->attribute->en_name }}</td>
                                                    @else
                                                        <td>{{ $attribute->attribute->ar_name }}</td>

                                                    @endif
                                                <td>{{ $attribute->values }}</td>
                                                <td>
                                   <a href="{{route('delete_attribute',$attribute->id)}}" onclick="return confirm('tr.Are You Sure ?')" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>


                                               @endforeach
                                            </tbody>

                                            <tfoot>
                                            <tr>
                                                <th class="border_cell">@lang('tr.GroupAttributes')            </th>
                                                <th class="border_cell">@lang('tr.value')                      </th>
                                                <th class="border_cell">@lang('tr.Quantity')                   </th>
                                                <th class="border_cell">@lang('tr.Action')                     </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-primary add_form_field" >@lang('tr.Add Attribute')</button>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="container1"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        
                </fieldset>

                