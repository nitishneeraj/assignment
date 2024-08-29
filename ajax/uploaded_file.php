<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
  $file_path = $_FILES['file']['tmp_name'];
  $fileName = $_FILES['file']['name'];
  $upload_path = './uploads/';
  $destPath = $upload_path . $fileName;

  if (!is_dir($upload_path)) {
    mkdir($upload_path, 0755, true);
  }

  if (move_uploaded_file($file_path, $destPath)) {
    echo 'file uploaded successfully';
  } else {
    echo 'Error: file not uploaded';
  }
} else {
  echo 'Invalid request method';
}
