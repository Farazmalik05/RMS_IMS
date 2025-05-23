<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-size: 12px;
            font-family: 'Poppins' , sans-serif;
            font-style: normal;
            color:#404040;
            line-height: 18px;
        }
        table {
            border-collapse: collapse;
            border: 1px solid #000;
        }
        table tr td {
            padding: 3px 0px!important; 
        }
        p {
            margin-bottom: 0px; margin: 0.3rem 0; 
        } 
        #info tr td {
            width: 50%;
        }
        #vehicle-details {
            width:100%;
            margin-bottom:0px;
        }
        .job-details {
            width:100%;
            margin-bottom:20px;
        }
        .job-details tr td {
            border: 1px solid #000;
            padding: 3px;
        }
        #vehicle-details tr td {
            border: 1px solid #000;
            padding: 3px;
        }
        .page_break {
            page-break-before: always;
        }
        </style>
    </head>
    <body>
        <div style="text-align:center;margin-bottom:15px;font-weight:bold;font-size:20px;">
            Job Card
        </div>
        <table id="info" style="width:100%;margin-bottom:7px;">
            <tr>
                <td>
                    <img src="{{ asset('images/logo/logo_2.JPG') }}" style="margin:10px;height:55px;" alt='Logo'>
                    <div style="padding-left:5px;">
                        <span style="font-weight:bold;">RMS AUTO REPAIRS</span><br>
                        <span>31 Nevin Dr</span><br>
                        <span>Thomastown VIC 3074</span><br>
                        <span>M: 0410384019   P: 03 94246843</span>
                    </div>
                </td>
                <td style="border-left:none;position:relative;">
                    <div style="padding-left:150px;margin-bottom:8px;">Date: {{ $vehicle['date'] }}</div>
                    <div style="padding-left:150px;">Name: {{ $vehicle['customer']['name'] }}</div>
                    <div style="padding-left:150px;">Address: {{ $vehicle['customer']['address'] }} {{ $vehicle['customer']['suburb'] }} {{ $vehicle['customer']['state'] }} {{ $vehicle['customer']['postcode'] }}</div>
                    <div style="padding-left:150px;">Phone: {{ $vehicle['customer']['phoneno'] }}</div>
                    <div style="padding-left:150px;">Email: {{ $vehicle['customer']['email'] ?? 'N/A' }}</div>
                </td>
            </tr>
        </table>
        <table id="vehicle-details">
            <tr>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Rego: {{ $vehicle['rego'] }}</span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Year: {{ $vehicle['year'] }}</div></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Make: {{ $vehicle['make'] }}</div></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Model: {{ $vehicle['model'] }}</div></td>
            </tr>
            <tr>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Colour: {{ $vehicle['colour'] }}</span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Type: @if($vehicle['transmission'] == 'A') Automatic @else Manual @endif</span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Vin: {{ $vehicle['vin_no'] }}</span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Odometer: {{ $vehicle['odometer'] }}</span></td>
            </tr>
        </table>
        <table class="job-details">
            <tr>
                <td style="position:relative;font-weight:bold;text-align:center;width:25px;">#</td>
                <td style="position:relative;font-weight:bold;text-align:center;">Job Description</td>
                <td style="position:relative;font-weight:bold;width:100px;text-align:center;">Cost $</td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"><span>01</span></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="padding-left:3px;">@if(isset($vehicle['is_logbook']) && $vehicle['is_logbook'] == 1) Carryout minor engine service, Log book. @else Carryout minor engine service. @endif</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="padding-left:3px;">Carryout safety check under bonnet and vehicle, inspect all lights, inspect brake system, suspension and steering components.</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="padding-left:3px;">Inspect all fluid levels and top up as required, inspect all tyres including pressure, Add windscreen washer additives, Rotate wheels.</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="padding-left:3px;">Workshop consumables</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;">$10</td>
            </tr>
            @for($i=0;$i<6;$i++)
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;width:100px;height:16px;"></td>
            </tr>
            @endfor
            <tr>
                <td style="position:relative;text-align:center;padding:3px;">02</td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="padding-left:3px;">Concern/Repair:</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            @php
                $count = 10;
                //dump($vehicle);
                $concerns = explode('/', $vehicle['details']);
                $count = $count - count($concerns);
                //dump($concerns);
                //dump($count);
            @endphp
            @foreach($concerns as $concern)
                <tr>
                    <td style="position:relative;height:16px;padding:3px;"></td>
                    <td style="position:relative;height:16px;padding:3px;"><span style="padding-left:3px;">{{ ucfirst($concern) }}</span></td>
                    <td style="position:relative;width:100px;height:16px;"></td>
                </tr>
            @endforeach
            @for($i=0;$i<$count;$i++)
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;width:100px;height:16px;"></td>
            </tr>
            @endfor
        </table>
        <div style="margin-bottom:45px;">
            *By signing this job card, I/we have read the above terms and conditions of Trade and having read and understood them. I also authorize the above service/repairs as the owner/agent.
        </div>
        <table style="width:100%;border:none;margin-bottom:10px;">
            <tr>
                <td style="position:relative;font-weight:bold;text-align:left;width:50%;padding:3px;">Customer signature: ...........................................</td>
                <td style="position:relative;font-weight:bold;width:100px;text-align:right;width:50%;padding:3px;">Technician signature: ...........................................</td>
            </tr>
        </table>
        <div class="page_break"></div>
        <div style="margin-bottom:15px;text-align:center;font-weight:bold;font-size:15px;">
            Workshop Details
        </div>
        <table class="job-details">
            <tr>
                <td style="position:relative;font-weight:bold;text-align:center;width:25px;">#</td>
                <td style="position:relative;font-weight:bold;text-align:center;">Item/Material Used</td>
                <td style="position:relative;font-weight:bold;width:100px;text-align:center;">Cost $</td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="padding-left:3px;margin-right:65%">Oil Grade:</span>
                    <span style="">Qty:</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;font-weight:bold;">
                    <span style="padding-left:3px">Additional Repairs done:</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            @for($i=0;$i<12;$i++)
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;width:100px;height:16px;"></td>
            </tr>
            @endfor
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;font-weight:bold;">
                    <span style="padding-left:3px">Concern/Recommendaons:</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            @for($i=0;$i<12;$i++)
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;width:100px;height:16px;"></td>
            </tr>
            @endfor
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;font-weight:bold;">
                    Scan tool diagnosis:
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            @for($i=0;$i<8;$i++)
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;width:100px;height:16px;"></td>
            </tr>
            @endfor
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="font-weight:bold;padding-left:3px;">Tyres:</span>
                    <span style="margin-right:100px">Front right:</span>mm
                    <span style="margin-right:100px;margin-left:50px;">Front left:</span>mm
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="margin-right:103px;margin-left:44px;">Rear right:</span>mm
                    <span style="margin-right:104px;margin-left:49px;">Rear left:</span>mm
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;">
                    <span style="font-weight:bold;padding-left:3px;">Brakes:</span>
                    <span style="margin-right:100px;">Front pads/shoes:</span>mm
                    <span style="margin-right:100px;margin-left:50px;">Rear pads/shoes:</span>mm
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
        </table>        
    </body>
</html>