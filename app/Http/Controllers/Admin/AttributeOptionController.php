<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Option;
use Illuminate\Http\Request;

class AttributeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Attribute $attribute): void
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Attribute $attribute): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Attribute $attribute)
    {
        abort_if(request()->user()->is('salesman'), 403, 'You don\'t have permission.');

        $data = $request->validate([
            'name' => ['required'],
            'value' => ['required'],
        ]);

        $option = $attribute->options()->create($data);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Option created successfully',
                'option' => $option,
            ]);
        }

        return back()->withSuccess('Option created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute, Option $option): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute, Option $option): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute, Option $option)
    {
        abort_if(request()->user()->is('salesman'), 403, 'You don\'t have permission.');

        $data = $request->validate([
            'name' => ['required'],
            'value' => ['required'],
        ]);

        $option->update($data);

        return back()->withSuccess('Option updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute, Option $option)
    {
        abort_unless(request()->user()->is('admin'), 403, 'You don\'t have permission.');
        $option->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Option deleted successfully',
            ]);
        }

        return back()->withSuccess('Option deleted successfully');
    }
}
