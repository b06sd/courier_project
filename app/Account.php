<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
      'display_name', 'company_name', 'description', 'address_street_1',
      'city', 'state', 'zip_code', 'country', 'phone_1', 'email',
      'website', 'instagram', 'twitter', 'linkedln_profile', 'background_info',
      'sales_rep', 'rating', 'project_type', 'project_description', 'budget', 'deliverable'
    ];

    protected $dates = [
      'proposal_due_date'
    ];

}
