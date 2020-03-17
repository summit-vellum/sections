<?php

namespace Quill\Sections\Resource;

use Quill\Html\Fields\ID;
use Quill\Sections\Models\Sections;
use Vellum\Contracts\Formable;
use Quill\Html\Fields\Text;
use Quill\Html\Fields\Label;
use Request;

class SectionsResource extends Sections implements Formable
{
    public function fields()
    {
        return [
            ID::make('id')->searchable(),

            Label::make('Section', 'name')
            	->relation('name', 'name')
            	->modify(function($name, $sections){
            		if (count(Request::segments()) > 1) {
            			return $name;
            		} else {
            			if ($sections->status) {
	            			$statusClass = 'status-publish';
	            		} else {
	            			$statusClass = 'status-draft';
	            		}

	            		return '<span class="pull-left status '.$statusClass.'"></span>
	            					<div class="ml-4 middle">'.$name.'</div>';
            		}
                })
            	->autoSlug()
            	->displayAsEdit()
            	->searchable()
            	->setLabelElement('h1')
            	->thWidthAttribute('30%'),

            Text::make('Parent Section', 'parent_id')
            	->relation('parent_id', 'parent_id')
            	->modify(function($parent_id, $sections){
                    return '<strong>'.$sections->getParent()['name'].'</strong>';
                })
                ->hideOnForms()
                ->classes('cf-input')
                ->thWidthAttribute('20%'),

           Label::make('Url')
        	->relation('url', 'url')
        	->setLabelElement('h3'),

            Text::make('Slug')
            	->autoSlugSource('name', 'once')
            	->hideOnForms()
            	->hideFromIndex(),

            Text::make('Page Title', 'title')
            	->relation('title', 'title')
            	->modify(function($title, $sections){
            		if (count(Request::segments()) > 1) {
            			return $title;
            		} else {
            			if (!empty($title)) {
	            			return '<span class="status status-draft"></span>';
	            		}
            		}
                })
            	->classes('cf-input')
            	->dashboardContainerClass('text-center middle'),

            Text::make('Meta Description', 'description')
            	->relation('description', 'description')
            	->modify(function($description, $sections){
            		if (count(Request::segments()) > 1) {
            			return $description;
            		} else {
            			if (!empty($description)) {
	            			return '<span class="status status-draft"></span>';
	            		}
            		}
                })
            	->help('Provide a short summary of what visitors should expect to read in your channel. This is displayed on search engine results pages.')
            	->classes('cf-input')
            	->characterCount(150, 160, '')
            	->dashboardContainerClass('text-center middle'),

            Text::make('Meta Tags', 'keywords')
            	->relation('keywords', 'keywords')
            	->modify(function($keywords, $sections){
            		if (count(Request::segments()) > 1) {
            			return $keywords;
            		} else {
            			if (!empty($keywords)) {
	            			return '<span class="status status-draft"></span>';
	            		}
            		}
                })
            	->help('Theses tags describes your page\'s content. They don\'t appear on the channel page itself but only in the html code. These tags help tell search engines what the page is about.')
            	->classes('cf-input')
            	->dashboardContainerClass('text-center middle'),

            Text::make('Status')
            	->hideFromIndex()
            	->hideOnForms()
        ];
    }

    public function filters()
    {
        return [
            \Quill\Sections\Filters\Status::class
        ];
    }

    public function actions()
    {
        return [
        ];
    }

    public function excludedFields()
    {
    	return [
    	];
    }

}
