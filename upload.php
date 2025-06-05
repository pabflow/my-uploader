<?php
header('Content-Type: application/json');
if (isset($_FILES['uploadfile'])) {
  $file = $_FILES['uploadfile'];
  $uploadDir = __DIR__ . "/public/uploads/";

  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  $targetPath = $uploadDir . basename($file["name"]);
  if (move_uploaded_file($file["tmp_name"], $targetPath)) {
    $fileUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/uploads/' . basename($file["name"]);
    echo json_encode(["fileUrl" => $fileUrl]);
  } else {
    echo json_encode(["error" => "Upload failed"]);
  }
} else {
  echo json_encode(["error" => "No file received"]);
}
?>

