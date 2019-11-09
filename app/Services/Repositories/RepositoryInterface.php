<?php


namespace App\Services\Repositories;

use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function index();

    public function store(Request $request);

    public function search(Request $request);

    public function searchDate(Request $request);

    public function update(Request $request, $model);

    public function destroy($model);
}

