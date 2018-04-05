<?php

use League\Csv\Reader;
use League\Csv\Statement;

use Illuminate\Database\Seeder;


class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(base_path('/docs/teams.csv'), 'r');
        $csv->setHeaderOffset(0); //set the CSV header offset
        
        $stmt = new Statement();
        $records = $stmt->process($csv);
        
        foreach ($records as $record) {
            DB::table('teams')->insert([
                'team'   => $record['Team'],
                'city'   => $record['City'],
                'state'  => $record['State'],
                'venue'  => $record['Venue'],
                'league' => $record['League'],
            ]);
        }
        // return $records;
    }
}
