$(document).ready(function () {
  $("#submit_button").on("click", function () {
    var fileInput = $("#upload_file")[0];
    if (fileInput.files.length === 0) {
      alert("Please select a file.");
      return;
    }

    var formData = new FormData();
    formData.append("file", fileInput.files[0]);

    $.ajax({
      type: "POST",
      url: "uploaded_file.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#result").html(data);
      },
      error: function (xhr, status, error) {
        console.log("Error: " + error);
      },
    });
  });
});
