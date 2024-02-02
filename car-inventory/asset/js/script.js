// Select Option ============================
$(document).ready(function () {
    $("#electric, #gas").hide();

    $("#car_type").change(function () {
        $("#electric, #gas").hide();
        var selectedOption = $(this).val();
        if (selectedOption === "electric") {
            $("#electric").show();
        } else if (selectedOption === "gas") {
            $("#gas").show();
        }
    });
});



// Form-Table Hide ============================
$(document).ready(function () {
    $('#carTable').DataTable();
    $('#carTable_length').hide();
    $('#carTable_filter').hide();
});
