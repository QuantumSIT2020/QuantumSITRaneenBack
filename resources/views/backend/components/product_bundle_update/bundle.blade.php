<h3>@lang('tr.Update Bundle')</h3>
<fieldset style="border:0;width:100%;overflow-y: scroll;">
    <h5>@lang('tr.Product Bundle')</h5><hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <select name="product_id" id="product_id" class="custom-select" required>
                    <option value="">@lang('tr.Select Product Bundle')</option>
                    @foreach ($products as $product)
                        @if($product->id == $main_product->product_id)
                            <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                        @else
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endif
                    @endforeach
                </select>
        </div>
    </div>
    </div>

    <h5>@lang('tr.Bundles')</h5><hr>
    <div class="row">
               <div class="col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="border_cell">@lang('tr.Image')           </th>
                                <th class="border_cell">@lang('tr.Name')            </th>
                                <th class="border_cell">@lang('tr.Action')          </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_bundles as $bundle)
                                <tr>
                                    <td>
                                        <img class="rounded-circle" style="width:100px;height:100px;" src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$bundle->BundleProduct->product_image }}" alt="">
                                    </td>

                                @if(\Lang::getLocale() == 'en')
                                <td>{{ $bundle->BundleProduct->en_name }}</td>
                                @else
                                <td>{{ $bundle->BundleProduct->ar_name }}</td>

                                @endif

                                <td>
                                <a href="{{route('delete_items_bundle',$bundle->id)}}" onclick="return confirm('tr.Are You Sure ?')" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                </td>
                                </tr>


                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <th class="border_cell">@lang('tr.Image')           </th>
                                <th class="border_cell">@lang('tr.Name')            </th>
                                <th class="border_cell">@lang('tr.Action')          </th>
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
                <button class="btn btn-primary add_form_field" >@lang('tr.Add Bundle')</button>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="container1"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</fieldset>

