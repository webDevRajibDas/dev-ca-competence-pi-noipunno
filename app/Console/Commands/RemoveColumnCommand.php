<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RemoveColumnCommand extends Command
{
    protected $signature = 'custom:remove-columns {tableColumnPairs*}';
    protected $description = 'Remove columns from multiple tables';

    public function handle()
    {
        $tableColumnPairs = $this->argument('tableColumnPairs');

        foreach ($tableColumnPairs as $pair) {
            list($tableName, $columnName) = explode(':', $pair);

            if (Schema::hasColumn($tableName, $columnName)) {
                // Check if column has a foreign key constraint
                $constraintCheckQuery = "SELECT COUNT(*) as count 
                                         FROM information_schema.key_column_usage 
                                         WHERE table_name = '{$tableName}' 
                                         AND column_name = '{$columnName}' 
                                         AND referenced_column_name IS NOT NULL";

                $constraintCount = DB::select($constraintCheckQuery)[0]->count;

                if ($constraintCount > 0) {
                    $this->info("Column '{$columnName}' in table '{$tableName}' has a foreign key constraint. Removing constraint first...");

                    // Remove foreign key constraint
                    $constraintRemovalQuery = "ALTER TABLE {$tableName} DROP FOREIGN KEY {$tableName}_{$columnName}_foreign";
                    DB::statement($constraintRemovalQuery);

                    $this->info("Foreign key constraint removed for column '{$columnName}' in table '{$tableName}'");
                }

                // Remove column
                $columnRemovalQuery = "ALTER TABLE {$tableName} DROP COLUMN {$columnName}";
                DB::statement($columnRemovalQuery);

                $this->info("Column '{$columnName}' removed from table '{$tableName}'");
            } else {
                $this->error("Column '{$columnName}' not found in table '{$tableName}'");
            }
        }
    }
}
