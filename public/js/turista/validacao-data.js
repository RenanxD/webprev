$(document).ready(function () {
    var today = new Date();
    var maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
    var maxDateString = maxDate.toISOString().split('T')[0];

    $('#turista_data_nascimento').attr('max', maxDateString);

    $('#turista_data_nascimento').on('change', function () {
        var selectedDate = new Date($(this).val());

        if (selectedDate > maxDate) {
            $('#date-error').show();
            $(this).val('');
        } else {
            $('#date-error').hide();
        }
    });
});
