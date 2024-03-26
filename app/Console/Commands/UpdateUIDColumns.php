<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class UpdateUIDColumns extends Command
{
    protected $signature = 'update:uid-columns';

    protected $description = 'Update uid columns from integer to bigInteger';

    public function handle()
    {
        $tables = ['pi_classes', 'subjects', 'chapters', 'weights', 'competences', 'pis', 'bis']; // Add your table names here

        foreach ($tables as $table) {
            $this->updateTable($table);
        }

        $this->info('UID columns updated successfully.');
    }

    private function updateTable($tableName)
    {
        Schema::table($tableName, function ($table) {
            $table->bigInteger('uid')->unique()->change();
        });
}
}
