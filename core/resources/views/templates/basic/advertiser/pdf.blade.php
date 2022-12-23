
<style>
    
    .pdf-main-full, .pdf-main-full .pdf-row, .table-3 {
        width: 100%;
        clear: both;
    font-family: 'poppinsmedium';
    }
  .pdf-main {
    width: 100%;
    margin: 0  auto 20px;
    clear: both;
  } 
  .table, .table-3 {
    border-collapse: collapse;
  width: 100%;
}
.table-3 {
    padding-top: 40px;
}
.table tbody, .table-3 tbody > tr > td {
  border: 1px solid #ddd;
  padding: 1rem;
}
.table-3 thead > tr > th {
  border: 1px solid #1c273b;
color: #fff;
}

.table-3 thead > tr > th {
    background-color: #1c273b;
}
.table-2 tbody {
  border: 5px solid #ddd;
    border-radius: 20px;
}
.table-1 tbody {
    border: none;
}
.table tbody > tr > td {
  padding: 5px 5px 5px 20px;
}
.table thead > tr > th {
    padding-left: 0;
}
.table tbody > tr > td h3 {
  padding: 0;
  margin: 0;
}

.table tr.spacer > td {
  border: none;
  padding: 0
}
.table, .table-main {
    width: 50%;
    float: left;
}
.table-1 {
    width: 40%;
    float: right;
}
</style>

<div class="pdf-main">
    <div class="pdf-row">
        <div class="table-responsive--lg">
            <table class="table style--two" style="font-family: 'Poppins', sans-serif;">
                <thead>
                    <tr>
                        <th style=" font-size: 40px; font-family: 'Poppins', sans-serif; text-align: left;">
                            <span style="color:#1c273b;">Leads</span>Paid.com
                        </th>
                    </tr>
                </thead>
                <tbody style="border:2px solid #1c273b;border-radius: 5px !important; font-family: 'Poppins', sans-serif;">
                    <tr>
                        <td><h3>Leads Paids inc.</h3></td>
                    </tr>
                    <tr>
                        <td>1401 21st Street STE R</td>
                    </tr>
                    <tr>
                        <td>Sacramento, California 95811</td>
                    </tr>
                     <tr>
                        <td>United States</td>
                    </tr>
                                       
                </tbody>
            </table><!-- table end -->
            <table class="table table-1 style--two" style="width:50%; float:left;font-family: 'Poppins', sans-serif;">
                <thead>
                    <tr>
                        <th style="text-align:left; font-size:25px; padding-top: 15px; padding-left: 1rem;">Invoice</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                    
                       
                        <td>Date</td>
                        <td>{{ date('Y-m-d',strtotime($ta->trx_date))}}</td>
                    </tr>  
                    <tr>
                        <td>Invoice#</td>
                        <td> {{ get_invoice_format($ta->id)  }} </td>
                    </tr>  
                    <tr>
                        <td>Currency</td>
                        <td>USD</td>
                    </tr>  
                                    
                </tbody>
            </table><!-- table end -->
        </div>
    </div>
</div>

<div class="pdf-main" style="font-family: 'Poppins', sans-serif;">
    <div class="pdf-row">
        <div class="table-responsive--lg">
            <table class="table table-2 style--two">
                <thead>
                    <tr>
                        <th style=" padding: 20px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>{{ auth()->guard('advertiser')->user()->company_name }}</b></td>
                    </tr>
                    <tr>
                        <td>{{auth()->guard('advertiser')->user()->name}}</td>
                    </tr>
                    <tr>
                        <td>{{auth()->guard('advertiser')->user()->billed_to}}</td>
                    </tr>
                    <tr>
                        <td>{{auth()->guard('advertiser')->user()->city}}</td>
                    </tr>
                    <tr>
                        <td>{{auth()->guard('advertiser')->user()->country}}</td>
                    </tr>     

                </tbody>
            </table><!-- table end -->
        </div>
    </div>
</div>

<div class="pdf-main-full" style="font-family: 'Poppins', sans-serif;">
    <div class="pdf-row">
        <div class="table-responsive--lg">
                    @php 
                     $amun= $ta->deduct;                 
                        $amoun_arr=explode('(',$amun);
                        $card_s_c=$amoun_arr[0]-$ta->spent_previous_day;
                        $ga=$card_s_c+$ta->spent_previous_day;
                    @endphp
            <table class="table-3 style--two">
                <thead>
                    <tr>
                        <th scope="col"style="font-family: 'Poppins', sans-serif;">Date</th>
                        <th scope="col"style="font-family: 'Poppins', sans-serif;">Description</th>
                        
                        <th scope="col"style="font-family: 'Poppins', sans-serif;">Amount</th>
                       
                        <th scope="col"style="font-family: 'Poppins', sans-serif;">Card Service <br>Charge </th>
                        <th scope="col"style="font-family: 'Poppins', sans-serif;">Gross Amount</th>
                    </tr>
                </thead>
                <tbody>   
                          




                    <tr style="font-family: 'Poppins', sans-serif;">
                        <td data-label="Inital Wallet Balance" class="budget">{{ date('Y-m-d',strtotime($ta->trx_date))}}</td>
                        <td data-label="Transaction Date">Lead Generation Charges</td>
                        
                        <td data-label="Total Campaign Budget" class="budget"> $ {{ number_format((float)$ta->spent_previous_day, 2, '.', '')}}</td>
                        
                        <td data-label="Amount Deducted From Card" class="budget"> $ {{  number_format((float)$card_s_c, 2, '.', '')}} <br>(3%)</td>
                        <td data-label="Final Wallet Balance" class="budget">
                         $ {{ number_format((float)$ga, 2, '.', '')}}</td>
                    </tr>
                
                </tbody>
            </table><!-- table end -->
        </div>
    </div>
</div>