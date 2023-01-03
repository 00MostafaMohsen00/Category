<!DOCTYPE html>
<head>
    <title>Category</title>
</head>
<body>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="Main-Category">Main Category : </label>
                <select class="custom-select mr-sm-2" name="Main-Category">
                    <option  selected disabled>
                        Select Category...
                    </option>
                    @foreach($categories as $c)
                        <option  value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2">
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
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('select[name="Main-Category"]').on('change', function () {
            var maincategory_id = $(this).val();
            if (maincategory_id) {
                $.ajax({
                    url: "{{ URL::to('get-categories') }}/" + maincategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option selected disabled >Select Sub Category...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

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
        $('select[name="subcategory_id"]').on('change', function () {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{ URL::to('get-categories') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="tsubcategory_id"]').empty();
                        $('select[name="tsubcategory_id"]').append('<option selected disabled >Select Sub Category...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="tsubcategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

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
