document.querySelector('form').addEventListener('submit'), function(e) {
    e.preventDefault();
        let $this = $(this);
        let fd = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "./delivery.php",
            data: fd,
            contentType: false,
            processData: false,
            success: function () {
                $(".intro-form, .consultation-form").trigger('reset');
            // $(".popup-success-form").addClass('open'); открывает попап окно с благодарностью
            },
        });
}
