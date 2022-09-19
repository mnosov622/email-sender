$(document).on('submit', '.intro-form, .consultation-form', function(e) {
    e.preventDefault();

    const names = document.querySelectorAll('input[data-name]');
    const phones = document.querySelectorAll('input[data-phone]');
    const label  = document.querySelectorAll('label');
    let nameCorrect = false;
    let phoneCorrect = false;

    for( let name of names) {
        if(/^[A-Za-zа-яА-Я\s\-]*$/.test(name.value)) {
            if(name.value) {
                localStorage.setItem('name', name.value);
                nameCorrect = true;
            }
        }
        else {
            document.querySelector('.error-text-name').innerHTML = 'Укажите, пожалуйста, имя';
            name.style.marginBottom = "25px";
            name.nextElementSibling.textContent = 'Укажите, пожалуйста, имя' ;
            return false;
        }
    }

    for( let phone of phones) {
        if(/^[0-9-+\s()]*$/.test(phone.value)) {
            if(phone.value) {
                localStorage.setItem('phone', phone.value);   
                phoneCorrect = true;
            }
        }
        else {
            label.forEach(l => {
                l.style.display = 'block';
            })
            phone.style.marginBottom = "25px";
            phone.nextElementSibling.innerHTML = 'Укажите, пожалуйста, номер телефона';
            return false;
        }
    }

    if(nameCorrect && phoneCorrect) {
        window.location.href = "thankyou.html";
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

});