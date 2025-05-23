<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>INV/RMS/{{ date('Y', strtotime($invoice->quote_date)) }}/{{ sprintf('%02d', $invoice->quote_number) }}
    </title>

    <!-- Web Fonts
        ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
        ======================= -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}" />
    <style>
        body {
            font-size: 10px;
            line-height: 15px !important;
        }

        .table tr td {
            padding: 5px !important;
        }

        p {
            margin-bottom: 0px;
        }

        hr {
            margin: 0.3rem 0;
        }

        .tyre_details tr {
            line-height: 12px;
        }

        .brake_details tr {
            line-height: 12px;
        }

        .brake_details,
        .tyre_details {
            width: 120px;
        }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center gy-3">
                <div class="col-sm-7 text-center text-sm-start">
                    <img id="logo" src="{{ asset('images/logo/logo_2.JPG') }}" style="height:55px;"
                        title="RMS Auto Repairs" alt="RMS Auto Repairs" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="mb-0">Invoice</h4>
                    <p class="mb-0">Invoice # - INV/RMS/{{ date('Y', strtotime($invoice->quote_date)) }}/{{
                        sprintf('%02d', $invoice->quote_number) }}</p>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6">
                    <strong>RMS AUTO REPAIRS</strong>
                    <address class="mb-0">
                        31 Nevin Drive<br>
                        Thomastown, Vic - 3074<br>
                        M.: 0410384019 | P.:0394246843
                    </address>
                </div>
                <div class="col-sm-6 mb-3 text-sm-end">
                    <strong>{{ __('Invoice Date') }}:</strong> <span>{{ date('d-m-Y', strtotime($invoice->quote_date))
                        }}</span><br>
                    <strong>{{ __('Due Date') }}:</strong> <span>{{ date('d-m-Y', strtotime($invoice->quote_duedate))
                        }}</span>
                </div>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="col-sm-3">
                    <strong>{{ __('Customer name') }}:</strong>
                    <p>{{ ucfirst($invoice->vehicle->customer->name) }}</p>
                    @if(!empty($invoice->vehicle->customer->company_name))
                        <p>{{ ucfirst($invoice->vehicle->customer->company_name) }}</p>
                    @endif
                </div>
                <div class="col-sm-3">
                    <strong>{{ __('Phone #') }}:</strong>
                    <p>{{ $invoice->vehicle->customer->phoneno }}</p>
                </div>
                <div class="col-sm-3">
                    <strong>{{ __('Registration #') }}:</strong>
                    <p>{{ strtoupper($invoice->vehicle->rego) }}</p>
                </div>
                <div class="col-sm-3">
                    <strong>{{ __('Make & Model') }}:</strong>
                    <p>{{ ucfirst($invoice->vehicle->make) }} {{ ucfirst($invoice->vehicle->model) }}</p>
                </div>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="col-sm-3">
                    <strong>{{ __('Vin #') }}:</strong>
                    <p>{{ strtoupper($invoice->vehicle->vin_no) }}</p>
                </div>
                <div class="col-sm-3">
                    <strong>{{ __('Transmission') }}:</strong>
                    @if($invoice->vehicle->transmission == 'A')
                    <p>Automatic</p>
                    @else
                    <p>Manual</p>
                    @endif
                </div>
                <div class="col-sm-3">
                    <strong>{{ __('Year') }}:</strong>
                    <p>{{ $invoice->vehicle->year }}</p>
                </div>
                <div class="col-sm-3">
                    @if(!$invoice->odometer == null)
                    <strong>{{ __('Odometer') }}:</strong>
                    <p>{{ $invoice->odometer }}</p>
                    @endif
                </div>
            </div>
            <!-- <br> -->
            <div class="table-responsive mt-1">
                <table class="table border mb-0">
                    <thead>
                        <tr class="bg-light">
                            <td class="col-8 fw-600">{{ __('Description') }}</td>
                            <td class="col-1 text-end fw-600">{{ __('Qty') }}</td>
                            <td class="col-1 text-end fw-600">{{ __('Rate') }}</td>
                            <td class="col-1 text-end fw-600">{{ __('Amt') }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @foreach($invoice->jobs as $job)
                        <tr>
                            <td class="col-9 align-top">
                                {{ ucfirst($job->name) }}<br>
                                @if($job['has_description'])
                                <table class="table mb-0">
                                    <tbody>
                                        @foreach($job->descriptions as $desc)
                                        <tr>
                                            <td class="align-top" style="border-style:none;">
                                                <label style="padding-left: 5px;">{{ ucfirst($desc['description'])
                                                    }}</label><br>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </td>
                            <td class="col-1 text-end align-top">{{ $job->pivot->quantity }}</td>
                            <td class="col-1 text-end align-top">
                                ${{ number_format((float)$job->pivot->rate, 2, '.', '') }}
                                @php
                                $total += ($job->pivot->quantity * $job->pivot->rate);
                                @endphp
                            </td>
                            <td class="col-1 text-end align-top">
                                ${{ number_format((float)$job->pivot->quantity * $job->pivot->rate, 2, '.', '') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-light">
                            <td colspan="3" class="text-end align-top">
                                <strong>
                                    @if($invoice->taxable)
                                    {{ __('Total (incl. 10% Tax)') }}
                                    @else
                                    {{ __('Total (excl. 10% Tax)') }}
                                    @endif
                                    :</strong>
                            </td>
                            <td class="col-sm-3 text-end align-top">
                                <strong>${{ number_format((float)$total, 2, '.', '') }}</strong>
                            </td>
                        </tr>
                        <tr class="bg-light">
                            <td colspan="3" class="text-end border-bottom-0 align-top"><strong>Amount Due:</strong></td>
                            <td class="col-sm-3 text-end border-bottom-0 align-top">
                                <strong>${{ number_format((float)$invoice->amtdue, 2, '.', '') }}</strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="table-responsive mt-1">
                <table class="table border mb-0">
                    <tr>
                        <td class="align-top" colspan="3">
                            <strong>{{ __('Job details') }}:</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-top" colspan="3">
                            <p>@if(!is_null($invoice->jobdetails)) {{ ucfirst($invoice->jobdetails) }} @else {{ 'N/A' }}
                                @endif</p>
                        </td>
                    </tr>
                    @if($invoice->tire_fl)
                    <tr>
                        <td class="align-top" style="width:25%;">
                            <strong>Tyres (mm):</strong>
                        </td>
                        <td class="align-top" style="width:25%;">
                            <strong>Brakes (mm):</strong>
                        </td>
                        <td class="align-top" style="width:50%;">
                            <strong>{{ __('Concerns/Recommendation') }}:</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="tyre_details table table-borderless mb-0">
                                <tr>
                                    <td>
                                        @if($invoice->tire_fl != null)
                                        <strong>{{ __('F/L') }}:</strong>
                                        <span>{{ $invoice->tire_fl }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($invoice->tire_fr != null)
                                        <strong>{{ __('F/R') }}:</strong>
                                        <span>{{ $invoice->tire_fr }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($invoice->tire_rl != null)
                                        <strong>{{ __('R/L') }}:</strong>
                                        <span>{{ $invoice->tire_rl }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($invoice->tire_rr != null)
                                        <strong>{{ __('R/R') }}:</strong>
                                        <span>{{ $invoice->tire_rr }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="align-top">
                            <table class="brake_details table table-borderless mb-0">
                                <tr>
                                    <td class="align-top" style="width:20%;">
                                        @if($invoice->frontbrakepads != null)
                                        <strong>{{ __('Front') }}:</strong>
                                        <span>{{ $invoice->frontbrakepads }}</span>
                                        @endif
                                    </td>
                                    <td class="align-top" style="width:20%;">
                                        @if($invoice->rearbrakepads != null)
                                        <strong>{{ __('Rear') }}:</strong>
                                        <span>{{ $invoice->rearbrakepads }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="align-top">
                            <p>@if(!is_null($invoice->remarks)) {{ ucfirst($invoice->remarks) }} @else {{ 'N/A' }}
                                @endif</p>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td class="align-top">
                            <strong>{{ __('Concerns/Recommendation') }}:</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-top">
                            <p>@if(!is_null($invoice->remarks)) {{ ucfirst($invoice->remarks) }} @else {{ 'N/A' }}
                                @endif</p>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
            <!-- <br> -->
            <p class="text-muted mt-1"><strong>Please Note:</strong> **We will not be liable or provide any warranty on
                parts or repairs if the customer supplied parts or chooses used parts to repair or service their
                vehicle.</p>
        </main>
        <hr>
        <!-- Footer -->
        <footer class="text-center">
            <p class="lh-base">
                <strong>For internet transfers:</strong><br>
                Bank of Melbourne<br>
                Account Name: Tuan I Sheriff<br>
                BSB: 193-879 Account No.: 489 823 343
            </p>
            <hr>
            <!-- Note -->
            <p style="font-size:10px;">This is computer generated receipt and does not require physical signature.</p>
            <!-- Button -->
            <div class="btn-group btn-group-sm d-print-none mt-2">
                <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none">
                    <i class="fa fa-print"></i> Print & Download
                </a>
            </div>
        </footer>
    </div>
</body>

</html>