<?php

namespace Quill\Sections\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vellum\Contracts\Resource;
use Quill\Sections\Models\Sections;

class SectionsController extends Controller
{
    /**
     * find section details.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
    	$id = $request->get('id');
    	$success = false;
    	$section = Sections::whereId($id)->whereActive()->first();

    	if ($section) {
    		$success = true;
    	}

    	return response()->json([
    		'success' => $success,
    		'section' => $section
    	]);
    }

}
