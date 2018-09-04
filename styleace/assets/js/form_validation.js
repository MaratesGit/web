
        $('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						otdr_name: {
							required: true,
                            minlength: 3
                                                       
						},
						otdr_imei: {
							required: true,
							minlength: 5
						},
						otdr_poverka: {
							required: true,
						},
						
						otdr_ports_count: {
							required: true,
						},

					},
					messages: {
						otdr_imei: {
							required: "Введите IMEI прибора",
							minlength: "IMEI минимум 5 символов"
						},
						otdr_name: {
							required: "Введите наименование прибора",
							minlength: "Наименование минимум 3 символа"
						},
						otdr_poverka: "Введите дату поверки",
                                                otdr_ports_count: "Введите количество портов"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					}

				});
                     