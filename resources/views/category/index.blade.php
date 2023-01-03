<!DOCTYPE html>
<head>
    <title>Category</title>
</head>
<body>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="Main-Category">Main Category : </label>
                <select class="custom-select mr-sm-2" name="Main-Category" level ='0'>
                    <option  selected disabled>
                        Select Category...
                    </option>
                    @foreach($categories as $c)
                        <option  value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div name="content">

        </div>
    </div>

        {{-- <div class="col-md-2">
            <div class="form-group">
                <label for="subcategory_id">First Sub Category : </label>
                <select class="custom-select mr-sm-2" name="subcategory_id">

                </select>
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <label for="tsubcategory_id">Third Sub Category : </label>
                <select class="custom-select mr-sm-2" name="tsubcategory_id">

                </select>
            </div>
        </div> --}}
    </div>
        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('select').on('change', function () {
            var level=$(this).attr('level');
            ++level;
            var maincategory_id = $(this).val();
            if (maincategory_id) {
                $.ajax({
                    url: "{{ URL::to('get-categories') }}/" + maincategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if(data.length>0){
                        $('div[name="content"]').empty();
                        $('div[name="content"]').append('<div class="col-md-2" level='+(level)+'><div class="form-group"><label for="Category-'+maincategory_id+'">Sub Category : </label><select class="custom-select mr-sm-2" name="Category-'+maincategory_id+'" level='+(level)+'><option  selected disabled>Select Category...</option></select></div></div>');
                        // $('select[name="subcategory_id"]').append('<option selected disabled >Select Sub Category...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Category-'+maincategory_id+'"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('div [name="content"]').on('change','select', function () {
            var level=$(this).attr('level');
            ++level;
            var maincategory_id = $(this).val();
            if (maincategory_id) {
                $.ajax({
                    url: "{{ URL::to('get-categories') }}/" + maincategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if(data.length>0){
                        $('div[level="'+(level)+'"]').remove();
                        $('div[level="'+(level-1)+'"]').append('<div class="col-md-2" level='+(level)+'><div class="form-group"><label for="Category-'+maincategory_id+'">Sub Category : </label><select class="custom-select mr-sm-2" name="Category-'+maincategory_id+'" level='+(level)+'><option  selected disabled>Select Category...</option></select></div></div>');
                        // $('select[name="subcategory_id"]').append('<option selected disabled >Select Sub Category...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Category-'+maincategory_id+'"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
    </script>

</body>
</html>
