<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use DB;

class WasteImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        db::table('r_waste')
        ->insert([
            'waste_name' => trim($row[0])
            , 'waste_type_id' => db::table('r_waste_type')
            ->where( strtolower('waste_type_name'), strtolower( $row[1] ))->value('waste_type_id')
        ]);
    }

    public function startRow():int
    {
        return 3;
    }
}
