<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->truncate();
        DB::statement("INSERT INTO members (firstName, lastName, type, andereVereniging) VALUES
        ('Rens', 'Remans', 'PS', NULL),
        ('Colin', 'Vreys', 'PS', NULL),
        ('Boud', 'Goossenaerts', 'PS', NULL),
        ('Anika', 'Van Waeyenberg', 'PS', NULL),
        ('Wout', 'Windmolders', 'PS', NULL),
        ('Zoë', 'Smits', 'PS', NULL),
        ('Arnaud', 'Paquet', 'PS', NULL),
        ('Joachim', 'Geelen', 'PS', NULL),
        ('Katrijn', 'Vandevenne', 'PS', NULL),
        ('Brent', 'Reynders', 'PS', NULL),
        ('Gitte', 'Vandevenne', 'PS', NULL),
        ('Vera', 'Kim', 'PS', NULL),
        ('Vinz', 'Roosen', 'Lid', NULL),
        ('Axelle', 'Hendrikx', 'Lid', NULL),
        ('Noah', 'Piskor', 'Lid', NULL),
        ('Jonas', 'Sikorski', 'Ouwe zak', NULL),
        ('Toon', 'Janssens', 'Ouwe zak', NULL),
        ('Sofie', 'Gielen', 'Ouwe zak', NULL),
        ('Lars', 'Debloudts', 'PsAndere', 'Lupus'),
        ('Jens', 'Swinnen', 'PsAndere', 'Netsilana')
    ");
    }
}
