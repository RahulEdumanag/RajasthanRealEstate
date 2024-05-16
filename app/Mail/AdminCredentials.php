<?php
namespace App\Mail;
use App\Models\ClientMaster;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $raw_password;

    public function __construct($name, $email, $raw_password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->raw_password = $raw_password;
    }

    public function build()
    { 
        $model = ClientMaster::orderBy('Cli_CreatedDate', 'desc')->get();



        return $this->from('rahulsoni95888@gmail.com', 'rahul soni')
        ->subject('Your Admin Account Information')
        ->view('backend.admin.clientMaster.index',compact('model'));

         
    }
}

