<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function pricelist()
    {
        return $this->belongsTo(Pricelist::class);
    }
    // public function fotografer()
    // {
    //     return $this->belongsTo(Fotografer::class);
    // }
     /**
     * Set attribute to date format
     * @param $input
     */
    public function setTimeFromAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time_from'] = Carbon::createFromFormat('Y-m-d H:i', $input)->format('Y-m-d H:i');
        } else {
            $this->attributes['time_from'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTimeFromAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'],'Y-m-d H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTimeToAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'],'Y-m-d H:i');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            return '';
        }
    }

    // public function getStatusAttribute($input) {
    //     return [
    //         0 => 'Open',
    //         1 => 'Proses',
    //         2 => 'Cetak',
    //         3 => 'Ambil',
    //         4 => 'Selesai',
    //     ][$input];
    // }
}
