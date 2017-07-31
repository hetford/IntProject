<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            'name' => 'Test HR Document',
            'ext' => '.txt',
            'category' => 'HR',
            'active' => false,
            'version' => '0.1',
            'isDeleted' => '0',
            'author' => '1',
            'filePath' => 'http://localhost/ip3/public/docstorage/HR'
        ]);
        DB::table('documents')->insert([
            'name' => 'Test Development Document',
            'ext' => '.txt',
            'category' => 'Development',
            'active' => true,
            'version' => '0.1',
            'isDeleted' => '0',
            'author' => '1',
            'filePath' => 'http://localhost/ip3/public/docstorage/Development'
        ]);
        DB::table('documents')->insert([
            'name' => 'Test Payroll Document',
            'ext' => '.txt',
            'category' => 'Payroll',
            'active' => false,
            'version' => '0.1',
            'isDeleted' => '0',
            'author' => '1',
            'filePath' => 'http://localhost/ip3/public/docstorage/Payroll'
        ]);
    }
}
