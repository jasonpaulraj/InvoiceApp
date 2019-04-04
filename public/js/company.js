//After Page Load
$(document).ready(function () {
    var logo = $("#logo").val();
    $(".custom-file-label").html(logo);
});
//Remove Validation Error
$("#name").on("click", function () {
    var check = $("#name-error").is(':visible');
    if (check) {
        $("#name-error").css("display", "none");
    }
});
$("#address_1").on("click", function () {
    var check = $("#address_1-error").is(':visible');
    if (check) {
        $("#address_1-error").css("display", "none");
    }
});
$("#city").on("click", function () {
    var check = $("#city-error").is(':visible');
    if (check) {
        $("#city-error").css("display", "none");
    }
});
$("#postcode").on("click", function () {
    var check = $("#postcode-error").is(':visible');
    if (check) {
        $("#postcode-error").css("display", "none");
    }
});
$("#state").on("click", function () {
    var check = $("#state-error").is(':visible');
    if (check) {
        $("#state-error").css("display", "none");
    }
});
$("#email").on("click", function () {
    var check = $("#email-error").is(':visible');
    if (check) {
        $("#email-error").css("display", "none");
    }
});
$("#phone").on("click", function () {
    var check = $("#phone-error").is(':visible');
    if (check) {
        $("#phone-error").css("display", "none");
    }
});

$("#logo").on("change", function () {
    var filename = $("#logo").val();
    $(".custom-file-label").html(filename);
});

//Table Pagination
$(document).ready(function () {
    $('#_singleCompany').DataTable({
        "paging": true, // false to disable pagination (or any other option)
        "pagingType": "simple_numbers", //other types: simple,full_numbers,numbers,full
        "scrollY": "50vh", //set view height for vertical scroll
        "scrollCollapse": true, //only scroll vertical
        "searching": false, //remove search box
        "ordering": false, //remove ordering
        "info": true, //show total items
        "dom": 'Bfrtip' //Show entry list
    });
    $('.dataTables_length').addClass('bs-select');

    $('#_allCompany').DataTable({
        "paging": true, // false to disable pagination (or any other option)
        "pagingType": "simple_numbers", //other types: simple,full_numbers,numbers,full
        "scrollY": "200", //set view height for vertical scroll
        "scrollCollapse": true, //only scroll vertical
        "searching": false, //remove search box
        "ordering": false, //remove ordering
        "info": true, //show total items
        "dom": 'Bfrtip' //Show entry list
    });
    $('.dataTables_length').addClass('bs-select');
});
