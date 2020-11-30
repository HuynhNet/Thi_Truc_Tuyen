<?php

namespace App\Imports;

use App\CauHoi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class CauHoiImport implements ToModel
{
    /*public function collection(Collection $collection)
    {
        foreach($collection as $key => $value)
        {
            if($key > 0)
            {
                DB::table('cau_hois')->insert([
                    'noi_dung'    => $value[0],
                    'a'           => $value[1],
                    'b'           => $value[2],
                    'c'           => $value[3],
                    'd'           => $value[4],
                    'dap_an_dung' => $value[5]
                ]);
            }
        }
    }*/

    use Importable;

    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new CauHoi([
            'noi_dung'    => $row[0],
            'a'           => $row[1],
            'b'           => $row[2],
            'c'           => $row[3],
            'd'           => $row[4],
            'dap_an_dung' => $row[5]
        ]);
    }

}
