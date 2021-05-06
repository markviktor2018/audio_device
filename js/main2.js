
$(function () {
    // Smooth Scroll

    $("a.go").click(function (e) {
        e.preventDefault();
        elementClick = $(this).attr("href");
        destination = $(elementClick).offset().top;
        $("body,html").animate({scrollTop: destination }, 800);
    });


    // Modal Window

    $('.modal-btn').click(function () {
        $('#callModal').arcticmodal({
            closeOnEsc: true,
            overlay: {
                css: {
                    backgroundColor: '#000',
                    opacity: 0.90
                }
            }
        });
    });

    //E-mail Ajax Send

    $(".uni-form").submit(function() { //Change
        var th = $(this);
        $.ajax({
            type: "POST",
            url: "mail.php", //Change
            data: th.serialize()
        }).always(function() {
            location.href = 'http://school.alexkhab.ru/success.html';
        });
        return false;
    });



});



