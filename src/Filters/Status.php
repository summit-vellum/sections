<?php

namespace Quill\Sections\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Vellum\Filters\Filter;


class Status extends Filter
{

    /**
     * Additional query builder
     * @param  Builder $builder Current eloquent query
     * @param  mixed  $value   Value to be used for the query
     * @return Builder
     */
    public function applyFilter(Builder $builder)
    {
    	if (request($this->filterName()) != null) {
    		$builder->with('state')
	            ->whereHas('state', function($query) {
	                $query->where($this->foreignKey(), request($this->filterName()));
	        });
    	}

        return $builder;
    }

    /**
     * Key to be used for select name and param url
     * @return string
     */
    public function key()
    {
        return 'status';
    }

    protected function foreignKey()
    {
        return 'status';
    }

    /**
     * List of values in the dropdown
     * @return array
     */
    public function options()
    {
        return \Quill\Status\Models\State::class;
    }

}
