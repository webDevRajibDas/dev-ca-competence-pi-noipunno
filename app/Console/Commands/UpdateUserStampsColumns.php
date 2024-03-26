<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class UpdateUserStampsColumns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:update-user-stamps-columns';

    protected $description = 'Update userstamps columns from integer to bigInteger';

    public function handle()
    {
        $tables = ['pi_classes', 'subjects', 'chapters', 'weights', 'competences', 'pis', 'bis']; // Add your table names here

        foreach ($tables as $table) {
            $this->updateTable($table, ['created_by', 'updated_by', 'deleted_by']);
        }

        $this->info('Userstamps columns updated successfully.');
    }

    private function updateTable($tableName, $columns)
    {
        Schema::table($tableName, function ($table) use ($columns) {
            foreach ($columns as $column) {
                $table->bigInteger($column)->nullable()->change();
            }
        });
    }
}
