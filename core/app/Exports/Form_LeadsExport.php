<?php

namespace App\Exports;

use App\campaign_forms_leads;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class Form_LeadsExport implements FromCollection, WithHeadings
{
    protected $campaign;

    function __construct($campaign)
    {
        $this->campaign   = $campaign;
        $this->collection = collect($campaign);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        $data           = campaign_forms_leads::all();
        $campaign_forms = '';
        foreach($data as $k => $data1)
        {
            $campaign_forms = $data[$k]['campaign_forms'];
        }

        return [
            'Lead Id',
            'Created Time',
            'Campaign Id',
            'Campaign Name',
            'Form Id',
            'Form Name',
            $campaign_forms->field_1?$campaign_forms->field_1['question_text']:'',
            $campaign_forms->field_2?$campaign_forms->field_2['question_text']:'',
            $campaign_forms->field_3?$campaign_forms->field_3['question_text']:'',
            $campaign_forms->field_4?$campaign_forms->field_4['question_text']:'',
            $campaign_forms->field_5?$campaign_forms->field_5['question_text']:''
        ];

    }

    public function collection()
    {
        return $this->collection;
    }
}
