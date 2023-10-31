<?php
include '../../config/db.php';

if (isset($_POST['mod_id_product'])) {
  $id_product = $_POST['mod_id_product'];
  $category = $_POST['mod_category'];
  $type = $_POST['mod_type'];
  $section = $_POST['mod_section'];
  $mark = $_POST['mod_mark'];
  $name = $_POST['mod_name'];
  $description = $_POST['mod_description'];
  $size = $_POST['mod_size'];
  $stock = $_POST['mod_stock'];
  $price = $_POST['mod_price'];

  if (!empty($_FILES['mod_image']['name'])) {
    // Se cargó un nuevo archivo de imagen
    $newImageName = "copia_" . $_FILES['mod_image']['name'];
    $tempFilePath = $_FILES['mod_image']['tmp_name'];
    $newFilePath = "img/" . $newImageName;
    if ($section == '') {
      $section = NULL;
    }
    if ($size == '') {
      $size = NULL;
    }
    // Mueve el archivo temporal al directorio de imágenes
    move_uploaded_file($tempFilePath, $newFilePath);
    try {
      $sql = $conne->prepare("UPDATE products SET category = ?, product_type = ?, section = ?, mark = ?, name = ?, description = ?, size = ?, stock = ?, price = ?, image = ? WHERE id = ?");
      $sql->execute([$category, $type, $section, $mark, $name, $description, $size, $stock, $price, $newImageName, $id_product]);

      // Cierre de la conexión
      $conne = null;
    } catch (Exception $e) {
      echo $e->getMessage();
      die();
    }
  } else {
    try {
      $sql = $conne->prepare("UPDATE products SET category = ?, product_type = ?, section = ?, mark = ?, name = ?, description = ?, size = ?, stock = ?, price = ? WHERE id = ?");
      $sql->execute([$category, $type, $section, $mark, $name, $description, $size, $stock, $price, $id_product]);

      // Cierre de la conexión
      $conne = null;
    } catch (Exception $e) {
      echo $e->getMessage();
      die();
    }
  }
} elseif (isset($_POST['add_category'])) {
  $category = $_POST['add_category'];
  $type = $_POST['add_type'];
  $section = $_POST['add_section'];
  $mark = $_POST['add_mark'];
  $name = $_POST['add_name'];
  $description = $_POST['add_description'];
  $size = $_POST['add_size'];
  $stock = $_POST['add_stock'];
  $price = $_POST['add_price'];
  $provider = $_POST['add_provider'];

  $img_name = pathinfo($_FILES["add_image"]["name"], PATHINFO_FILENAME);
  $filename = "copia_" . $img_name . '.' . strtolower(pathinfo($_FILES['add_image']['name'], PATHINFO_EXTENSION));

  // Ubicación
  $location = 'img/' . $filename;

  // Extensión del archivo
  $file_extension = strtolower(pathinfo($location, PATHINFO_EXTENSION));

  // Extensiones de imagen válidas
  $image_ext = array("jpg", "png", "jpeg", "webp");

  // Tipos MIME permitidos
  $allowed_mime_types = array('image/jpeg', 'image/png', 'image/webp');

  if (in_array($_FILES['add_image']['type'], $allowed_mime_types) && in_array($file_extension, $image_ext)) {
    if (move_uploaded_file($_FILES['add_image']['tmp_name'], $location)) {
      // Guardar información en la base de datos
      $nombre_archivo = $_FILES['add_image']['name'];
    }
  }
  if ($section == '') {
    $section = NULL;
  }
  if ($size == '') {
    $size = NULL;
  }
  if ($size == '') {
    $size = NULL;
  }
  date_default_timezone_set('America/Mexico_City');
  $time = time();
  $fecha_actual = date("Y-m-d H:i:s", $time);
  try {
    $add_products = $conne->prepare("INSERT INTO products (id, time, category, product_type, section, mark, name, description, size, stock, price, image, provider_key) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $add_products->execute(['', $fecha_actual, $category, $type, $section, $mark, $name, $description, $size, $stock, $price, $filename, $provider]);
    $conne = null;
  } catch (Exception $e) {
    echo $e->getMessage();
    die();
  }
} elseif (isset($_POST['del_id_product'])) {
  $id_product = $_POST['del_id_product'];
  try {
    $delete_product = $conne->prepare("DELETE FROM products WHERE id = ?");
    $delete_product->execute([$id_product]);
    $conne = null;
  } catch (Exception $e) {
    echo $e->getMessage();
    die();
  }
}
