<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Models\Model;
use Illuminate\Http\Request;

class AdminModelController extends Controller

{
    public function list()
    {
        $list_model = Model::all();
        return view('/admin/model/list', [
            'list_model' => $list_model,
            'title' => 'List Model'
        ]);
    }

    public function create()
    {
        return view('/admin/model/form', [
            'data_model' => null
        ]);
    }

    public function store(ModelRequest $request)
    {
        $model = new Model();
        $model->fill($request->validated());
        $model->save();
        return redirect()->route('listModel')->with(['status' => 'create model success', 'model' => $model->name]);
    }

    public function update($id)
    {
        $model = Model::find($id);
        return view('/admin/model/form', [
            'data_model' => $model,
            'title' => 'Update Model'
        ]);
    }

    public function save(ModelRequest $request, $id)
    {
        $model = Model::find($id);
        $model->update($request->validated());
        $model->save();
        return redirect()->route('listModel')->with(['status' => 'Update model success', 'model' => $model->name]);

    }

    public function delete($id)
    {
        $model = Model::find($id);
        $model->delete();
        return redirect()->route('listModel')->with(['status' => 'delete model success', 'model' => $model->name]);
    }
}
