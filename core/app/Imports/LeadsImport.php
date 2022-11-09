<?php

namespace App\Imports;

use App\campaign_forms_leads;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class LeadsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $exists = campaign_forms_leads::where('id',$row['id'])->first();
        if ($exists) {
            $data = array();
            foreach($row as $key => $value){
                if($value || $value === 0 ){ $data[$key] = $value; }
            }
            campaign_forms_leads::where( 'id', $row['id'])->update($data);
            return null;
        }

        return new campaign_forms_leads([
           //'id' => $row[0],
           'form_id' => $row['form_id'],
           'advertiser_id' => $row['advertiser_id'],
           'campaign_id' => $row['campaign_id'],
            'publisher_id' => $row['publisher_id'],
            'field_1' => $row['field_1'],
            'field_2' => $row['field_2'],
            'field_3' => $row['field_3'],
            'field_4' => $row['field_4'] ,
            'field_5' => $row['field_5'] ,
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }

}
