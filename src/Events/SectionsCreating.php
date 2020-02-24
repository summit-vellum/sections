<?php 

namespace Quill\Sections\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Quill\Sections\Models\Sections;

class SectionsCreating
{
    // use Dispatchable, InteractsWithSockets, 
    use SerializesModels;
 
    public $data;

    /**
     * Create a new event instance.
     *
     * @param  \Quill\Sections\Models\Sections  $data
     * @return void
     */
    public function __construct(Sections $data) 
    {
        $this->data = $data;  
    }
}
