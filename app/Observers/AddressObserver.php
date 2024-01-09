<?php

namespace App\Observers;

use App\Models\Address;
use Illuminate\Support\Str;

class AddressObserver
{

    public function creating(Address $address)
    {

        $address->slug = Str::slug($address->head);

    }

    public function created(Address $address)
    {
        $address->slug = Str::slug($address->head);
        $address->save();
    }

    public function updated(Address $address)
    {
        $address->slug = Str::slug($address->head);
        $address->save();
    }

}
