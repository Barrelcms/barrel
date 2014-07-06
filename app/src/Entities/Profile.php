<?php namespace Lablog\Entities;

use Way\Database\Model;

class Profile extends Model {

    public function user()
    {
        return $this->belongsTo('User');
    }

}