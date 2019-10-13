<?php

use Illuminate\Database\Seeder;
use App\Clase;
use App\Race;
use App\Weapon;

class DefaultValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ['name' => 'Paladin'],
            ['name' => 'Ranger'],
            ['name' => 'Barbarian'],
            ['name' => 'Wizard'],
            ['name' => 'Cleric'],
            ['name' => 'Warrior'],
            ['name' => 'Thief'],
        ]);

         DB::table('races')->insert([
            ['name' => 'Human'],
            ['name' => 'Elf'],
            ['name' => 'Halfling'],
            ['name' => 'Dwarf'],
            ['name' => 'Half-elf'],
            ['name' => 'Half-orc'],
            ['name' => 'Dragonborn'],
        ]);

         DB::table('weapons')->insert([
            ['name' => 'Sword'],
            ['name' => 'Dagger'],
            ['name' => 'Hammer'],
            ['name' => 'Bow and Arrows'],
            ['name' => 'Staff'],
        ]);

        $paladin_id = Clase::where('name', '=', 'Paladin')->first()['id'];
        $ranger_id = Clase::where('name', '=', 'Ranger')->first()['id'];
        $barbarian_id = Clase::where('name', '=', 'Barbarian')->first()['id'];
        $wizard_id = Clase::where('name', '=', 'Wizard')->first()['id'];
        $cleric_id = Clase::where('name', '=', 'Cleric')->first()['id'];
        $warrior_id = Clase::where('name', '=', 'Warrior')->first()['id'];
        $thief_id = Clase::where('name', '=', 'Thief')->first()['id'];

        $human_id = Race::where('name', '=', 'Human')->first()['id'];
        $elf_id = Race::where('name', '=', 'Elf')->first()['id'];
        $halfling_id = Race::where('name', '=', 'Halfling')->first()['id'];
        $dwarf_id = Race::where('name', '=', 'Dwarf')->first()['id'];
        $half_orc_id = Race::where('name', '=', 'Half-orc')->first()['id'];
        $half_elf_id = Race::where('name', '=', 'Half-elf')->first()['id'];
        $dragonborn_id = Race::where('name', '=', 'Dragonborn')->first()['id'];

        $sword_id = Weapon::where('name', '=', 'Sword')->first()['id'];
        $dagger_id = Weapon::where('name', '=', 'Dagger')->first()['id'];
        $hammer_id = Weapon::where('name', '=', 'Hammer')->first()['id'];
        $bowandarrows_id = Weapon::where('name', '=', 'Bow and Arrows')->first()['id'];
        $staff_id = Weapon::where('name', '=', 'Staff')->first()['id'];

        DB::table('race_class')->insert([
            ['race_id' => $human_id, 'class_id' => $paladin_id],
            
            ['race_id' => $half_elf_id, 'class_id' => $paladin_id],
            ['race_id' => $half_elf_id, 'class_id' => $ranger_id],
            ['race_id' => $half_elf_id, 'class_id' => $wizard_id],
            ['race_id' => $half_elf_id, 'class_id' => $cleric_id],
            ['race_id' => $half_elf_id, 'class_id' => $warrior_id],
            ['race_id' => $half_elf_id, 'class_id' => $thief_id],

            ['race_id' => $dwarf_id, 'class_id' => $paladin_id],
            ['race_id' => $dwarf_id, 'class_id' => $barbarian_id],
            ['race_id' => $dwarf_id, 'class_id' => $cleric_id],
            ['race_id' => $dwarf_id, 'class_id' => $warrior_id],
            ['race_id' => $dwarf_id, 'class_id' => $thief_id],

            ['race_id' => $elf_id, 'class_id' => $paladin_id],
            ['race_id' => $elf_id, 'class_id' => $ranger_id],
            ['race_id' => $elf_id, 'class_id' => $wizard_id],
            ['race_id' => $elf_id, 'class_id' => $cleric_id],
            ['race_id' => $elf_id, 'class_id' => $thief_id],
            
            ['race_id' => $halfling_id, 'class_id' => $paladin_id],
            ['race_id' => $halfling_id, 'class_id' => $ranger_id],
            ['race_id' => $halfling_id, 'class_id' => $wizard_id],
            ['race_id' => $halfling_id, 'class_id' => $cleric_id],
            ['race_id' => $halfling_id, 'class_id' => $warrior_id],
            ['race_id' => $halfling_id, 'class_id' => $thief_id],
			
			['race_id' => $half_orc_id, 'class_id' => $paladin_id],
            ['race_id' => $half_orc_id, 'class_id' => $ranger_id],
            ['race_id' => $half_orc_id, 'class_id' => $barbarian_id],
            ['race_id' => $half_orc_id, 'class_id' => $warrior_id],
            ['race_id' => $half_orc_id, 'class_id' => $thief_id],
            
            ['race_id' => $dragonborn_id, 'class_id' => $paladin_id],
            ['race_id' => $dragonborn_id, 'class_id' => $ranger_id],
            ['race_id' => $dragonborn_id, 'class_id' => $wizard_id],
            ['race_id' => $dragonborn_id, 'class_id' => $barbarian_id],
            ['race_id' => $dragonborn_id, 'class_id' => $warrior_id],
            ['race_id' => $dragonborn_id, 'class_id' => $thief_id],
        ]);

		 DB::table('class_weapon')->insert([
            ['class_id' => $paladin_id, 'weapon_id' => $sword_id],
            ['class_id' => $ranger_id, 'weapon_id' => $bowandarrows_id],

            ['class_id' => $barbarian_id, 'weapon_id' => $sword_id],
            ['class_id' => $barbarian_id, 'weapon_id' => $dagger_id],
            ['class_id' => $barbarian_id, 'weapon_id' => $hammer_id],
            ['class_id' => $barbarian_id, 'weapon_id' => $staff_id],

            ['class_id' => $wizard_id, 'weapon_id' => $staff_id],
            ['class_id' => $cleric_id, 'weapon_id' => $staff_id],

            ['class_id' => $thief_id, 'weapon_id' => $sword_id],
            ['class_id' => $thief_id, 'weapon_id' => $dagger_id],
            ['class_id' => $thief_id, 'weapon_id' => $bowandarrows_id],
            ['class_id' => $thief_id, 'weapon_id' => $staff_id],
        ]);

    }
}
