<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$search = 'Chutiya';
$tables = DB::select('SHOW TABLES');
$dbname = config('database.connections.mysql.database');
$property = "Tables_in_" . $dbname;

foreach ($tables as $table) {
    $tableName = $table->$property;
    $columns = DB::select("SHOW COLUMNS FROM `$tableName` ");
    
    foreach ($columns as $column) {
        $colName = $column->Field;
        $type = $column->Type;
        
        // Only search text/varchar columns
        if (str_contains($type, 'char') || str_contains($type, 'text') || str_contains($type, 'blob')) {
            try {
                $results = DB::table($tableName)
                    ->where($colName, 'LIKE', "%$search%")
                    ->get();
                
                if ($results->count() > 0) {
                    echo "Found in Table: $tableName, Column: $colName\n";
                    foreach ($results as $row) {
                        echo "  ID: " . ($row->id ?? 'N/A') . "\n";
                    }
                }
            } catch (\Exception $e) {
                // Skip if column query fails
            }
        }
    }
}

echo "Search completed.\n";
