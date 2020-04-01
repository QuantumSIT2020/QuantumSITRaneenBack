<h3>@lang('tr.Brand & Manufacturer')</h3>
                <fieldset style="border:0;width:100%;">
                    <h3>@lang('tr.Product Brand & Manufacturer')</h3><hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="en_name">@lang('tr.Manufacturer')(optional)</label>
                                {!! Form::select('manufacturer_id', $mans,  $product->manufacturer_id , ['class'=>'custom-select']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="en_name">@lang('tr.Brand')(optional)</label>
                                {!! Form::select('brand_id', $brands, $product->brand_id, ['class'=>'custom-select']) !!}
                            </div>
                        </div>
                    </div>

                </fieldset>