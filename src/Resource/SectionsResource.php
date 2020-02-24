<?php

namespace Quill\Sections\Resource;

use Quill\Html\Fields\ID;
use Quill\Sections\Models\Sections;
use Vellum\Contracts\Formable;

class SectionsResource extends Sections implements Formable
{
    public function fields()
    {
        return [
            ID::make()->sortable()->searchable(),
        ];
    }

    public function filters()
    {
        return [
            //
        ];
    }

    public function actions()
    {
        return [
            new \Vellum\Actions\EditAction,
            new \Vellum\Actions\ViewAction,
            new \Vellum\Actions\DeleteAction,
        ];
    }

}
