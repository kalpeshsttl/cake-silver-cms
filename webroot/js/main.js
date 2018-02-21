(function($){
	$(document).ready(function(){
    	//jQuery Validation Settings
        if(typeof $.validator !== "undefined"){
        	var $org_validator_msg = $.validator.messages;
        	var $_validator_msg = {
			    required: "<%= labeltext %> is required.",
			    remote: "Please fix <%= labeltext %>.",
			    email: "Please enter a valid email address.",
			    url: "Please enter a valid URL.",
			    date: "Please enter a valid date.",
			    dateISO: "Please enter a valid date (ISO).",
			    number: "Please enter a valid number.",
			    digits: "Please enter only digits.",
			    creditcard: "Please enter a valid credit card number.",
			    equalTo: "Please enter the same value again.",
			    accept: "Please enter a value with a valid extension.",
			    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
			    minlength: jQuery.validator.format("Please enter at least {0} characters."),
			    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
			    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
			    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
			    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
			};
			var $_replace_msg_pattern = {
				'labeltext':''
			};
        	$.extend($.validator.messages, $_validator_msg);
        	$.validator.setDefaults({
        		errorElement: "div",
				errorPlacement: function ( error, element ) {
					//error
					error.addClass( "invalid-feedback" );
					if ( element.prop( "type" ) === "checkbox" || element.prop( "type" ) === "radio" ) {
						error.insertAfter( element.parent( "div" ).find('label') );
					} else {
						error.insertAfter( element );
					}
				},
				showErrors: function(errorMap, errorList) {
					//fillter error
					_.map(errorList, function(item){
						var $element_id = $(item.element).attr('id');
						$_replace_msg_pattern['labeltext'] = $('label[for="' + $element_id + '"]').text();
						var $template = _.template(item.message);
						item.message = $template($_replace_msg_pattern);
					});
				    this.defaultShowErrors();
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			});
        }
    });

    $(window).load(function(){
		//Enable Tooltips
    	$('[title]').tooltip();
    });

})($ || jQuery);