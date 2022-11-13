<?php

namespace App\Exports;

use App\campaign_forms_leads;
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

    function __construct($campaign_id, $advertiser_id, $campaign_name) {
        $this->campaign_id = $campaign_id;
        $this->advertiser_id = $advertiser_id;
        $this->campaign_name = $campaign_name;
    }

    public function headings():array{
        return[
            'campaign_id',
            'advertiser_id',
            'campaign_name',
            'total_price',
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
            [$this->campaign_id, $this->advertiser_id, $this->campaign_name]
        ];
    }
}
