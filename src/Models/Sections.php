<?php

namespace Quill\Sections\Models;

use Vellum\Models\BaseModel;
use Quill\Status\Traits\HasState;

class Sections extends BaseModel
{
	use HasState;

    protected $table = 'sections';

    public function scopeWhereActive($query)
    {
    	return $query->where('status', 1);
    }

    public function getParent()
    {
    	return $this->parent_channel;
    }

    public function parent_channel()
	{
		return $this->hasOne('Quill\Sections\Models\Sections', 'id', 'parent_id');
	}

    public function history()
    {
        return $this->morphOne('Quill\History\Models\History', 'historyable');
    }

    public function resourceLock()
    {
        return $this->morphOne('Vellum\Models\ResourceLock', 'resourceable');
    }

    public function autosaves()
    {
        return $this->morphOne('Vellum\Models\Autosaves', 'autosavable');
    }

}
