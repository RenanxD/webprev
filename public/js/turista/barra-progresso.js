$(document).ready(function () {
    window.updateProgressCircles = function (step) {
        const $circles = $('#circle1, #circle2, #circle3, #circle4');
        const $lines = $('.progress-line');

        $circles.each(function (index) {
            if (index < step) {
                $(this).addClass('completed').removeClass('inactive').text('').css('color', '#fff');
            } else if (index === step) {
                $(this).addClass('active').removeClass('completed').text(index + 1).css('color', '#fff');
            } else {
                $(this).removeClass('completed active').addClass('inactive').text(index + 1).css('color', '#555');
            }
        });

        $lines.each(function (index) {
            if (index < step) {
                $(this).addClass('completed');
            } else {
                $(this).removeClass('completed');
            }
        });
    };
});
