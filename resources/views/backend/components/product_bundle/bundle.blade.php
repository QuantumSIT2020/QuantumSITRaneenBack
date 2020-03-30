<h3>@lang('tr.Product Information')</h3>
<fieldset style="border:0;overflow-y: scroll;width: 100%;">
    <h3>@lang('tr.Product Information')</h3><hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="product_id">@lang('tr.product')</label>
                {!! Form::select('product_id', $products, null, ['class'=>'custom-select required']) !!}
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