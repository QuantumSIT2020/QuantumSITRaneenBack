<h3>@lang('tr.Brand')</h3>
                <fieldset style="border:0;width:100%;">
                    <h3>@lang('tr.Product Brand')</h3><hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="en_name">@lang('tr.Manufacturer')</label>
                                {!! Form::select('manufacturer_id', $mans,  $product->manufacturer_id , ['class'=>'custom-select required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="en_name">@lang('tr.Brand')</label>
                                {!! Form::select('sub_categories_id', $subs, $product->sub_categories_id, ['class'=>'custom-select required']) !!}
                            </div>
                        </div>
                    </div>

                </fieldset>