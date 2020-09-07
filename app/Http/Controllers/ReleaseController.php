<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Release;
use DateTime;

class ReleaseController extends Controller
{
    private Release $model;

    public function __construct(Release $model)
    {
        $this->model = $model;
    }

    public function index(): Collection
    {
        return $this->model->take(10)->get();
    }

    public function getAllByDate(): Collection
    {
        return $this->model->take(100)
            ->orderBy('date', 'asc')
            ->get();
    }

    public function store(Request $request): Model
    {
        $request->validate($this->getValidationRules());

        $release = $this->model->create([
            'name' => $request->name,
            'date' => $request->date
        ]);
        $release->save();

        return $release;
    }


    public function show(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function update(Request $request, int $id): void
    {
        $request->validate($this->getValidationRules());
        
        $this->model->where('id', $id)
          ->update([
            'name' => $request->name,
            'date' => $request->date
          ]);
    }

    public function destroy(int $id): void
    {
        $this->model->destroy($id);
    }

    public function getValidationRules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'date' => 'required|date_format:"Y-m-d"'
        ];
    }
}
