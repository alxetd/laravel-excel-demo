<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class FileImport implements OnEachRow
{
    /**
    * @param Row $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();

        if ($rowIndex > 1) {
            $row = $row->toArray();

            Client::create([
                'name' => $row[0],
            ]);

            Project::create([
                'name' => $row[1],
            ]);

            Task::create([
                'name' => $row[2],
            ]);

            User::factory(['name' => $row[3]])->create();

            Role::create([
                'name' => $row[4],
            ]);
        }
    }
}
