<h3>@lang('tr.Bundle Update')</h3>
<fieldset style="border:0;overflow-y: scroll;width: 100%;">
    <h3>@lang('tr.Bundle Update')</h3><hr>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="en_name">@lang('tr.English Name')</label>
                <input type="text" name="en_name" id="en_name" class="form-control" value="{{ $bundle->en_name }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="ar_name">@lang('tr.Arabic Name')</label>
                <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $bundle->ar_name }}">
            </div>
        </div>


    </div>

    <div class="row">



        <div class="col-lg-4">
            <div class="form-group">
                <label for="price">@lang('tr.Price')</label>
                <input type="number" step="1" min="1" name="price" id="price" class="form-control" value="{{ $bundle->price }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="start">@lang('tr.start')</label>
                <input type="date" name="start" id="start" class="form-control" value="{{ $bundle->start }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="end">@lang('tr.end')</label>
                <input type="date"  name="end" id="end" class="form-control" value="{{ $bundle->end }}">
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="text-input9">@lang('tr.en_description')</label>
                <textarea  name="en_description" rows="5">
                                    {{ $bundle->en_description }}
                                </textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="text-input9">@lang('tr.ar_Descriptions')</label>
                <textarea   name="ar_description" >
                                    {{ $bundle->ar_description }}
                                </textarea>
            </div>
        </div>
    </div>

</fieldset>