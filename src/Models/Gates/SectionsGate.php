<?php

namespace Quill\Sections\Models\Gates;

class SectionsGate
{
    protected $module;
    protected $user;
    protected $policies;

    public function __construct()
    {
        $this->module = 'sections';
        $this->user = auth()->user();
        $this->policies = $this->user->policies()[$this->module];
    }

    public function view()
    {
        if (in_array(__FUNCTION__, $this->policies) || in_array("*", $this->policies)) {

            return true;
        }

        return false;
    }

    public function update()
    {
        if (in_array(__FUNCTION__, $this->policies) || in_array("*", $this->policies)) {

            return true;
        }

        return false;
    }

}
