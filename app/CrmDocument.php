<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CrmDocument
 *
 * @package App
 * @property string $customer
 * @property string $name
 * @property text $description
 * @property string $file
*/
class CrmDocument extends Model
{
    protected $fillable = ['name', 'description', 'file', 'customer_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_id'] = $input ? $input : null;
    }
    
    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'customer_id');
    }
    
}
