<?php

namespace App\Imports;

use App\campaign_forms_leads;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LeadsImport implements WithValidation, SkipsOnFailure, ToCollection, WithHeadingRow
{
    use Importable, SkipsFailures;

    protected $preview;
    protected $campaign_id;
    protected $advertiser_id;
    protected $form_id;
    private $errors = false; // array to accumulate errors
    private $leadsdata = false;
    function __construct($campaign_id, $advertiser_id, $form_id, $preview = 'false') {
        $this->preview = $preview;
        $this->campaign_id = $campaign_id;
        $this->advertiser_id = $advertiser_id;
        $this->form_id = $form_id;
    }

    public function collection(Collection $rows)
    {
        $rows = $rows->toArray();
        $sheet_advertiser_id = $sheet_campaign_id = false;

        if($rows[0]['campaign_id']){   $sheet_campaign_id = $rows[0]['campaign_id'];  }
        if($rows[0]['advertiser_id']){ $sheet_advertiser_id = $rows[0]['advertiser_id']; }

        if($rows[0]['total_price']){
            $total_price = $rows[0]['total_price'];
            $total_leads = count($rows);
            $price = $total_price / $total_leads;
        }else{
            $price = 0;
        }

        DB::beginTransaction();
        // iterating each row and validating it:
        foreach ($rows as $key=>$row) {
            $validator = Validator::make($row, $this->rules(), $this->customValidationMessages());

            if($sheet_campaign_id !=  $this->campaign_id ){
                $this->errors['campaign_id'] = 'Campaign id not match, Please check campaign id in sheet or select correct row ';
            } if($sheet_advertiser_id !=  $this->advertiser_id){
                $this->errors['advertiser_id'] =  'Advertiser id not match, Please check advertiser id in sheet or select correct row ';
            }

            if ($validator->fails()) {
                foreach ($validator->errors()->messages() as $messages) {
                    foreach ($messages as $error) {
                        // accumulating errors:
                        $this->errors[] = $error;
                    }
                }
            }   if(!$this->errors){
                $row['campaign_id'] = $this->campaign_id;
                $row['advertiser_id'] = $this->advertiser_id;
                $row['publisher_id'] = 0;
                $row['price'] = $price;
                $form_lead = new campaign_forms_leads();
                $form_lead->form_id =$this->form_id;
                $form_lead->advertiser_id = $sheet_advertiser_id;
                $form_lead->campaign_id =  $sheet_campaign_id;
                $form_lead->publisher_id =  $row['publisher_id'];
                $form_lead->field_1 = $row['field_1'];
                $form_lead->field_2 = $row['field_2'];
                $form_lead->field_3 = $row['field_3'];
                $form_lead->field_4 = $row['field_4'];
                $form_lead->field_5 = $row['field_5'];
                $form_lead->price =   $row['price'];
                if(!$this->preview ){
                $form_lead->save();
                }else{
                $this->leadsdata[] = $row;
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
    public function getLeadsData()
    {
        return $this->leadsdata;
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
