$(document).ready(function() {
  $('#change').validate({
	rules:{
	username:{
		required:true,
		rangelength:[3,16]
	},
	email:{
		required:true,
		email:true
	},
	new_password:{
	    rangelength:[6,16]
	},
	age:{
		rangelength:[1,2]
	},
	
	phone:{
		rangelength:[10,16]
	},

	info:{
		rangelength:[0,128]
	},
		
	},
	messages:{
	username:{
		required: "Field is empty",
		rangelength: "Username must contain from 3 to 16 chars"	
	},
	email: {
		required: "Field is empty",
		rangelength: "E-mail is not validated"
	},
	new_password: {
		rangelength: "Password must contain from 6 to 16 chars"
	},
	age:{
	    rangelength: "Age must be from 1 to 99 numerals"
	},
	phone:{
	    rangelength: "Phone must contain from 10 to 16 chars"
	},
	info:{
	    rangelength: "Info must contain from 0 to 128 chars"
	},
	},
 });
});
