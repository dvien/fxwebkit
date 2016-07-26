<?php

namespace Modules\Cms\Entities\forms;

use Illuminate\Database\Eloquent\Model;

class cms_forms_downloadcenter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_forms_downloadcenters';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','file'];

    public function cms_forms_downloadcenter_translate(){

        return $this->hasOne('\Modules\Cms\Entities\forms\cms_forms_downloadcenter_translate','cms_forms_downloadcenters_id');
    }
}
