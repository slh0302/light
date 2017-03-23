var ContactForm = function () {

    return {

        //Contact Form
        initContactForm: function () {
	        // Validation
	        $("#signupForm").validate({
	            // Rules for form validation
	            rules:
	            {
	                name:
	                {
	                    required: true
	                },
	                email:
	                {
	                    required: true,
	                    email: true
	                }
	                subject：
	                {
	                	required: true
	                },
	                message:
	                {
	                    required: true,
	                    minlength: 10
	                }
	            },

	            // Messages for form validation
	            messages:
	            {
	                name:
	                {
	                    required: 'Please enter your name',
	                },
	                email:
	                {
	                    required: 'Please enter your email address',
	                    email: 'Please enter a VALID email address'
	                }
	                subject：
	                {
	                	required: 'Please enter your subject',
	                },
	                message:
	                {
	                    required: 'Please enter your message'
	                }
	            }
	            ,

	            // Ajax form submition
	            submitHandler: function(form)
	            {
	                $(form).ajaxSubmit(
	                {
	                    beforeSend: function()
	                    {
	                        $('#signupForm input[type="submit"]').attr('disabled', true);
	                    },
	                    success: function()
	                    {
	                        $("#signupForm").addClass('submited');
	                    }
	                });
	            },

	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            // }
	        });
        }

    };

}();

