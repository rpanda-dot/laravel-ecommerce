$(document).ready(function () {
    $('#image').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

    // Showing Brand image upon upload
    $('#brand_image').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showBrandImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
        $("#showBrandImage").show();
    });


    $('.delete-product').on('click', function () {
        if (confirm('Are you sure?')) {
            var id = $(this).data("id");
            var token = $(this).data("csrf_token");
            $.ajax({
                url: "product/" + id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    location.reload();
                }
            });

        }
    });
    $('.delete-category').on('click', function () {
        if (confirm('Are you sure?')) {
            var id = $(this).data("id");
            var token = $(this).data("csrf_token");
            $.ajax({
                url: "category/" + id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    location.reload();
                }
            });

        }
    });
    //Initialize Select2 Elements
    $('.select2').select2();

    // data tables

    $('#brands-table').DataTable();


});