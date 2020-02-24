<?php

namespace Quill\Sections\Listeners;

class RegisterSectionsPermissionModule
{ 
    public function handle()
    {
        return [
            'Sections' => [
                'view'
            ]
        ];
    }
}
