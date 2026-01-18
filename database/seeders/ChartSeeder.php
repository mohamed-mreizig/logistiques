<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\State;
use App\Models\Title;
use App\Models\StateValue;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        $usStates = [
            'Adrar', 'Assaba', 'Brakna', 'Dakhlet Nouadhibou', 'Gorgol',
            'Guidimaka', 'Hodh Ech Chargui', 'Hodh El Gharbi', 'Inchiri', 'Nouakchott-Nord',
            'Nouakchott-Ouest', 'Nouakchott-Sud', 'Tagant', 'Tiris Zemmour', 'Trarza'
        ];
        
        // Create states
        foreach ($usStates as $stateName) {
            State::create(['name' => $stateName]);
        }
        
        // Create sample category with titles
        $category = Category::create([
            'name' => 'CPN',
            'description' => 'CPN values by state'
        ]);
        
        foreach (['CPN1', 'CPN2', 'CPN3'] as $titleName) {
            $title = Title::create([
                'category_id' => $category->id,
                'name' => $titleName
            ]);
            
            // Create values for each state
            foreach (State::all() as $state) {
                StateValue::create([
                    'title_id' => $title->id,
                    'state_id' => $state->id,
                    'value' => rand(100, 1000) / 10
                ]);
            }
        }
    }
}
