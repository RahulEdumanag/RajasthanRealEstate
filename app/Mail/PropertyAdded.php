<?php

namespace App\Mail;

use App\Models\Property; // Ensure you have the correct namespace for Property model
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function build()
    {
        return $this->markdown('mail.property.added')
                    ->subject('New Property Added');
    }
}
