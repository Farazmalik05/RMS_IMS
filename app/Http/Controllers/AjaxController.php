<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Job;
use App\Models\Description;
use App\Models\Quote;
use App\Models\Setting;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\SendEmailRequest;
use PDF;
use Mail;


class AjaxController extends Controller
{
    //Autocomplete phone# input on vehicle create form
    public function getcustomer(Request $request)
    {
        $customers = Customer::where('phoneno', 'LIKE', '%'.$request->input('term').'%')->take(10)->get();
        return response()->json($customers);
    }
    
    //Autocomplete phone# input on quote create form
    public function getcustomerwithvehicle(Request $request)
    {
        // dd($request->all());
        $customers = Customer::with('vehicles')->where('phoneno', 'LIKE', '%'.$request->input('term').'%')->take(10)->get();
        //dd($customers);
        return response()->json($customers);
    }

    //Autocomplete rego input on quote create form
    public function getvehiclewithcustomer(Request $request)
    {
        // dd($request->all());
        $vehicle = Vehicle::with('customer')->where('rego', 'LIKE', '%'.$request->input('term').'%')->take(10)->get();
        //dd($customers);
        return response()->json($vehicle);
    }

    //Date select input on quote create form
    public function getquotenumber(Request $request)
    {
        // dd($request->all());
        $quote_number = Quote::where([['quote_date', 'LIKE', '%'.$request->input('term').'%']])->withTrashed()->max('quote_number');
        
        // dd($quote_number);
        if(!empty($quote_number))
        {
            $quote_number = sprintf("%02d", $quote_number+1);
        } else {
            $quote_number = '01';
        }
        // dd($quote_number);
        return response()->json($quote_number);
    }

    public function getjob(Request $request)
    {
        $job = Job::with('descriptions')->where('name', 'LIKE', '%'.$request->input('term').'%')->take(10)->get();
        return response()->json($job);
    }

    public function getdescription(Request $request)
    {
        $description = Description::where('description', '%'.$request->input('term').'%' )->take(10)->get();
        return response()->json($description);
    }

    public function updatejobrate(Request $request)
    {
        $job = Job::findOrFail($request->input('id'));
        $job->rate = $request->input('rate');

        return response()->json($job->save());
    }

    public function updatetype(Request $request)
    {
        //$quote = Quote::where('quote_number', $request->input('quote_id'))->first();
        $quote = Quote::findOrFail($request->input('id'));
        //dump($quote);
        if($quote->type == 'Q')
            $quote->type = 'I';
        else
            $quote->type = 'Q';
        
        $quote->save();
        return response()->json(['type' => $quote->type, 'status' => 200]);
    }

    public function generateinvoice(int $invoice_id)
    {
        $invoice = Quote::findOrFail($invoice_id);

        // $pdf = PDF::loadView('invoices.generate-invoice', compact('invoice'));

        // return $pdf->stream();
        return view('invoices.generate-invoice', compact('invoice'));
    }

    public function sendemail(SendEmailRequest $request)
    {
        $details = $request->validated();
        //dd($details);
        $invoice = Quote::findOrFail($details['id']);
        //dd($invoice);
        $customer = Customer::findOrFail($invoice->customer_id);
        //dd($customer);
        if(empty($customer->email)) {
            $customer->email = $details['email_id'];

            //Updating the customer record with email if it's null
            $customer->save();
        }

        $data["title"] = "Invoice from RMS Auto Repairs";
        $data["email"] = $request->input('email_id');
        $data["body"] = $request->input('email_body');
  
        $pdf = PDF::loadView('invoices.invoicetemplate', compact('invoice'));
        //return $pdf->stream();
  
        $data["filename"] = "Invoice_RMS_".date('Y', strtotime($invoice->quote_date)).'_';
        $data["filename"] .= sprintf('%02d', $invoice->quote_number).".pdf";

        Mail::send('emails.email', $data, function($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), $data["filename"]);
        });
  
        return response()->json(['message' => 'Mail sent successfully!', 'status' => 200]);

        //return view('invoices.invoicetemplate', compact('invoice'));
    }
}
