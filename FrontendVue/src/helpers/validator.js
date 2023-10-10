// validation.js

export default function validateInput(value, type = 'required') {
    switch (type) {
      case 'required':
        if (value.trim() === '') {
          return 'This field is required.';
        }
        return '';
  
      case 'email':
        // eslint-disable-next-line no-case-declarations
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailRegex.test(value)) {
          return 'Invalid email format.';
        }
        return '';
  
      // Add more validation cases as needed
  
      default:
        return ''; // Default to empty string if validation type is not recognized
    }
  }
  