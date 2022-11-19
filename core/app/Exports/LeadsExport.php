<?php

namespace App\Exports;

use App\campaign_forms_leads;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;


class LeadsExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $campaign_id;
    protected $advertiser_id;
    protected $campaign_name;
    protected $campaign_form;


    function __construct($campaign_id, $advertiser_id, $campaign_name, $campaign_form) {
        $this->campaign_id = $campaign_id;
        $this->advertiser_id = $advertiser_id;
        $this->campaign_name = $campaign_name;
        $this->campaign_form = $campaign_form;
    }

    public function headings():array{
        return[
            'campaign_id',
            'advertiser_id',
            'campaign_name',
            'total_price',
            'lgen_date',
            'lgen_source',
            'lgen_medium',
            'lgen_campaign',
            'field_1',
            'field_2',
            'field_3',
            'field_4',
            'field_5'
        ];
    }
    public function array(): array
    {
        return [
            [$this->campaign_id,
            $this->advertiser_id,
            $this->campaign_name,
            '',
            Carbon::now()->format('Y-m-d'),
            '',
            '',
            '',
            $this->campaign_form['field_1']['question_text'],
            $this->campaign_form['field_2']['question_text'],
            $this->campaign_form['field_3']['question_text'],
            $this->campaign_form['field_4']['question_text'],
            $this->campaign_form['field_5']['question_text']]
        ];
    }

}
