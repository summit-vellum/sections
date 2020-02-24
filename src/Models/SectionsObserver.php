<?php

namespace Quill\Sections\Models;

use Illuminate\Support\Str;
use Quill\Sections\Events\SectionsCreating;
use Quill\Sections\Events\SectionsCreated;
use Quill\Sections\Events\SectionsSaving;
use Quill\Sections\Events\SectionsSaved;
use Quill\Sections\Events\SectionsUpdating;
use Quill\Sections\Events\SectionsUpdated;
use Quill\Sections\Models\Sections;

class SectionsObserver
{

    public function creating(Sections $sections)
    {
        // creating logic... 
        event(new SectionsCreating($sections));
    }

    public function created(Sections $sections)
    {
        // created logic...
        event(new SectionsCreated($sections));
    }

    public function saving(Sections $sections)
    {
        // saving logic...
        event(new SectionsSaving($sections));
    }

    public function saved(Sections $sections)
    {
        // saved logic...
        event(new SectionsSaved($sections));
    }

    public function updating(Sections $sections)
    {
        // updating logic...
        event(new SectionsUpdating($sections));
    }

    public function updated(Sections $sections)
    {
        // updated logic...
        event(new SectionsUpdated($sections));
    }

}