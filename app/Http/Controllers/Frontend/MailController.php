<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{WebInfo};
use App\Mail\ThankYouMessage;

use Illuminate\Support\{Carbon, Facades\Artisan, Facades\Mail};
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use View;
use Stevebauman\Location\Facades\Location;
class MailController extends Controller
{
    protected $clientId;
    public function __construct()
    {
        Artisan::call('config:clear');
        $this->clientId = env('WEB_ID');
    }
   
    public function sendContactForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'Mail_Name' => 'required|string|max:255',
            'Mail_Email' => 'required|email|max:255',
            'Mail_Message' => 'required|string|max:1000',
        ]);
    
        // Send email to the user who filled the form
        $userEmail = $validatedData['Mail_Email'];
        Mail::to($userEmail)->send(new ThankYouMessage($validatedData)); // Pass $validatedData here
    
        // Check if WebInf_EmailId exists and send email if it does
        $WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
            ->where('tbl_website_information.WebInf_Reg_Id', '=', $this->clientId)
            ->where('WebInf_Status', '=', '0')
            ->first();
    
        if ($WebInfoModel && filter_var($WebInfoModel->WebInf_EmailId, FILTER_VALIDATE_EMAIL)) {
            Mail::to($WebInfoModel->WebInf_EmailId)->send(new ContactFormMail($validatedData));
            
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid email address.']);
        }
    
        // Redirect or return response as needed
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    

}
if ($WebInfoModel && filter_var($WebInfoModel->WebInf_EmailId, FILTER_VALIDATE_EMAIL)) {
    Mail::to($WebInfoModel->WebInf_EmailId)->send(new ContactFormMail($validatedData));
}
