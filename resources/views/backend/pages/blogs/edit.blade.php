

    <!--begin::Portlet-->
    <div class="m-portlet">

        <div class="m-portlet__head">
            <div class="m-portlet__head-progress">

                <!-- here can place a progress bar-->
            </div>
            <div class="m-portlet__head-wrapper">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
													<span class="m-portlet__head-icon">
														<i class="flaticon-map-location"></i>
													</span>
                        <h3 class="m-portlet__head-text">
                            @lang('tr.Update section')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <a href="{{ route('blogs') }}" class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
													<span>
														<i class="la la-arrow-left"></i>
														<span>@lang('tr.back to list')</span>
													</span>
                    </a>


                </div>
            </div>
        </div>

        <!--begin::Form-->

        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{ route('update_blogs',$blog_data->id) }}" method="post" enctype="multipart/form-data" id="selectform">
            @csrf
            <div class="m-portlet__body">

                <div class="form-group m-form__group row">

                    <div class="col-lg-6">
                        <label for="en_name">@lang('tr.en_name'):</label>
                        <div class="m-input-icon m-input-icon--right">
                            <input type="text" name="en_name" id="en_name"  value="{{ $blog_data->en_name }}" class="form-control m-input">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="ar_name">@lang('tr.ar_name'):</label>
                        <div class="m-input-icon m-input-icon--right">
                            <input type="text" name="ar_name" id="ar_name"  value="{{ $blog_data->ar_name }}" class="form-control m-input">
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <label for="en_desc">@lang('tr.en_description'):</label>
                        <div class="m-input-icon m-input-icon--right">
                            <textarea name="en_desc" id="en_desc" cols="30" rows="10" class="form-control m-input"  value="">{{ $blog_data->en_desc }}</textarea>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="ar_desc">@lang('tr.ar_description'):</label>
                        <div class="m-input-icon m-input-icon--right">
                            <textarea name="ar_desc" id="ar_desc" cols="30" rows="10" class="form-control m-input" value="">{{ $blog_data->ar_desc }}</textarea>

                        </div>
                    </div>



                    <div class="col-lg-6">
                        <label class="col-lg-4 file">@lang('tr.Select another Image')</label>
                        <div class="col-md-8">
                            <input type="file" name="blog_image" id="file" aria-label="File browser example"  onchange="readURL(this);"  />
                            <img src="{{ URL::to('/') }}/backend/dashboard_images/blogs/{{ $blog_data->blog_image }}" class="img-thumbnail" width="100" />

                            <img id="blah" src="#" alt="@lang('tr.your image')" />
                            <span class="file-custom"></span>
                        </div>



                    </div>



                    <div class="col-lg-6">
                        <label for="type">@lang('tr.type')</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="blogs"@if($blog_data->type=='blogs') selected='selected' @endif >blogs</option>
                            <option value="news"@if($blog_data->type=='news') selected='selected' @endif >news</option>



                        </select>
                    </div>

                </div>




                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>&nbsp;@lang('tr.update')
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

    <!--end::Portlet-->

