<?php

namespace App\Imports;

use App\Models\Member;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MemberImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            Member::create([
                'member_id' => $row['member_id'],
                'group'     => $row['group'],
                'nama'      => $row['nama'],
                'alamat'    => $row['alamat'],
                'hp'        => $row['hp'],
                'email'     => $row['email'],
                'profile'   => $row['profile'],
            ]);
        }
    }
    public function headingRow(): int
    {
        return 2;
    }
}
