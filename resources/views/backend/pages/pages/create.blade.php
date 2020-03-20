<div class="card uper">
    <div class="card-header">
        Add page
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form  action="{{ route('store_pages') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label for="en_name">@lang('tr.en_name'):</label>
                <input type="text" class="form-control" id ="en_name"  name="en_name"  value="{{ old('en_name') }}" placeholder="@lang('tr.Enter English Name')"/>
            </div>
            <div class="form-group">
                <label for="ar_name">@lang('tr.ar_name') :</label>
                <input type="text" class="form-control" name="ar_name"  id ="ar_name"  value="{{ old('ar_name') }}"  placeholder="@lang('tr.Enter Arabic Name')"/>
            </div>

            <div class="form-group">
                <label for="en_desc">@lang('tr.en_description'):</label>
                <textarea name="en_desc" id="en_desc" cols="30" rows="10" class="form-control m-input" placeholder="@lang('tr.Enter English description')" required>{{ old('en_desc') }}</textarea>

            </div>


            <div class="form-group">
                <label for="ar_desc">@lang('tr.ar_description'):</label>
                <textarea name="ar_desc" id="ar_desc" cols="30" rows="10" class="form-control m-input" placeholder="@lang('tr.Enter Arabic description')" required>{{ old('ar_desc') }}</textarea>

            </div>



            <div class="form-group">

                    <label class="col-lg-4 file">@lang('tr.Select  page_image')</label>
                    <div class="col-md-8">
                        <input type="file" id="file"   name="page_image" aria-label="File browser example" onchange="readURL(this);" />
                        <img id ="file3"  src="#" alt="@lang('tr.your image')"/>
                        <span class="file-custom"></span>
                    </div>
            </div>

            <button type="submit" class="btn btn-primary">@lang('tr.save')</button>



        </form>
    </div>
</div>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).siblings("img").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

