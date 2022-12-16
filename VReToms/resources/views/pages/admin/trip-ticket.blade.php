@php
    use App\Http\Controllers\GlobalDeclare;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,td,p,div,b, {margin:0;padding:0}
        h5 {
            margin: 1px; padding: 1px;
            font-family: Arial;
        }
    </style>
</head>
<body style="font-family:Arial; padding:0%; margin:0%; ">

    <h5 style="text-align: center; font-family:Arial; font-weight: 100;">Republic of the Philippines</h5>
    <h5 style="text-align: center; font-family:Arial;"><strong>SOUTHERN LEYTE STATE UNIVERSITY</strong></h5>
    <h5 style="text-align: center; font-family:Arial; font-weight: 100;">Sogod, Southern Leyte</h5>
    
    <div style="width: 50%; height: 100px; float: left;">
        <h5>Control No. <strong>Control No. {{ date('Y-m', strtotime($travel_requests[0]->date)) }}-{{ rand(000,999) }}</strong></h5>
    </div>
    <div style="width: 50%; height: 100px; float: right; text-align: right;">
        <h5><strong>{{ explode('-', date('M j, Y-', strtotime($travel_requests[0]->date)))[0] }}</strong></h5>
    </div>
    
    <div style="margin-top: -1000px;">
        <div style="width: 100%; margin-top:-20px !important;">
            <h5 style="text-align: center;">DRIVER'S TRIP TICKET</h5>
         </div>
     
         <h5>A. To be filled by the Administrative Official Authorizing Travel:</h5>
         <div style="width: 50%; height: 100px; float: left;">
             <h5>&nbsp;&nbsp;&nbsp; 1. Name of driver of the vehicle</h5>
             <h5>&nbsp;&nbsp;&nbsp; 2. Goverment car to be used, Plate No.</h5>
             <h5>&nbsp;&nbsp;&nbsp; 3. Goverment authorized passenger</h5>
             <h5>&nbsp;&nbsp;&nbsp; 4. Place/s to be visited/inspected</h5>
             <h5>&nbsp;&nbsp;&nbsp; 5. Purpose</h5>
         </div>
     
         <div style="width: 50%; height: 100px; float: right; text-align: right;">
             <h5 style="border-bottom: black 2px solid !important; text-align:center;"><strong>{{ $travel_requests[0]->d_first_name }} {{ $travel_requests[0]->d_last_name }}  {{ (new GlobalDeclare)->suffix($travel_requests[0]->suffix) }} </h5>
             <h5 style="border-bottom: black 2px solid !important; text-align:center;"><strong>{{ $travel_requests[0]->plate_number }} </h5>
             <h5 style="border-bottom: black 2px solid !important; text-align:center;">
                @foreach ($travel_requests[0]->name_of_passengers as $item)
                    <strong> {{ $item }},</strong>
                @endforeach
            </h5>
             <h5 style="border-bottom: black 2px solid !important; text-align:center;"><strong>{{ $travel_requests[0]->destination }} </h5>
             <h5 style="border-bottom: black 2px solid !important; text-align:center;"> <strong>{{ $travel_requests[0]->purpose }}</strong> </h5>
         </div>
     
         <div style="width: 40%; margin:0% auto; margin-top:20%;">
             <h5 style="text-align: center; border-bottom: black 2px solid !important;">MABEL R. CALVA</h5>
             <h5 style="text-align: center;">VPAF</h5>
             <h5 style="text-align: center;">( Cheif of Office/Authorized Representative )</h5>
         </div>
     
         <h5>B. To be filled by the driver:</h5>
         <div style="width: 50%; height: 100px; float: left;">
             <h5>&nbsp;&nbsp;&nbsp; 1. Time of departure from office/garage</h5>
             <h5>&nbsp;&nbsp;&nbsp; 2. Time of arrive at (Per No. 4)</h5>
             <h5>&nbsp;&nbsp;&nbsp; 3. Time of departure from (Per No. 4)</h5>
             <h5>&nbsp;&nbsp;&nbsp; 4. Time of arrival back to office/garage</h5>
             <h5>&nbsp;&nbsp;&nbsp; 5. Approximate distance traveled (to & from)</h5>
             <h5>&nbsp;&nbsp;&nbsp; 6. Gasoline, issued, purchased & consumed:</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) Balance in Bank</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b} Issued from the office stock</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c) Add purchased during trip</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total:</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d) Deduct used (to & from)</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e) Balance of tank at the end of trip</h5>
             <h5>&nbsp;&nbsp;&nbsp; 7. Gear oil used:</h5>
             <h5>&nbsp;&nbsp;&nbsp; 8. Lub oil used:</h5>
             <h5>&nbsp;&nbsp;&nbsp; 9. Grease oil used:</h5>
             <h5>&nbsp;&nbsp;&nbsp; 10. Speed o-meter reading if any:</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At the beginning of trip</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At the end</h5>
             <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distance traveled (Per 5 above)</h5>
             <h5>&nbsp;&nbsp;&nbsp; 11. Remarks:</h5>
         </div>
     
         <div style="width: 50%; height: 100px; float: right; text-align: right;">
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
            <h5 style="border-bottom: black 2px solid !important; text-align:center; color:white; font-size:11px;"> <strong class="text-white">{{ ('-') }}</h5>
         </div>
     
         <div style="width: 80%; margin:0% auto; margin-top:60%;">
             <h5 style="text-align: center;">I hereby certify to the correctness of the above statement of record of travel </h5>
             <h5 style="text-align: center; border-bottom: black 2px solid !important; width: 40%; margin:0% auto;"><strong>{{ $travel_requests[0]->d_first_name }} {{ $travel_requests[0]->d_last_name }}  {{ (new GlobalDeclare)->suffix($travel_requests[0]->suffix) }}</h5>
             <h5 style="text-align: center;">Driver</h5>
         </div>
     
         <h5 class="text-center">I hereby certify that I use this car on official business as stated above.</h5>
     
         <div style="width: 40%; margin:0% auto; margin-top:2%;">
             <h5 style="text-align: center; border-bottom: black 2px solid !important;">
                @foreach ($travel_requests[0]->name_of_passengers as $item)
                    <strong> {{ $item }},</strong>
                @endforeach
            </h5>
             <h5 style="text-align: center;">Name of Passenger/s</h5>
         </div>
     
         <div style="width: 40%; margin:0% auto; margin-top:2%;">
             <h5 style="text-align: center; border-bottom: black 2px solid !important;"><strong>{{ explode('-', date('M j, Y-', strtotime($travel_requests[0]->date)))[0] }}</strong></h5>
             <h5 style="text-align: center;">(Date)</h5>
         </div>
         {{-- <h5 class="text-center">*All passengers are advised to bring their own provisions and observe all the minimum health protocols to prevent and control the spread of COVID-19 and to ensure the safety of everyone*</h5> --}}
    </div>
</body>
</html>