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
            ('Pavel', 'Lerhinan', 'PS', NULL), 
            ('Boy', 'McCarroll', 'Lid', NULL), 
            ('Lisha', 'Dublin', 'Lid', NULL), 
            ('Berta', 'Golagley', 'Ouwe zak', NULL), 
            ('Aili', 'Leipnik', 'PS', NULL), 
            ('Hayward', 'Smeed', 'Ouwe zak', NULL), 
            ('Gillian', 'McGlashan', 'Lid', NULL), 
            ('Cherianne', 'Fursey', 'Lid', NULL), 
            ('Ida', 'Tomasicchio', 'PS', NULL), 
            ('Nonie', 'Gibbon', 'Lid', NULL), 
            ('Levy', 'Draijer', 'Ouwe zak', NULL), 
            ('Lesley', 'Ellerey', 'PS', NULL), 
            ('Daffie', 'Lillgard', 'PsAndere', 'Lupus'), 
            ('Shelby', 'Sarath', 'PsAndere', 'DIPs'), 
            ('Amaleta', 'Dunkinson', 'PS', NULL), 
            ('Leeanne', 'Gyngell', 'PsAndere', 'Filii Lamberti'), 
            ('Julius', 'Usherwood', 'Lid', NULL), 
            ('Lissie', 'Scotting', 'PsAndere', 'Comeatus'), 
            ('Goldarina', 'Yepiskopov', 'PsAndere', 'Hermes'), 
            ('Debi', 'Bratt', 'PS', NULL), 
            ('Welbie', 'Puddle', 'PsAndere', 'MAG'), 
            ('Florence', 'Georgel', 'Lid', NULL), 
            ('Jennee', 'Lomasna', 'PsAndere', 'Hexion'), 
            ('Astrid', 'Duell', 'Lid', NULL), 
            ('Nickola', 'Beardwell', 'Lid', NULL), 
            ('Adriena', 'Lelande', 'PsAndere', 'Agogica'), 
            ('Roy', 'Solway', 'Ouwe zak', NULL), 
            ('Reinaldos', 'Seabrooke', 'PsAndere', 'Agogica'), 
            ('Brant', 'Rouby', 'Ouwe zak', NULL), 
            ('Sallie', 'Greenman', 'Lid', NULL)
    ");
    }
}
