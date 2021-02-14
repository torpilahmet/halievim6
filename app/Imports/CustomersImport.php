<?php

namespace App\Imports;

use App\Model\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'name' => $row[0],
            'tc' => $row[1],
            'email' => $row[2],
            'phone' => $row[3]

        ]);
    }
}
