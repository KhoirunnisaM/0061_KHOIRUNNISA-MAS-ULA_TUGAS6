<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/App/controllers/HomeController.php';
require_once __DIR__ . '/App/controllers/BarangController.php';
require_once __DIR__ . '/App/controllers/PelangganController.php';
require_once __DIR__ . '/App/controllers/TransaksiController.php';

$database = new Database();
$db = $database->getConnection();

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null; 

switch ($controller) {
    case 'barang':
        $controllerObj = new BarangController($db);
        break;
    case 'pelanggan':
        $controllerObj = new PelangganController($db);
        break;
    case 'transaksi':
        $controllerObj = new TransaksiController($db);
        break;
    default:
        $controllerObj = new HomeController($db);
        break;
}



if (method_exists($controllerObj, $action)) {
    if ($action === 'detail' && $id !== null) {
        $controllerObj->detail($id);
    } elseif ($action === 'edit' && $id !== null) {
        $controllerObj->edit($id);
    } elseif ($action === 'delete' && $id !== null) {
        $controllerObj->delete($id);
    } elseif ($action === 'update') {
        $controllerObj->update();
    } else {
        $controllerObj->$action();
    }
} else {
    echo "Aksi tidak ditemukan.";
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
