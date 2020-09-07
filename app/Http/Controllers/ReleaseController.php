<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Release;
use DateTime;

class ReleaseController extends Controller
{
    public function index(): Collection
    {
        return Release::take(10)->get();
    }

    public function getAllByDate(): Collection
    {
        return Release::take(100)
            ->orderBy('date', 'asc')
            ->get();
    }

    public function store(Request $request): Model
    {
        $request->validate($this->getValidationRules());

        $release = Release::create([
            'name' => $request->name,
            'date' => $request->date
        ]);
        $release->save();

        return $release;
    }


    public function show(int $id): Model
    {
        return Release::findOrFail($id);
    }

    public function update(Request $request, int $id): void
    {
        $request->validate($this->getValidationRules());
        
        Release::where('id', $id)
          ->update([
            'name' => $request->name,
            'date' => $request->date
          ]);
    }

    public function destroy(int $id): void
    {
        Release::destroy($id);
    }

    public function getValidationRules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'date' => 'required|date_format:"Y-m-d"'
        ];
    }
}
