<?php

namespace App\Mail;

use App\Models\WebInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $webInfo;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->webInfo = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
        ->where('tbl_website_information.WebInf_Reg_Id', '=', env('WE   B_ID'))
        ->where('WebInf_Status', '=', '0')
        ->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_form')
                    ->with('data', $this->data)
                    ->with('webInfo', $this->webInfo)
                    ->subject('New Contact Form Submission');
    }
}
