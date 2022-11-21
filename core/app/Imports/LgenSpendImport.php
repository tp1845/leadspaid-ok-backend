<?php

namespace App\Imports;

use App\lgen_spend;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;


class LgenSpendImport implements WithValidation, SkipsOnFailure, ToCollection, WithHeadingRow
{
    use Importable, SkipsFailures;
    protected $preview;
    protected $campaign_id;
    protected $advertiser_id;
    protected $form_id;
    private $errors = false; // array to accumulate errors
    private $Spenddata = false;
    function __construct($campaign_id, $advertiser_id, $form_id, $preview = 'false') {
        $this->preview = $preview;
        $this->campaign_id = $campaign_id;
        $this->advertiser_id = $advertiser_id;
        $this->form_id = $form_id;
    }
    public function collection(Collection $rows)
    {
        $rows = $rows->toArray();
        $sheet_campaign_id = false;

        if($rows[0]['campaign_id']){   $sheet_campaign_id = $rows[0]['campaign_id'];  }
        //DB::beginTransaction();
        // foreach ($rows as $key=>$row) {
        //     if($key != 0){
        //         $rows[$key]['campaign_id']  = $rows[0]['campaign_id'];
        //         $rows[$key]['lgen_date'] = Carbon::now()->format('Y-m-d');
        //         $rows[$key]['lgen_source']    = $row['lgen_source'];
        //         $rows[$key]['lgen_medium']    = $row['lgen_medium'];
        //         $rows[$key]['lgen_campaign']    = $row['lgen_campaign'];
        //         $rows[$key]['cost']    = $row['cost'] ;
        //     }
        // }

        // $rows = array_map("unserialize", array_unique(array_map("serialize", $rows)));

        foreach ($rows as $key=>$row) {
            $validator = Validator::make($row, $this->rules(), $this->customValidationMessages());
            if($sheet_campaign_id !=  $this->campaign_id ){
                $this->errors['campaign_id'] = 'Campaign id not match, Please check campaign id in sheet or select correct row ';
            }
            if ($validator->fails()) {
                foreach ($validator->errors()->messages() as $messages) {
                    foreach ($messages as $error) {
                        // accumulating errors:
                        $this->errors[] = $error;
                    }
                }
            }
            if(!$this->errors && $key != 0  ){
                $row['campaign_id'] =$sheet_campaign_id;
                $row['lgen_date'] = $row['lgen_date']?Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['lgen_date']))->format('Y-m-d'):Carbon::now()->format('Y-m-d');;
                if(!$this->preview ){
                    $form_lead = new lgen_spend();
                    $form_lead->campaign_id =  $row['campaign_id'];
                    $form_lead->lgen_date    =   $row['lgen_date'];
                    $form_lead->lgen_source =  $row['lgen_source'];
                    $form_lead->lgen_medium =  $row['lgen_medium'];
                    $form_lead->lgen_campaign =  $row['lgen_campaign'];
                    $form_lead->cost =  $row['cost'];
                    $form_lead->save();
                    $this->Spenddata[] = $row;
                }else{
                    $row['campaign_name'] = $rows[0]['campaign_name'];
                    $this->Spenddata[] = $row;
                }
            }
        }
    }
  // this function returns all validation errors after import:
  public function getErrors()
  {
      return $this->errors;
  }

  // this function returns all rows after import:
  public function getSpendData()
  {
      return $this->Spenddata;
  }

  public function rules(): array
  {
      return [
          //'advertiser_id' => [ 'required'  ],
          //'first_name' => [ 'required'  ],
         // 'last_name' => [ 'required', 'string' ],
      ];

  }

  public function customValidationMessages()
  {
      return [
          'email.unique' => 'Client Email Alerady Exits.',
          'email.required' => 'Email is required.',
          'first_name.required' => 'First Name is required.',
          'first_name.string' => 'First Name should be string.',
          'last_name.string' => 'Last Name should be string.',
      ];
  }


}
