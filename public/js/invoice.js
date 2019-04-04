$(document).ready(function () {
    $(".remove:first-child").css("display", "none");

    //Remove Validation Error
    var _name = $("#name .help-block").is(':visible');
    if (_name) {
        $("#name .help-block").css("display", "none");
    }
    //    var _name = $("#name .help-block").is(':visible');
    //
    //    var _name = $("#name .help-block").is(':visible');
});
//define template
var template = $('#sections .section:first').clone();
//define counter
var sectionsCount = 0;
//add new section
$('body').on('click', '.addsection', function () {
    //increment
    sectionsCount++;
    $('#countTotalSections').val(sectionsCount);
    //loop through each input
    var section = template.clone().find(':input').each(function () {
        //set id to store the updated section number
        var newId = this.id + "_" + sectionsCount;
        //update for label
        $(this).prev().attr('for', newId);
        //update id
        this.id = newId;
    }).end()
        //inject new section
        .appendTo('#sections');

    calcOtherSections();

    return false;
});

//remove section
$('#sections').on('click', '.remove', function () {
    //fade out section
    $(this).parent().fadeOut(300, function () {
        //remove parent element (main section)
        $(this).parent().parent().empty();
        return false;
    });
    return false;
});

//Calculations
// $('#quantity').change(function () {
//     calc();
// });
// $('#discount_percentage').change(function () {
//     calc();
// });
// $('#unit_price').change(function () {
//     calc();
// });
//countTotalSections
// function calc() {
//     var taxRate = $('#taxRate').val();
//     var quantity = $('#quantity').val();
//     var discount_percentage = $('#discount_percentage').val();
//     var unit_price = $('#unit_price').val();
//     var discount_amount = 0;
//     var tax = 0;
//     var sub_total = 0;
//     var total = 0;
//     var grand_total = 0;
//     var discount_amount = 0;

//     if (quantity != "" && unit_price != "") {
//         var tax = (taxRate / 100) * (quantity * unit_price);
//         var sub_total = quantity * unit_price;
//         var total = sub_total + tax;
//         var grand_total = total;

//         $('#tax').val(tax);
//         $('#sub_total').val(sub_total);
//         $('#total').val(total);
//         $('#grand_total').val(grand_total);
//     }

//     if (quantity != "" && unit_price != "" && discount_percentage != "") {
//         var discount_amount = (discount_percentage / 100) * (quantity * unit_price);
//         var tax = (taxRate / 100) * (quantity * unit_price);
//         var sub_total = (quantity * unit_price) - discount_amount;
//         var total = sub_total + tax;
//         var grand_total = total;

//         $('#tax').val(tax);
//         $('#sub_total').val(sub_total);
//         $('#total').val(total);
//         $('#grand_total').val(grand_total);
//         $('#discount_percentage').val(discount_percentage);
//         $('#discount_amount').val(discount_amount);
//     }
// }

//function calcOtherSections() {
//    //Additional Sections
//    console.log("calcOtherSections triggered");
//    var _currentSections = $('#countTotalSections').val();
//    console.log(_currentSections);
//
//    if (_currentSections > 0) {
//        console.log("check");
//        for (var z = 0; z <= _currentSections; z++) {
//            $('#quantity_' + z).on("click", function () {
//                var _formId = z - 1;
//                calcOthers(_formId);
//            });
//
////            //Calculations
////            $('#quantity_' + z).on("click", function () {
////                var val = $('#quantity_' + z).val();
////                console.log(val);
////            });
////            $('#unit_price_' + z).on("change", function () {
////                var val = $('#unit_price_' + z).val();
////                console.log(val);
////            });
//        }
//    }
//}

//function calcOthers(_formId) {
//    var taxRate = $('#taxRate').val();
//    var quantity;
//    var discount_percentage;
//    var unit_price;
//
//    //Calculations
//    $("#quantity_" + _formId).on("change", function () {
//        quantity = $('#quantity_' + _formId).val();
//        console.log("quantity", quantity);
//        returnCalc(_formId, taxRate, quantity, unit_price, discount_percentage);
//    });
//    $("#unit_price_" + _formId).on("change", function () {
//        unit_price = $('#unit_price_' + _formId).val();
//        console.log("unit_price", unit_price);
//    });
//    $("#discount_percentage_" + _formId).on("change", function () {
//        discount_percentage = $('#discount_percentage_' + _formId).val();
//        console.log("discount_percentage", discount_percentage);
//    });
//
//    returnCalc(_formId, taxRate, quantity, unit_price, discount_percentage);
//
//}

//function returnCalc(_formId, taxRate, quantity, unit_price, discount_percentage) {
//    console.log("abc");
//    var _element = _formId;
//    console.log(_element);
//    var tax = (taxRate / 100) * (quantity * unit_price);
//    var sub_total = quantity * unit_price;
//    var total = sub_total + tax;
//    var grand_total = total;
//    console.log("tax: ", tax);
//    console.log("sub_total : ", sub_total);
//    console.log("total : ", total);
//    console.log("grand_total : ", grand_total);
//    $("#tax_" + _element).val(tax);
//    $("#sub_total_" + _element).val(sub_total);
//    $("#total_" + _element).val(total);
//    $("#grand_total_" + _element).val(grand_total);
//
//    if (quantity != "" && unit_price != "" && discount_percentage != "") {
//        var discount_amount = (discount_percentage / 100) * (quantity * unit_price);
//        var tax = (taxRate / 100) * (quantity * unit_price);
//        var sub_total = (quantity * unit_price) - discount_amount;
//        var total = sub_total + tax;
//        var grand_total = total;
//
//        $("#tax_" + _element).val(tax);
//        $("#sub_total_" + _element).val(sub_total);
//        $("#total_" + _element).val(total);
//        $("#grand_total_" + _element).val(grand_total);
//        $("#discount_percentage_" + _element).val(discount_percentage);
//        $("#discount_amount_" + _element).val(discount_amount);
//    }
//}

//Invoice Validator
$().ready(function () {
    // validate the comment form when it is submitted
    // validate signup form on keyup and submit
    $("#generate_invoice").validate({
        rules: {
            cust_name: "required",
            address_1: "required",
            postal_code: { "required": true, "minlength": 5 },
            state: "required",
            city: "required",
            delivery_address_1: "required",
            delivery_postal_code: { "required": true, "minlength": 5 },
            delivery_state: "required",
            delivery_city: "required",
        },
        messages: {
            cust_name: "Please enter customer name.",
            address_1: "Please enter address.",
            postal_code: {
                required: "Please enter postal code.",
                minlength: "Postal code must consist of at least 5 numbers"
            },
            state: "Please enter state.",
            city: "Please enter city.",
            delivery_address_1: "Please enter address.",
            delivery_postal_code: {
                required: "Please enter postal code.",
                minlength: "Postal code must consist of at least 5 numbers"
            },
            delivery_state: "Please enter state.",
            delivery_city: "Please enter city.",
        }
    });
});