
        $('#validation-form_').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						fiber_name: {
							required: true,
                                                       
						},
						fiber_length: {
							required: true,
						},
						gi: {
							required: true,
						},
						
						fiber_info: {
							required: true,
						},

					},
					messages: {
						fiber_name: {
							required: "Введите название ОЛ",
						},
						fiber_length: {
							required: "Введите длину ОЛ",
						},
						gi: {
							required: "Введите GI",
						},
						
                        fiber_info: "Введите инофрмацию по ОЛ"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					}

				});
                     