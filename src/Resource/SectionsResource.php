<?php

namespace Quill\Sections\Resource;

use Quill\Html\Fields\ID;
use Quill\Sections\Models\Sections;
use Vellum\Contracts\Formable;
use Quill\Html\Fields\Text;
use Quill\Html\Fields\Label;

class SectionsResource extends Sections implements Formable
{
    public function fields()
    {
        return [
            ID::make('Id'),

            Label::make('Section', 'name')
            	->autoSlug()
            	->displayAsEdit()
            	->searchable()
            	->setLabelElement('h1'),

            Label::make('Url')
            	->relation('url', 'url')
            	->setLabelElement('h3'),

            Text::make('Parent Section', 'parent_id')
            	->relation('parent_id', 'parent_id')
            	->modify(function($parent_id, $sections){
                    return $sections->getParent()['name'];
                })
                ->hideOnForms()
                ->classes('cf-input'),

            Text::make('Slug')
            	->autoSlugSource('name')
            	->hideOnForms(),

            Text::make('Page Title', 'title')
            	->classes('cf-input'),

            Text::make('Meta Description', 'description')
            	->help('Provide a short summary of what visitors should expect to read in your channel. This is displayed on search engine results pages.')
            	->classes('cf-input')
            	->characterCount(150, 160, ''),

            Text::make('Meta Tags', 'keywords')
            	->help('Theses tags describes your page\'s content. They don\'t appear on the channel page itself but only in the html code. These tags help tell search engines what the page is about.')
            	->classes('cf-input'),
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
        ];
    }

}
