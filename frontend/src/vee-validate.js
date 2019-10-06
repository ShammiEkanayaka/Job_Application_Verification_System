//import { ValidationProvider } from 'vee-validate/dist/vee-validate.full';
import { required, confirmed, length, email, max, alpha_spaces, min, regex, mimes, between } from "vee-validate/dist/rules";
import { extend } from "vee-validate";

extend("required", {
  ...required,
  message: "This field is required"
});

extend("email", {
  ...email,
  message: "This field must be a valid email"
});

extend("confirmed", {
  ...confirmed,
  message: "This field confirmation does not match"
});

extend("length", {
  ...length,
  message: "This field must have 2 options"
});

extend("max", {
    ...max,
    message: "The field may not be greater than 255 characters"
  });

extend("alpha_spaces", {
    ...alpha_spaces,
    message: "The field may only contain alphabetic characters as well as spaces"
  });

extend("min", {
    ...min,
    message: "The field must be at least 6 characters"
  });
  
  extend("regex", {
    ...regex,
    message: "The field format is invalid"
  });
  
  extend("mimes", {
    ...mimes,
    message: "please upload image with .jpg or .png extension"
  });
  
  extend("between", {
    ...between,
    message: "The GPA must be between 0 and 4.00"
  });