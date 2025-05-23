<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-size: 10px;
            font-family: 'Poppins' , sans-serif;
            font-style: normal;
            color:#404040;
            line-height: 11px;
        }   
        .inv-container { 
            in:0px auto; 
            ing: 70px;
            width: 100%;
            background-color: #fff; 
            er: none; 
            -border-radius: 0px;
            webkit-border-radius: 0px;
            -o-border-radius: 0px;
            border-radius: 0px;
        }
        table {
            border-collapse: collapse;
        }
        table tr td {
            padding: 3px 0px!important; }
        p {
            margin-bottom: 0px; margin: 0.3rem 0; 
        } 
        .tyre_details tr, .brake_details tr {
            line-height: 12px; 
        }
        .brake_details, .tyre_details {
            width: 120px;
        }
        table, th, td {
            /* border: 1px solid black; */
            vertical-align: top;
        }
        .table tr td {
            padding: 5px !important;
        }
        </style>
    </head>
    <body>
        <table style="width:100%;margin-bottom:5px;">
            <tr>
                <td style="width:25%;">
                    <img id="logo" src="{{ asset('images/logo/logo_2.JPG') }}" style="height:55px;" title="RMS Auto Repairs" alt="RMS Auto Repairs" />
                </td>
                <td style="width:25%;"></td>
                <td style="width:25%;"></td>
                <td style="width:25%;text-align:right;vertical-align:bottom;">
                    <h4 style="font-size:1.5rem;font-weight:400;margin:0px;margin-bottom:2px;padding:0px;">Invoice</h4>
                    <p style="margin:0px;padding:0px;">Invoice # - INV/RMS/{{ date('Y', strtotime($invoice->quote_date)) }}/{{ sprintf('%02d', $invoice->quote_number) }}</p>
                </td>    
            <tr>
            <tr style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;">
                <td>
                    <strong style="font-weight: bolder;margin-bottom:2px;margin-top:10px;">RMS AUTO REPAIRS</strong>
                    <address style="margin-bottom:0px;font-style: normal;line-height:10px;">
                        31 Nevin Drive<br>
                        Thomastown, Vic - 3074<br>
                        M.: 0410384019 | P.:0394246843
                    </address>
                </td>
                <td></td>
                <td></td>
                <td style="text-align:right;line-height:10px;">
                    <strong style="margin-top:10px;">{{ __('Invoice Date') }}:</strong> <span>{{ date('d-m-Y', strtotime($invoice->quote_date))
                        }}</span><br>
                    <strong>{{ __('Due Date') }}:</strong> <span>{{ date('d-m-Y', strtotime($invoice->quote_duedate))
                        }}</span>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #ddd;">
                <td>
                    <strong>{{ __('Customer name') }}:</strong>
                    <p style="margin-top:0px;margin-bottom:0px;">{{ ucfirst($invoice->vehicle->customer->name) }}</p>
                    @if(!empty($invoice->vehicle->customer->company_name))
                        <p style="margin-top:0px;">{{ ucfirst($invoice->vehicle->customer->company_name) }}</p>
                    @endif
                </td>
                <td>
                    <strong>{{ __('Phone #') }}:</strong>
                    <p style="margin-top:0px;">{{ $invoice->vehicle->customer->phoneno }}</p>
                </td>
                <td>
                    <strong>{{ __('Registration #') }}:</strong>
                    <p style="margin-top:0px;">{{ strtoupper($invoice->vehicle->rego) }}</p>
                </td>
                <td>
                    <strong>{{ __('Make & Model') }}:</strong>
                    <p style="margin-top:0px;">{{ ucfirst($invoice->vehicle->make) }} {{ ucfirst($invoice->vehicle->model) }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>{{ __('Vin #') }}:</strong>
                    <p style="margin-top:0px;">{{ strtoupper($invoice->vehicle->vin_no) }}</p>
                </td>
                <td>
                    <strong>{{ __('Transmission') }}:</strong>
                    @if($invoice->vehicle->transmission == 'A')
                    <p style="margin-top:0px;">Automatic</p>
                    @else
                    <p style="margin-top:0px;">Manual</p>
                    @endif
                </td>
                <td>
                    <strong>{{ __('Year') }}:</strong>
                    <p style="margin-top:0px;">{{ $invoice->vehicle->year }}</p>

                </td>
                <td>
                    @if(!$invoice->odometer == null)
                    <strong>{{ __('Odometer') }}:</strong>
                    <p style="margin-top:0px;">{{ $invoice->odometer }} km(s)</p>
                    @endif
                </td>
            </tr>
        </table>
        <table class="table" style="margin-bottom:0px;border:1px solid #ddd;color:#404040;width:100%;border-collapse:collapse;">
            <thead style="">
                <tr style="border:1px solid #ddd;">
                    <td style="background-color:#F8F9FA;font-weight:600!important;width:70%;padding:3px;">{{
                        __('Description') }}</td>
                    <td
                        style="background-color:#F8F9FA;font-weight:600!important;width:10%;text-align:right;padding:3px;">
                        {{ __('Qty') }}</td>
                    <td
                        style="background-color:#F8F9FA;font-weight:600!important;width:10%;text-align:right;padding:3px;">
                        {{ __('Rate') }}</td>
                    <td
                        style="background-color:#F8F9FA;font-weight:600!important;width:10%;text-align:right;padding:3px;">
                        {{ __('Amt') }}</td>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @foreach($invoice->jobs as $job)
                <tr>
                    <td style="padding:3px;vertical-align:top;">
                        {{ ucfirst($job->name) }}<br>
                        @if($job['has_description'])
                        <table style="width:100%;">
                            <tbody>
                                @foreach($job->descriptions as $desc)
                                <tr>
                                    <td style="border-style:none;vertical-align:top;">
                                        <label style="padding-left: 5px;">{{ ucfirst($desc['description'])
                                            }}</label><br>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </td>
                    <td style="text-align:right;padding:3px;vertical-align:top;">{{ $job->pivot->quantity }}</td>
                    <td style="text-align:right;padding:3px;vertical-align:top;">
                        ${{ number_format((float)$job->pivot->rate, 2, '.', '') }}
                        @php
                        $total += ($job->pivot->quantity * $job->pivot->rate);
                        @endphp
                    </td>
                    <td style="text-align:right;padding:3px;vertical-align:top;">
                        ${{ number_format((float)$job->pivot->quantity * $job->pivot->rate, 2, '.', '') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color:#F8F9FA;border-top:1px solid #ddd;">
                    <td colspan="3" style="text-align:right;padding:3px;vertical-align:top;">
                        @if($invoice->taxable)
                        <strong>Total (incl. 10% Tax):</strong>
                        @else
                        <strong>Total (excl. 10% Tax):</strong>
                        @endif
                    </td>
                    <td style="text-align:right;width:15%;padding:3px;vertical-align:top;">
                        ${{ number_format((float)$total, 2, '.', '') }}
                    </td>
                </tr>
                <tr style="background-color:#F8F9FA;border-top:1px solid #ddd;">
                    <td colspan="3" style="text-align:right;padding:3px;vertical-align:top;"><strong>Amount Due:</strong>
                    </td>
                    <td style="text-align:right;padding:3px;vertical-align:top;">
                        ${{ number_format((float)$invoice->amtdue, 2, '.', '') }}
                    </td>
                </tr>
            </tfoot>
        </table>
        <table class="table" style="margin-top:5px;border:1px solid #ddd;color:#404040;width:100%;border-collapse:collapse;">
            <tr style="border-bottom:1px solid #ddd;">
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Tyres (mm):</strong>
                </td>
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Concerns/Recommendation:</strong>
                </td>
            </tr>
            <tr style="">
                <td style="width:50%;vertical-align:top;">
                    <table class="tyre_details" style="width:100%;">
                        <tr>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                @if($invoice->tire_fl != null)
                                <strong>{{ __('F/L') }}:</strong>
                                <span>{{ $invoice->tire_fl }}</span>
                                @endif
                            </td>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                @if($invoice->tire_fr != null)
                                <strong>{{ __('F/R') }}:</strong>
                                <span>{{ $invoice->tire_fr }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                @if($invoice->tire_rl != null)
                                <strong>{{ __('R/L') }}:</strong>
                                <span>{{ $invoice->tire_rl }}</span>
                                @endif
                            </td>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                @if($invoice->tire_rr != null)
                                <strong>{{ __('R/R') }}:</strong>
                                <span>{{ $invoice->tire_rr }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width:50%;vertical-align:top;padding:3px;">
                    <p>@if(!is_null($invoice->remarks)) {{ ucfirst($invoice->remarks) }} @else {{ 'N/A' }} @endif </p>
                </td>
            </tr>
            <tr style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;">
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Brakes (mm):</strong>
                </td>
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Job details:</strong>
                </td>
            </tr>
            <tr>
                <td style="width:50%;">
                    <table class="brake_details" style="width:100%;">
                        <tr>
                            <td style="width:20%;padding:3px;vertical-align:top;">

                                @if($invoice->frontbrakepads != null)
                                <strong>{{ __('Front') }}:</strong>
                                <span>{{ $invoice->frontbrakepads }}</span>
                                @endif
                            </td>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                @if($invoice->rearbrakepads != null)
                                <strong>{{ __('Rear') }}:</strong>
                                <span>{{ $invoice->rearbrakepads }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>


                </td>
                <td style="width:50%;vertical-align:top;padding:3px;">
                    <p>@if(!is_null($invoice->jobdetails)) {{ ucfirst($invoice->jobdetails) }} @else {{ 'N/A' }} @endif
                    </p>
                </td>
            </tr>
        </table>
        <p style="margin-top:2px;"><strong>Please Note:</strong> **We will not be liable or provide any warranty on
            parts or
            repairs if the customer supplied parts or chooses used parts to repair or service their vehicle.</p>
        <hr>
        <!-- Footer -->
        <footer style="text-align:center;margin-top:0px;">
            <p style="margin-top:0px;">
                <strong>For internet transfers:</strong><br>
                Bank of Melbourne<br>
                Account Name: Tuan I Sheriff<br>
                BSB: 193-879 Account No.: 489 823 343
            </p>
        </footer>
        <hr>
        <!-- Note -->
        <p style="margin-top:0px;text-align:center;">This is computer generated receipt and does not require physical
            signature.</p>
    </body>

</html>