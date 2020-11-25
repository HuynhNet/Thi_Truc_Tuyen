<?php

namespace App\Imports;

use App\CauHoi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;

class CauHoiImport implements ToModel, WithHeadingRow
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        return new CauHoi([
            'noi_dung' => $row['Noi_dung'],
            'a' => $row['Dap_an_A'],
            'b' => $row['Dap_an_B'],
            'c' => $row['Dap_an_C'],
            'd' => $row['Dap_an_D'],
            'dap_an_dung' => $row['Dap_an_Dung'],
        ]);
    }
}
