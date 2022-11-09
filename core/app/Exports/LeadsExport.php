<?php

namespace App\Exports;

use App\campaign_forms_leads;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeadsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'id',
            'form_id',
            'advertiser_id',
            'campaign_id',
            'publisher_id',
            'field_1',
            'field_2',
            'field_3',
            'field_4',
            'field_5',
            'created_at',
            'updated_at'
        ];
    }

    public function collection()
    {
        return campaign_forms_leads::all();
    }
}
