<h3>@lang('tr.Product Information')</h3>
                <fieldset style="border:0;overflow-y: scroll;width: 100%;">
                    <h3>@lang('tr.Product Information')</h3><hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="en_name">@lang('tr.English Name')</label>
                                <input type="text" name="en_name" id="en_name" class="form-control  required" value="{{ old('en_name') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="ar_name">@lang('tr.Arabic Name')</label>
                                <input type="text" name="ar_name" id="ar_name" class="form-control  required" value="{{ old('ar_name') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="product_image">@lang('tr.Image')</label>
                                <input type="file" name="product_image" id="product_image required" class="form-control ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="video">@lang('tr.Video')</label>
                                <input type="url" name="video" id="video" class="form-control  required" value="{{ old('video') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="price">@lang('tr.Price')</label>
                                <input type="number" step="1" min="1" name="price" id="price" class="form-control  required" value="{{ old('price') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="first_quantity">@lang('tr.Quantity')</label>
                                <input type="number" step="1" min="1" name="first_quantity" id="first_quantity" class="form-control  required" value="{{ old('first_quantity') }}">
                            </div>
                        </div>

                    </div>

                   

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="text-input9">@lang('tr.Descriptions')</label>
                                <textarea id="ckeditor" name="description" rows="5" class=" required" required>
                                    {{ old('description') }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                   
                </fieldset>