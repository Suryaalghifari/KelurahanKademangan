<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CekDB extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        if ($db->connID) {
            echo "<h2 style='color: green;'>Database connect OK!</h2>";
        } else {
            echo "<h2 style='color: red;'>Database connect FAIL!</h2>";
        }
        // Optional: tampilkan database name & user yg dipakai
        echo "<pre>";
        echo "Host: " . $db->hostname . "\n";
        echo "Database: " . $db->database . "\n";
        echo "User: " . $db->username . "\n";
        echo "</pre>";
    }
}
