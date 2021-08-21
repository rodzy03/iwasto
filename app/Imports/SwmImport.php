<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use DB;

class SwmImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {

        $capacity = ($row[5] == 100) ? "Fully Occupied" : "Free" ; 
        db::table('t_swm_location')
                ->insertgetid([
                    'junkshop_name' => trim($row[0])
                    , 'junkshop_address' => trim($row[1])
                    , 'contact_number' => trim($row[2])
                    , 'acceptable_materials' => trim($row[3])
                    , 'facility_type' => trim($row[4])
                    , 'capacity' => $capacity
                    , 'capacity_rate' => trim($row[5])
                    , 'working_days' => trim($row[6])
                    , 'working_hours_start' => preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/" ,$row[5], $matches) == true ? $row[5] :
                    \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7])->format('h:i')
                    , 'working_hours_end' => preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/" ,$row[5], $matches) == true ? $row[5] :
                    \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8])->format('H:i')
                    , 'longhitude' => trim($row[9])
                    , 'latitude' => trim($row[10])
                    , 'last_update' => preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/" ,$row[5], $matches) == true ? $row[5] :
                    \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11])->format('Y-m-d')
                ]);
    }

    public function startRow():int
    {
        return 3;
    }
}
