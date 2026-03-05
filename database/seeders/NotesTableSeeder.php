<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notes = [
            // --- USER 1 (ID: 1) ---
            ['user_id' => 1, 'title' => 'Note 1.1', 'content' => 'Content for user 1 note 1', 'created_at' => '2024-01-01 08:00:00', 'updated_at' => '2024-01-01 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.2', 'content' => 'Content for user 1 note 2', 'created_at' => '2024-01-01 09:00:00', 'updated_at' => '2024-01-01 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.3', 'content' => 'Content for user 1 note 3', 'created_at' => '2024-01-02 08:00:00', 'updated_at' => '2024-01-02 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.4', 'content' => 'Content for user 1 note 4', 'created_at' => '2024-01-02 09:00:00', 'updated_at' => '2024-01-02 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.5', 'content' => 'Content for user 1 note 5', 'created_at' => '2024-01-03 08:00:00', 'updated_at' => '2024-01-03 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.6', 'content' => 'Content for user 1 note 6', 'created_at' => '2024-01-03 09:00:00', 'updated_at' => '2024-01-03 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.7', 'content' => 'Content for user 1 note 7', 'created_at' => '2024-01-04 08:00:00', 'updated_at' => '2024-01-04 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.8', 'content' => 'Content for user 1 note 8', 'created_at' => '2024-01-04 09:00:00', 'updated_at' => '2024-01-04 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.9', 'content' => 'Content for user 1 note 9', 'created_at' => '2024-01-05 08:00:00', 'updated_at' => '2024-01-05 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.10', 'content' => 'Content for user 1 note 10', 'created_at' => '2024-01-05 09:00:00', 'updated_at' => '2024-01-05 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.11', 'content' => 'Content for user 1 note 11', 'created_at' => '2024-01-06 08:00:00', 'updated_at' => '2024-01-06 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.12', 'content' => 'Content for user 1 note 12', 'created_at' => '2024-01-06 09:00:00', 'updated_at' => '2024-01-06 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.13', 'content' => 'Content for user 1 note 13', 'created_at' => '2024-01-07 08:00:00', 'updated_at' => '2024-01-07 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.14', 'content' => 'Content for user 1 note 14', 'created_at' => '2024-01-07 09:00:00', 'updated_at' => '2024-01-07 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.15', 'content' => 'Content for user 1 note 15', 'created_at' => '2024-01-08 08:00:00', 'updated_at' => '2024-01-08 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.16', 'content' => 'Content for user 1 note 16', 'created_at' => '2024-01-08 09:00:00', 'updated_at' => '2024-01-08 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.17', 'content' => 'Content for user 1 note 17', 'created_at' => '2024-01-09 08:00:00', 'updated_at' => '2024-01-09 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.18', 'content' => 'Content for user 1 note 18', 'created_at' => '2024-01-09 09:00:00', 'updated_at' => '2024-01-09 09:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.19', 'content' => 'Content for user 1 note 19', 'created_at' => '2024-01-10 08:00:00', 'updated_at' => '2024-01-10 08:00:00'],
            ['user_id' => 1, 'title' => 'Note 1.20', 'content' => 'Content for user 1 note 20', 'created_at' => '2024-01-10 09:00:00', 'updated_at' => '2024-01-10 09:00:00'],

            // --- USER 2 (ID: 2) ---
            ['user_id' => 2, 'title' => 'Note 2.1', 'content' => 'Content for user 2 note 1', 'created_at' => '2024-01-11 08:00:00', 'updated_at' => '2024-01-11 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.2', 'content' => 'Content for user 2 note 2', 'created_at' => '2024-01-11 09:00:00', 'updated_at' => '2024-01-11 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.3', 'content' => 'Content for user 2 note 3', 'created_at' => '2024-01-12 08:00:00', 'updated_at' => '2024-01-12 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.4', 'content' => 'Content for user 2 note 4', 'created_at' => '2024-01-12 09:00:00', 'updated_at' => '2024-01-12 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.5', 'content' => 'Content for user 2 note 5', 'created_at' => '2024-01-13 08:00:00', 'updated_at' => '2024-01-13 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.6', 'content' => 'Content for user 2 note 6', 'created_at' => '2024-01-13 09:00:00', 'updated_at' => '2024-01-13 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.7', 'content' => 'Content for user 2 note 7', 'created_at' => '2024-01-14 08:00:00', 'updated_at' => '2024-01-14 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.8', 'content' => 'Content for user 2 note 8', 'created_at' => '2024-01-14 09:00:00', 'updated_at' => '2024-01-14 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.9', 'content' => 'Content for user 2 note 9', 'created_at' => '2024-01-15 08:00:00', 'updated_at' => '2024-01-15 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.10', 'content' => 'Content for user 2 note 10', 'created_at' => '2024-01-15 09:00:00', 'updated_at' => '2024-01-15 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.11', 'content' => 'Content for user 2 note 11', 'created_at' => '2024-01-16 08:00:00', 'updated_at' => '2024-01-16 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.12', 'content' => 'Content for user 2 note 12', 'created_at' => '2024-01-16 09:00:00', 'updated_at' => '2024-01-16 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.13', 'content' => 'Content for user 2 note 13', 'created_at' => '2024-01-17 08:00:00', 'updated_at' => '2024-01-17 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.14', 'content' => 'Content for user 2 note 14', 'created_at' => '2024-01-17 09:00:00', 'updated_at' => '2024-01-17 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.15', 'content' => 'Content for user 2 note 15', 'created_at' => '2024-01-18 08:00:00', 'updated_at' => '2024-01-18 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.16', 'content' => 'Content for user 2 note 16', 'created_at' => '2024-01-18 09:00:00', 'updated_at' => '2024-01-18 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.17', 'content' => 'Content for user 2 note 17', 'created_at' => '2024-01-19 08:00:00', 'updated_at' => '2024-01-19 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.18', 'content' => 'Content for user 2 note 18', 'created_at' => '2024-01-19 09:00:00', 'updated_at' => '2024-01-19 09:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.19', 'content' => 'Content for user 2 note 19', 'created_at' => '2024-01-20 08:00:00', 'updated_at' => '2024-01-20 08:00:00'],
            ['user_id' => 2, 'title' => 'Note 2.20', 'content' => 'Content for user 2 note 20', 'created_at' => '2024-01-20 09:00:00', 'updated_at' => '2024-01-20 09:00:00'],

            // --- USER 3 (ID: 3) ---
            ['user_id' => 3, 'title' => 'Note 3.1', 'content' => 'Content for user 3 note 1', 'created_at' => '2024-01-21 08:00:00', 'updated_at' => '2024-01-21 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.2', 'content' => 'Content for user 3 note 2', 'created_at' => '2024-01-21 09:00:00', 'updated_at' => '2024-01-21 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.3', 'content' => 'Content for user 3 note 3', 'created_at' => '2024-01-22 08:00:00', 'updated_at' => '2024-01-22 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.4', 'content' => 'Content for user 3 note 4', 'created_at' => '2024-01-22 09:00:00', 'updated_at' => '2024-01-22 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.5', 'content' => 'Content for user 3 note 5', 'created_at' => '2024-01-23 08:00:00', 'updated_at' => '2024-01-23 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.6', 'content' => 'Content for user 3 note 6', 'created_at' => '2024-01-23 09:00:00', 'updated_at' => '2024-01-23 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.7', 'content' => 'Content for user 3 note 7', 'created_at' => '2024-01-24 08:00:00', 'updated_at' => '2024-01-24 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.8', 'content' => 'Content for user 3 note 8', 'created_at' => '2024-01-24 09:00:00', 'updated_at' => '2024-01-24 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.9', 'content' => 'Content for user 3 note 9', 'created_at' => '2024-01-25 08:00:00', 'updated_at' => '2024-01-25 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.10', 'content' => 'Content for user 3 note 10', 'created_at' => '2024-01-25 09:00:00', 'updated_at' => '2024-01-25 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.11', 'content' => 'Content for user 3 note 11', 'created_at' => '2024-01-26 08:00:00', 'updated_at' => '2024-01-26 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.12', 'content' => 'Content for user 3 note 12', 'created_at' => '2024-01-26 09:00:00', 'updated_at' => '2024-01-26 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.13', 'content' => 'Content for user 3 note 13', 'created_at' => '2024-01-27 08:00:00', 'updated_at' => '2024-01-27 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.14', 'content' => 'Content for user 3 note 14', 'created_at' => '2024-01-27 09:00:00', 'updated_at' => '2024-01-27 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.15', 'content' => 'Content for user 3 note 15', 'created_at' => '2024-01-28 08:00:00', 'updated_at' => '2024-01-28 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.16', 'content' => 'Content for user 3 note 16', 'created_at' => '2024-01-28 09:00:00', 'updated_at' => '2024-01-28 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.17', 'content' => 'Content for user 3 note 17', 'created_at' => '2024-01-29 08:00:00', 'updated_at' => '2024-01-29 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.18', 'content' => 'Content for user 3 note 18', 'created_at' => '2024-01-29 09:00:00', 'updated_at' => '2024-01-29 09:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.19', 'content' => 'Content for user 3 note 19', 'created_at' => '2024-01-30 08:00:00', 'updated_at' => '2024-01-30 08:00:00'],
            ['user_id' => 3, 'title' => 'Note 3.20', 'content' => 'Content for user 3 note 20', 'created_at' => '2024-01-30 09:00:00', 'updated_at' => '2024-01-30 09:00:00'],
        ];

        DB::table('notes')->insert($notes);
    }
}