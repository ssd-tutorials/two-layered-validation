var objValidation = {
	formObject : null,
	fieldsArray : null,
	classRequired : 'required',
	classWarning : 'warning',
	classEmailValidation : 'valid-email',
	classPasswordValidation : 'valid-password',
	submit : function(form) {
		this.formObject = form;
		this.removeValidation();
		//if (this.initialValidation()) {
			this.fieldsArray = this.formObject.serializeArray();
			jQuery.post('/mod/validate.php', this.fieldsArray, function(data) {
				if (!data.error) {
					objValidation.formObject.fadeOut(300, function() {
						$(this).replaceWith(data.message);
					});
				} else {
					objValidation.clearPassword();
					objValidation.validationDisplay(data.validation);
				}
			}, 'json');
		/*
} else {
			this.clearPassword();
		}
*/
	},
	removeValidation : function() {
		this.formObject.find('.' + this.classWarning).remove();
	},
	clearPassword : function() {
		var password = this.formObject.find('input[type="password"]');
		if (password) {
			if (jQuery.isArray(password)) {
				jQuery.each(password, function() {
					$(this).val('');
				});
			} else {
				password.val('');
			}
		}
	},
	initialValidation : function() {
		var valid = [];
		var formElements = this.formObject[0].elements;
		jQuery.each(formElements, function(index, element) {
			var id = $(element).attr('id');
			var val = $(element).val();
			var type = $(element).attr('type');
			if (
				$(element).hasClass(objValidation.classRequired) &&
				!$(element).attr('disabled') &&
				$(element).is(':visible')
			) {
				switch(type) {
					case 'checkbox':
					if (!$(element).attr('checked')) {
						objValidation.initialValidationDisplay(id, element);
						valid.push(id);
					}
					break;
					case 'radio':
					var element_name = $(element).attr('name');
					if (!$('input[name="'+element_name+'"]').is(':checked')) {
						objValidation.initialValidationDisplay(element_name, element);
						valid.push(id);
					}
					break;
					default:
					if (val === '') {
						objValidation.initialValidationDisplay(id, element);
						valid.push(id);
					} else {
						if (
							$(element).hasClass(objValidation.classEmailValidation) 
							&&
							!objValidation.emailValidation(val)
						) {
							objValidation.initialValidationDisplay(id, element);
							valid.push(id);
						} else if (
							$(element).hasClass(objValidation.classPasswordValidation) &&
							!objValidation.passwordValidation(val)
						) {
							objValidation.initialValidationDisplay(id, element);
							valid.push(id);
						}
					}
				}
			}
		});
		return valid.length > 0 ? false : true;
	},
	initialValidationDisplay : function(id, element) {
		var message = $(element).attr('title');
		var warning = '<span class="' + objValidation.classWarning + '">';
		warning += message + '</span>';
		objValidation.formObject.find('.' + id).prepend(warning);
	},
	emailValidation : function(email) {
		var emailPattern = /^[a-zA-Z0-9._\-]+@[a-zA-Z0-9]+([.\-]?[a-zA-Z0-9]+)?([\.]{1}[a-zA-Z]{2,4}){1,4}$/;
		return emailPattern.test(email);
	},
	passwordValidation : function(password) {
		return password.length < 6 ? false : true;
	},
	validationDisplay : function(validation) {
		if (validation !== '') {
			jQuery.each(validation, function(k, v) {
				v = '<span class="' + objValidation.classWarning + '">' + v + '</span>';
				objValidation.formObject.find('.' + k).prepend(v);
			});
		}
	}
};
$(function() {
	
	$('form').submit(function() {
		objValidation.submit($(this));
		return false;
	});
	
});




