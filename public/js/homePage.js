$(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Vardas per trumpas!'
                    },
                    notEmpty: {
                        message: 'Prašome įrašyti savo vardą.'
                    }
                }
            },
            last_name: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Pavardė yra per trumpa!'
                    },
                    notEmpty: {
                        message: 'Prašome įrašyti savo pavardę.'
                    }
                }
            },

            city: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Miesto pavadinimas per trumpas!'
                    },
                    notEmpty: {
                        message: 'Prašome įrašyti miestą, iš kurio esate.'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Prašome įrašyti savo elektroninį paštą.'
                    },
                    emailAddress: {
                        message: 'Elektroninis paštas neteisingas!'
                    }
                }
            },

            password: {
                validators: {
                    stringLength: {
                        min: 6,
                        message: 'Slaptažodis yra per trumpas.'
                    },
                }
            },
            password_confirmation: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'Įvesti slaptažodžiai nesutampa!'
                    }
                }
            },
            age: {
                validators: {
                    notEmpty: {
                        message: 'Įveskite savo amžių.'
                    },
                }
            },

        }
    })


        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            $('#reg_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});


$(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='\{{ URL::to('/') }}\']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

    $(window).scroll(function() {
        $(".slideanim").each(function(){
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });
})