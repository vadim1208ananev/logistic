<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
    protected $fillable = [
        'quotation_id', 'partner_id', 'local_charges', 'freight_charges', 'destination_local_charges', 
        'customs_clearance_charges', 'remarks', 'departure_date', '01-12-2020','total', 'user_id'
        ];
    protected $dates = [
        'valid_till',
    ];
    public function quotation()
    {
        return $this->belongsTo(Quotation::class,'quotation_id');
    }
    public function vendor()
    {
        return $this->belongsTo(User::class,'partner_id');
    }
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    
}
