<?php

namespace IBG\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
 /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'users'; 

 /**
  * The primary key associated with the table.
  *
  * @var string
  */
  protected $primaryKey = 'user_id';
}
