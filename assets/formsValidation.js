// formValidation.js

document.addEventListener("DOMContentLoaded", function () {
  // Validate login form
  var loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", function (event) {
      event.preventDefault(); // Prevents form from submitting to show the error message

      var hasError = true; // Simulate validation error from server

      if (hasError) {
        alert("Incorrect email or password.");
      } else {
        this.submit(); // Submit form if no error
      }
    });
  }

  // Validate signup and contact forms
  function validateForm(event) {
    event.preventDefault(); // Prevent the form from submitting
    var form = event.target;
    var requiredFields = form.querySelectorAll(".required");
    var isValid = true;

    requiredFields.forEach(function (field) {
      if (!field.value.trim()) {
        field.style.border = "2px solid red"; // Highlight field
        isValid = false;
      } else {
        field.style.border = ""; // Remove highlight if corrected
      }
    });

    if (isValid) {
      form.submit(); // Submit form if all required fields are filled
    }
  }

  var signupForm = document.getElementById("signupForm");
  var contactForm = document.getElementById("contactForm");

  if (signupForm) {
    signupForm.addEventListener("submit", validateForm);
  }

  if (contactForm) {
    contactForm.addEventListener("submit", validateForm);
  }
});

document
  .getElementById("contactForm")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting via the browser

    var formData = new FormData(this); // Create a FormData object, passing in the form

    // Set up our request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../functions/contact_submit.php", true);

    // Set up a handler for when the request finishes
    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        // Success! Display the response
        document.getElementById("formResponse").innerHTML =
          '<p style="color: green;">' + xhr.responseText + "</p>";
      } else {
        // We reached our target server, but it returned an error
        document.getElementById("formResponse").innerHTML =
          '<p style="color: red;">Something went wrong. Please try again later.</p>';
      }
    };

    xhr.onerror = function () {
      // There was a connection error of some sort
      document.getElementById("formResponse").innerHTML =
        '<p style="color: red;">The request was unable to complete.</p>';
    };

    xhr.send(formData); // Send the FormData object to the server
  });
