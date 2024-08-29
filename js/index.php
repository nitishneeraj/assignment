<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AJAX Form Submission</title>
</head>

<body>

  <form id="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <button type="submit">Submit</button>
  </form>

  <div id="message"></div>

  <script>
    function submitForm(event) {
      event.preventDefault();

      var form = document.getElementById('myForm');
      var formData = new FormData(form);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', '/your-server-endpoint', true);

      xhr.onload = function() {
        var messageElement = document.getElementById('message');
        if (xhr.status >= 200 && xhr.status < 300) {
          messageElement.textContent = 'Form submitted successfully!';
          messageElement.style.color = 'green';
        } else {
          messageElement.textContent = 'Error submitting form.';
          messageElement.style.color = 'red';
        }
      };
      xhr.onerror = function() {
        var messageElement = document.getElementById('message');
        messageElement.textContent = 'Network error.';
        messageElement.style.color = 'red';
      };

      xhr.send(formData);
    }

    var form = document.getElementById('myForm');
    form.addEventListener('submit', submitForm);
  </script>

</body>

</html>