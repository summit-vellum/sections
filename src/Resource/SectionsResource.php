<?php

namespace Quill\Sections\Resource;

use Quill\Html\Fields\ID;
use Quill\Sections\Models\Sections;
use Vellum\Contracts\Formable;
use Quill\Html\Fields\Text;

class SectionsResource extends Sections implements Formable
{
    public function fields()
    {
        return [
            ID::make()->sortable()->searchable(),
            Text::make('Name')
            	->autoSlug(),
            Text::make('Parent Id'),
            Text::make('Url')
            	->autoSlug(),
            Text::make('Slug')
            	->autoSlugSource('name'),
            Text::make('Title'),
            Text::make('Keywords'),
            Text::make('Description')
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
