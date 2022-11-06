@extends($activeTemplate.'layouts.advertiser.frontend')
@php
    $user = auth()->guard('advertiser')->user();
@endphp
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class=" ">
                <div class="table-responsive--lg">
                    <table id="campaign_list" class="table table-striped table-bordered datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>Off/On</th>
                                <th>Campaign Name</th>
                                <th>Delivery</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Target Country / City</th>
                                <th>Form Used</th>
                                <th>Daily Budget</th>
                                <th>Cost</th>
                                <th>Leads</th>
                                <th>Cost per Leads</th>
                                <th>Download Leads</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i <= 30; $i++)
                            <tr>
                                <td><input type="checkbox" checked data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios"></td>
                                <td>{{ $i }}_TT_All_Cz_Desktop_Applying_All(Calculate) <br><a href="#" class=" create-campaign-btn">Edit</a></td>
                                <td>Active</td>
                                <td>2022-10-12</td>
                                <td>2023-10-12</td>
                                <td>Singapore, Singapore</td>
                                <td>CZ Form</td>
                                <td>${{ $i }}00</td>
                                <td>2{{ $i }}0</td>
                                <td>10</td>
                                <td>10</td>
                                <td><a href="#">Download</a></td>
                            </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th>1170 </th>
                                <th>1170</th>
                                <th>18</th>
                                <th> </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- SETUP campaign_create MODAL --}}
    <div id="campaign_create_modal" style="max-width: 100vw;" class="modal fade right modal-lg" tabindex="-1" role="dialog">
        <div class="float-right h-100 m-0 modal-dialog w-100" style="max-width: 25rem;" role="document">
            <div class="modal-content h-100">
                <div class="modal-header">
                    <h5 class="modal-title" id="campaign_createModalLabel">Create Campaign	</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body h-100" style="overflow-y: scroll">
                    <div id="error-message"> </div>
                    <form>
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">  Campaign Settings </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="CampaignNameInput">Campaign Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="CampaignNameInput" placeholder="Campaign Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label" for="start_dateInput">Start Date</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="start_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('Start date')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" row ">
                                            <label class="col-sm-3 col-form-label text-sm-right" for="end_dateInput">End Date</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="end_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('End date')">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label" for="DailyBudgetInput">Daily Budget</label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="DailyBudgetInput" placeholder="Daily Budget">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Targeting  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Targetting</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label" for="TargetCountryInput">Target Country</label>
                                            <div class="col-sm-8">
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option value="0" label="Select a country ... " selected="selected">Select a country ... </option>
                                                    <optgroup id="country-optgroup-Africa" label="Africa">
                                                        <option value="DZ" label="Algeria">Algeria</option>
                                                        <option value="AO" label="Angola">Angola</option>
                                                        <option value="BJ" label="Benin">Benin</option>
                                                        <option value="BW" label="Botswana">Botswana</option>
                                                        <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                                        <option value="BI" label="Burundi">Burundi</option>
                                                        <option value="CM" label="Cameroon">Cameroon</option>
                                                        <option value="CV" label="Cape Verde">Cape Verde</option>
                                                        <option value="CF" label="Central African Republic">Central African Republic</option>
                                                        <option value="TD" label="Chad">Chad</option>
                                                        <option value="KM" label="Comoros">Comoros</option>
                                                        <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                                        <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                                        <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                                        <option value="DJ" label="Djibouti">Djibouti</option>
                                                        <option value="EG" label="Egypt">Egypt</option>
                                                        <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="ER" label="Eritrea">Eritrea</option>
                                                        <option value="ET" label="Ethiopia">Ethiopia</option>
                                                        <option value="GA" label="Gabon">Gabon</option>
                                                        <option value="GM" label="Gambia">Gambia</option>
                                                        <option value="GH" label="Ghana">Ghana</option>
                                                        <option value="GN" label="Guinea">Guinea</option>
                                                        <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="KE" label="Kenya">Kenya</option>
                                                        <option value="LS" label="Lesotho">Lesotho</option>
                                                        <option value="LR" label="Liberia">Liberia</option>
                                                        <option value="LY" label="Libya">Libya</option>
                                                        <option value="MG" label="Madagascar">Madagascar</option>
                                                        <option value="MW" label="Malawi">Malawi</option>
                                                        <option value="ML" label="Mali">Mali</option>
                                                        <option value="MR" label="Mauritania">Mauritania</option>
                                                        <option value="MU" label="Mauritius">Mauritius</option>
                                                        <option value="YT" label="Mayotte">Mayotte</option>
                                                        <option value="MA" label="Morocco">Morocco</option>
                                                        <option value="MZ" label="Mozambique">Mozambique</option>
                                                        <option value="NA" label="Namibia">Namibia</option>
                                                        <option value="NE" label="Niger">Niger</option>
                                                        <option value="NG" label="Nigeria">Nigeria</option>
                                                        <option value="RW" label="Rwanda">Rwanda</option>
                                                        <option value="RE" label="Réunion">Réunion</option>
                                                        <option value="SH" label="Saint Helena">Saint Helena</option>
                                                        <option value="SN" label="Senegal">Senegal</option>
                                                        <option value="SC" label="Seychelles">Seychelles</option>
                                                        <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                                        <option value="SO" label="Somalia">Somalia</option>
                                                        <option value="ZA" label="South Africa">South Africa</option>
                                                        <option value="SD" label="Sudan">Sudan</option>
                                                        <option value="SZ" label="Swaziland">Swaziland</option>
                                                        <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                                        <option value="TZ" label="Tanzania">Tanzania</option>
                                                        <option value="TG" label="Togo">Togo</option>
                                                        <option value="TN" label="Tunisia">Tunisia</option>
                                                        <option value="UG" label="Uganda">Uganda</option>
                                                        <option value="EH" label="Western Sahara">Western Sahara</option>
                                                        <option value="ZM" label="Zambia">Zambia</option>
                                                        <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                                    </optgroup>
                                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                                        <option value="AI" label="Anguilla">Anguilla</option>
                                                        <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="AR" label="Argentina">Argentina</option>
                                                        <option value="AW" label="Aruba">Aruba</option>
                                                        <option value="BS" label="Bahamas">Bahamas</option>
                                                        <option value="BB" label="Barbados">Barbados</option>
                                                        <option value="BZ" label="Belize">Belize</option>
                                                        <option value="BM" label="Bermuda">Bermuda</option>
                                                        <option value="BO" label="Bolivia">Bolivia</option>
                                                        <option value="BR" label="Brazil">Brazil</option>
                                                        <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                                                        <option value="CA" label="Canada">Canada</option>
                                                        <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                                        <option value="CL" label="Chile">Chile</option>
                                                        <option value="CO" label="Colombia">Colombia</option>
                                                        <option value="CR" label="Costa Rica">Costa Rica</option>
                                                        <option value="CU" label="Cuba">Cuba</option>
                                                        <option value="DM" label="Dominica">Dominica</option>
                                                        <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                                        <option value="EC" label="Ecuador">Ecuador</option>
                                                        <option value="SV" label="El Salvador">El Salvador</option>
                                                        <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                                        <option value="GF" label="French Guiana">French Guiana</option>
                                                        <option value="GL" label="Greenland">Greenland</option>
                                                        <option value="GD" label="Grenada">Grenada</option>
                                                        <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                                        <option value="GT" label="Guatemala">Guatemala</option>
                                                        <option value="GY" label="Guyana">Guyana</option>
                                                        <option value="HT" label="Haiti">Haiti</option>
                                                        <option value="HN" label="Honduras">Honduras</option>
                                                        <option value="JM" label="Jamaica">Jamaica</option>
                                                        <option value="MQ" label="Martinique">Martinique</option>
                                                        <option value="MX" label="Mexico">Mexico</option>
                                                        <option value="MS" label="Montserrat">Montserrat</option>
                                                        <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="NI" label="Nicaragua">Nicaragua</option>
                                                        <option value="PA" label="Panama">Panama</option>
                                                        <option value="PY" label="Paraguay">Paraguay</option>
                                                        <option value="PE" label="Peru">Peru</option>
                                                        <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                                        <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                                        <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                                        <option value="MF" label="Saint Martin">Saint Martin</option>
                                                        <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                        <option value="SR" label="Suriname">Suriname</option>
                                                        <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                        <option value="US" label="United States">United States</option>
                                                        <option value="UY" label="Uruguay">Uruguay</option>
                                                        <option value="VE" label="Venezuela">Venezuela</option>
                                                    </optgroup>
                                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                                        <option value="AF" label="Afghanistan">Afghanistan</option>
                                                        <option value="AM" label="Armenia">Armenia</option>
                                                        <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                                        <option value="BH" label="Bahrain">Bahrain</option>
                                                        <option value="BD" label="Bangladesh">Bangladesh</option>
                                                        <option value="BT" label="Bhutan">Bhutan</option>
                                                        <option value="BN" label="Brunei">Brunei</option>
                                                        <option value="KH" label="Cambodia">Cambodia</option>
                                                        <option value="CN" label="China">China</option>
                                                        <option value="GE" label="Georgia">Georgia</option>
                                                        <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                                        <option value="IN" label="India">India</option>
                                                        <option value="ID" label="Indonesia">Indonesia</option>
                                                        <option value="IR" label="Iran">Iran</option>
                                                        <option value="IQ" label="Iraq">Iraq</option>
                                                        <option value="IL" label="Israel">Israel</option>
                                                        <option value="JP" label="Japan">Japan</option>
                                                        <option value="JO" label="Jordan">Jordan</option>
                                                        <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                                        <option value="KW" label="Kuwait">Kuwait</option>
                                                        <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="LA" label="Laos">Laos</option>
                                                        <option value="LB" label="Lebanon">Lebanon</option>
                                                        <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                                        <option value="MY" label="Malaysia">Malaysia</option>
                                                        <option value="MV" label="Maldives">Maldives</option>
                                                        <option value="MN" label="Mongolia">Mongolia</option>
                                                        <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                                        <option value="NP" label="Nepal">Nepal</option>
                                                        <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                                        <option value="KP" label="North Korea">North Korea</option>
                                                        <option value="OM" label="Oman">Oman</option>
                                                        <option value="PK" label="Pakistan">Pakistan</option>
                                                        <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                                                        <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
                                                        <option value="PH" label="Philippines">Philippines</option>
                                                        <option value="QA" label="Qatar">Qatar</option>
                                                        <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="SG" label="Singapore">Singapore</option>
                                                        <option value="KR" label="South Korea">South Korea</option>
                                                        <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                                        <option value="SY" label="Syria">Syria</option>
                                                        <option value="TW" label="Taiwan">Taiwan</option>
                                                        <option value="TJ" label="Tajikistan">Tajikistan</option>
                                                        <option value="TH" label="Thailand">Thailand</option>
                                                        <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                                        <option value="TR" label="Turkey">Turkey</option>
                                                        <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                                        <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                                        <option value="VN" label="Vietnam">Vietnam</option>
                                                        <option value="YE" label="Yemen">Yemen</option>
                                                    </optgroup>
                                                    <optgroup id="country-optgroup-Europe" label="Europe">
                                                        <option value="AL" label="Albania">Albania</option>
                                                        <option value="AD" label="Andorra">Andorra</option>
                                                        <option value="AT" label="Austria">Austria</option>
                                                        <option value="BY" label="Belarus">Belarus</option>
                                                        <option value="BE" label="Belgium">Belgium</option>
                                                        <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="BG" label="Bulgaria">Bulgaria</option>
                                                        <option value="HR" label="Croatia">Croatia</option>
                                                        <option value="CY" label="Cyprus">Cyprus</option>
                                                        <option value="CZ" label="Czech Republic">Czech Republic</option>
                                                        <option value="DK" label="Denmark">Denmark</option>
                                                        <option value="DD" label="East Germany">East Germany</option>
                                                        <option value="EE" label="Estonia">Estonia</option>
                                                        <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                                        <option value="FI" label="Finland">Finland</option>
                                                        <option value="FR" label="France">France</option>
                                                        <option value="DE" label="Germany">Germany</option>
                                                        <option value="GI" label="Gibraltar">Gibraltar</option>
                                                        <option value="GR" label="Greece">Greece</option>
                                                        <option value="GG" label="Guernsey">Guernsey</option>
                                                        <option value="HU" label="Hungary">Hungary</option>
                                                        <option value="IS" label="Iceland">Iceland</option>
                                                        <option value="IE" label="Ireland">Ireland</option>
                                                        <option value="IM" label="Isle of Man">Isle of Man</option>
                                                        <option value="IT" label="Italy">Italy</option>
                                                        <option value="JE" label="Jersey">Jersey</option>
                                                        <option value="LV" label="Latvia">Latvia</option>
                                                        <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                                        <option value="LT" label="Lithuania">Lithuania</option>
                                                        <option value="LU" label="Luxembourg">Luxembourg</option>
                                                        <option value="MK" label="Macedonia">Macedonia</option>
                                                        <option value="MT" label="Malta">Malta</option>
                                                        <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                                        <option value="MD" label="Moldova">Moldova</option>
                                                        <option value="MC" label="Monaco">Monaco</option>
                                                        <option value="ME" label="Montenegro">Montenegro</option>
                                                        <option value="NL" label="Netherlands">Netherlands</option>
                                                        <option value="NO" label="Norway">Norway</option>
                                                        <option value="PL" label="Poland">Poland</option>
                                                        <option value="PT" label="Portugal">Portugal</option>
                                                        <option value="RO" label="Romania">Romania</option>
                                                        <option value="RU" label="Russia">Russia</option>
                                                        <option value="SM" label="San Marino">San Marino</option>
                                                        <option value="RS" label="Serbia">Serbia</option>
                                                        <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                                        <option value="SK" label="Slovakia">Slovakia</option>
                                                        <option value="SI" label="Slovenia">Slovenia</option>
                                                        <option value="ES" label="Spain">Spain</option>
                                                        <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option value="SE" label="Sweden">Sweden</option>
                                                        <option value="CH" label="Switzerland">Switzerland</option>
                                                        <option value="UA" label="Ukraine">Ukraine</option>
                                                        <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
                                                        <option value="GB" label="United Kingdom">United Kingdom</option>
                                                        <option value="VA" label="Vatican City">Vatican City</option>
                                                        <option value="AX" label="Åland Islands">Åland Islands</option>
                                                    </optgroup>
                                                    <optgroup id="country-optgroup-Oceania" label="Oceania">
                                                        <option value="AS" label="American Samoa">American Samoa</option>
                                                        <option value="AQ" label="Antarctica">Antarctica</option>
                                                        <option value="AU" label="Australia">Australia</option>
                                                        <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                                        <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="CX" label="Christmas Island">Christmas Island</option>
                                                        <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                                        <option value="CK" label="Cook Islands">Cook Islands</option>
                                                        <option value="FJ" label="Fiji">Fiji</option>
                                                        <option value="PF" label="French Polynesia">French Polynesia</option>
                                                        <option value="TF" label="French Southern Territories">French Southern Territories</option>
                                                        <option value="GU" label="Guam">Guam</option>
                                                        <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                        <option value="KI" label="Kiribati">Kiribati</option>
                                                        <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                                        <option value="FM" label="Micronesia">Micronesia</option>
                                                        <option value="NR" label="Nauru">Nauru</option>
                                                        <option value="NC" label="New Caledonia">New Caledonia</option>
                                                        <option value="NZ" label="New Zealand">New Zealand</option>
                                                        <option value="NU" label="Niue">Niue</option>
                                                        <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                                        <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="PW" label="Palau">Palau</option>
                                                        <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                                        <option value="WS" label="Samoa">Samoa</option>
                                                        <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                                        <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                        <option value="TK" label="Tokelau">Tokelau</option>
                                                        <option value="TO" label="Tonga">Tonga</option>
                                                        <option value="TV" label="Tuvalu">Tuvalu</option>
                                                        <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                                                        <option value="VU" label="Vanuatu">Vanuatu</option>
                                                        <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" row ">
                                            <label class="col-sm-3 col-form-label text-sm-right" for="target_cityInput">Target City</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="target_cityInput"   class="form-control" placeholder="@lang('Target City')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" for="ServiceSellBuyInput">Product  / Service you Sell or Buy in this Campaign</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="ServiceSellBuyInput" placeholder="Product  / Service you Sell or Buy in this Campaign">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" for="KeywordsInput">Keywords or tags of those products / services</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="KeywordsInput" placeholder="Keywords or tags of those products / services">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Lead Form Used  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Lead Form Used</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="FormUsedInput">  <a  href="#" data-toggle="modal" data-target="#CreateFormModal"> + Create Form  </a></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Form 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Form 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"  >
                                        <label class="form-check-label" for="exampleRadios3">
                                            Form 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Other Fileds  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="WebsiteInput">Website URL (Optional)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="WebsiteInput" placeholder="Website URL (Optional)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="SocialInput">Social Media Page URL (Optional)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="SocialInput" placeholder="Social Media Page URL (Optional)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="submit" class="btn btn--primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="CreateFormModal" tabindex="-2" aria-labelledby="CreateFormModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateFormModalLabel">Create Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="CompanyBrandNameInput">Company / Brand Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="CompanyBrandNameInput" placeholder="Company / Brand Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="CompanyLogoInput">Company Logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="CompanyLogoInput">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="FormTitleInput">Form Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="FormTitleInput" placeholder="Form Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="OfferDescriptionInput">Offer Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="OfferDescriptionInput" placeholder="Offer Description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Youtube_URL_1_Input">Youtube video URL1 (Optional)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Youtube_URL_1_Input" placeholder="Youtube video URL1">
                                {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Youtube_URL_2_Input">Youtube video URL2 (Optional)</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="Youtube_URL_2_Input" placeholder="Youtube video URL2">
                            {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Youtube_URL_3_Input">Youtube video URL3 (Optional)</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="Youtube_URL_3_Input" placeholder="Youtube video URL3">
                            {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field1Input">Field1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field1Input" placeholder="Field 1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field2Input">Field2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field2Input" placeholder="Field 2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field3Input">Field3</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field3Input" placeholder="Field 3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field4Input">Field4</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field4Input" placeholder="Field 4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field5Input">Field5</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field5Input" placeholder="Field 5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field6Input">Field6</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field6Input" placeholder="Field 6">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="LeadsInput">Leads</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="LeadsInput" placeholder="Leads">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="DownloadLeadsInput">Download Leads</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="DownloadLeadsInput" placeholder="Download Leads">
                            </div>
                        </div>
                        <button id="submit" class="btn btn--primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <button class="btn btn--primary create-campaign-btn"><i class="fas fa-plus"></i> Create Campaign	</button>
@endpush
@push('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin/js/vendor/datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/datepicker.en.js')}}"></script>
<script>
    'use strict';
//     iziToast.success({
//     title: 'Hey',
//     message: 'What would you like to add?'
// });
    $('.create-campaign-btn').on('click', function() {
        var modal = $('#campaign_create_modal');
        modal.modal('show');
    });
    $(document).ready(function () {
        $('.datepicker-here').datepicker();
        var MyDatatable =  $('#campaign_list').DataTable({
     columnDefs: [
            { targets: 0, searchable: false,  visible: true, orderable: false},
            { targets: 2, searchable: false,   orderable: false},
            { targets: 11, searchable: false,  visible: true, orderable: false},
            { targets: [7, 8, 9, 10], className: "td-small", width:"10px"},
            { targets: '_all', visible: true }
        ]
    });
   // MyDatatable.columns.adjust().draw();
});
</script>
@endpush
@push('style')
<style>
    .table th {   padding: 12px 10px; max-width: 200px; }
    .table td {  text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: -3px;  }
    .toggle.btn-sm {  min-width: 40px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
    .modal.fade:not(.in).right .modal-dialog {  -webkit-transform: translate3d(0%, 0, 0);  transform: translate3d(0%, 0, 0);  max-width: 66rem!important;  }
    #CreateFormModal{   background-color: #00000080;  }
    label{ color: #333!important}
</style>
@endpush
