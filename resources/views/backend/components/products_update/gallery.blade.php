<h3>@lang('tr.Gallery')</h3>
                <fieldset style="border:0;width:100%;overflow-y: scroll;">
                    <h3>@lang('tr.Gallery')</h3><hr>
                    <div class="row">
                        @foreach($Product_Gallery as $gallery)
                            <div class="col-lg-4">
                                <img src="{{ asset('backend/dashboard_images/Products/'.$gallery->image) }}" class="img-responsive img-thumbnail">
                                <br>
                                <a href="{{route('delete_product_img',$gallery->id)}}" onclick="return confirm('tr.Are You Sure ?')" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> </a>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="buffets_image">@lang('tr.Image')</label>
                                <div class="input-images"></div>
                                {{-- <input type="file" name="buffets_image" id="buffets_image" class="form-control" required> --}}
                            </div>
                        </div>
                    </div>
                   
                </fieldset>