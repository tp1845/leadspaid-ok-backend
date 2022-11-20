<?php

namespace App\Exports;

use App\lgen_spend;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LgenSpendExport implements FromArray, WithHeadings
{
    protected $campaign_id;
    protected $campaign_name;
    function __construct($campaign_id, $campaign_name) {
        $this->campaign_id = $campaign_id;
        $this->campaign_name = $campaign_name;
    }
    public function headings():array{
        return[
            'campaign_id',
            'campaign_name',
            'lgen_date',
            'lgen_source',
            'lgen_medium',
            'lgen_campaign',
            'cost'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            [
            $this->campaign_id,
            $this->campaign_name,
            Carbon::now()->format('Y-m-d'),
            '',
            '',
            '',
            '']
        ];
    }
}
