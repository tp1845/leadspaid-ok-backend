<style>
    .pdf-main-full,
    .pdf-main-full .pdf-row,
    .table-3 {
        width: 100%;
        clear: both;
        font-family: 'Roboto', Helvetica, sans-serif, 'Open Sans', Arial;
    }

    .pdf-main {
        width: 100%;
        margin: 0 auto 20px;
        clear: both;
    }

    .table,
    .table-3 {
        border-collapse: collapse;
        width: 100%;
    }

    .table-3 {
        padding-top: 40px;
    }

    .table tbody,
    .table-3 tbody>tr>td {
        border: 1px solid #ddd;
        padding: 1rem;
    }

    .table-3 thead>tr>th {
        border: 1px solid #fff;
        color: #fff;
    }

    .table-3 thead>tr>th {
        background-color: #4150eb;
    }

    .table-2 tbody {
        border: 5px solid #ddd;
        border-radius: 20px;
    }

    .table-1 tbody {
        border: none;
    }

    .table tbody>tr>td {
        padding: 5px 5px 5px 20px;
    }

    .table thead>tr>th {
        padding-left: 0;
    }

    .table tbody>tr>td h3 {
        padding: 0;
        margin: 0;
    }

    .table tr.spacer>td {
        border: none;
        padding: 0
    }

    .table,
    .table-main {
        width: 50%;
        float: left;
    }

    .table-1 {
        width: 40%;
        float: right;
    }

    .custom-invoice-table {
        max-width: 60%;

    }
</style>

<div class="pdf-main">
    <div class="pdf-row">
        <div class="table-responsive--lg">
            <table class="table style--two" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">
                <thead>
                    <tr>
                        <th style=" font-size: 40px;font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial'; text-align: left; color:#4727e6">
                        <span style="font-weight: bolder;">LEADS</span><span style="font-weight: 400;;">PAID</span>
                        </th>
                    </tr>
                </thead>
                <tbody style="border:none;border-radius: 5px !important; font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">
                    <tr>
                        <td>
                            <h3>Leads Paid Inc.</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>5214F Diamond Heights Blvd #3077</td>
                    </tr>
                    <tr>
                        <td>San Francisco, California 94131</td>
                    </tr>
                    <tr>
                        <td>United States.</td>
                    </tr>
                    <tr>
                        <td>Federal Tax ID: </td>
                    </tr>

                </tbody>
            </table><!-- table end -->
            <table class="table table-1 style--two custom-invoice-table" style="width:30%;padding-left: 40px; float:left; font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">
                <thead>
                    <tr>
                        <th style="text-align:left; font-size:25px; padding-top: 55px; padding-left: 1rem;">Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td><h3>Invoice</h3></td>
                    </tr> -->
                    <tr>


                        <td><b>Date</b></td>
                        <td>{{ date('Y-m-d',strtotime($ta->trx_date))}}</td>
                    </tr>
                    <tr>
                        <td><b>Invoice#</b></td>
                        <td> {{ get_invoice_format($ta->id)  }} </td>
                    </tr>
                    <tr>
                        <td><b>Currency</b></td>
                        <td>USD</td>
                    </tr>

                </tbody>
            </table><!-- table end -->
        </div>
    </div>
</div>

<div class="pdf-main" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">
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
                        <td>{{auth()->guard('advertiser')->user()->country}} @if(!empty(auth()->guard('advertiser')->user()->postal_code)) - {{ auth()->guard('advertiser')->user()->postal_code }} @endif</td>
                    </tr>

                </tbody>
            </table><!-- table end -->
        </div>
    </div>
</div>

<div class="pdf-main-full" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">
    <div class="pdf-row">
        <div class="table-responsive--lg">
            <?php
               $amun = $ta->deduct;
               $amoun_arr = explode('(', $amun);
               if ($ta->total_budget !== "NA"){
                $isManual = false;
                $card_s_c = (float)$ta->spent_previous_day * 0.03;
               }else{
                $isManual = true;
                $card_s_c =  (float)$amoun_arr[1] * 0.03;
            }
            $i = 0;
            function add( $i)
            {
                $i++;
                return $i;
            }
          
               $ga = (float)$amoun_arr[0]; ?>

            <table class="table-3 style--two">
                <thead>
                    <tr>
                        <th scope="col" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">#</th>
                        <th scope="col" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">Description</th>

                        <th scope="col" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">Amount</th>

                        <th scope="col" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">Card Service <br>Charge </th>
                        <th scope="col" style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">Gross Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">
                        <td data-label="Inital Wallet Balance" class="budget">{{ add($i) }}</td>
                        <td data-label="Transaction Date">Lead Generation Charges</td>

                        <td data-label="Total Campaign Budget" class="budget"> $ {{ number_format((float)$amoun_arr[1], 2, '.', '')}}</td>

                        <td data-label="Amount Deducted From Card" class="budget" style="vertical-align: bottom;;padding-top: 40px;"> $ {{ number_format((float)$card_s_c, 2, '.', '')}} <br>(3%)</td>
                        <td data-label="Final Wallet Balance" class="budget">
                            $ {{ number_format((float)$ga, 2, '.', '')}}</td>
                    </tr>
                    <tr style="font-family: Roboto', Helvetica, sans-serif, 'Open Sans', Arial';">
                        <td style="border: none;"></td>
                        <td style="border: none;"></td>
                        <td style="border: none;"></td>
                        <td><b>Total</b></td>
                        <td>$ {{ number_format((float)$ga, 2, '.', '')}}</td>
                    </tr>

                </tbody>
            </table><!-- table end -->
        </div>
    </div>
</div>