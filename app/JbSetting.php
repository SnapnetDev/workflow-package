<?php

namespace App;

use App\Traits\SettingTrait;
use Illuminate\Database\Eloquent\Model;

class JbSetting extends Model
{
	use SettingTrait;
    //
	protected $table = 'jb_settings';


}
