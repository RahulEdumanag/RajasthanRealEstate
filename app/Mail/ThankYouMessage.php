<?php

namespace App\Mail;

use App\Models\Page;
use App\Models\WebInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThankYouMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $webInfo;
    public $socialLinkModel;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->webInfo = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
        ->where('tbl_website_information.WebInf_Reg_Id', '=', env('WEB_ID'))
        ->where('WebInf_Status', '=', '0')
        ->first();
        $this->socialLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', env('WEB_ID'))->where('Pag_Status', '=', '0')->where('tbl_pagecategory.PagCat_Name', 'SocialLink')->orderBy('Pag_SerialOrder', 'asc')->get();

        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.thank_you_message')
        ->with('data', $this->data)
        ->with('webInfo', $this->webInfo)
        ->with('socialLinkModel', $this->socialLinkModel)
        ;
    }
}
   