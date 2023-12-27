<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ResponseController;

const EMPLOYERS_ROUTE = '/employers';
const WRONG_PARAMS = "Wrong params!";


Route::redirect('/', EMPLOYERS_ROUTE);

Route::get(EMPLOYERS_ROUTE, function ()  {
    return ResponseController::json(EmployerController::get());
});

Route::post(EMPLOYERS_ROUTE, function (Request $request) {
    $validated = RequestController::validate($request->all(), [
            'name' => ['required', 'unique:employers', 'string'],
            'position' => ['required', 'string'],
            'salary' => ['required', 'numeric']
        ]
    );
    if (!$validated) {
        return ResponseController::json(["status" => WRONG_PARAMS]);
    }
    return ResponseController::json(EmployerController::add($validated));
});

Route::delete(EMPLOYERS_ROUTE, function (Request $request) {
    $validated = RequestController::validate($request->all(), [
        'id' => ['required', 'numeric']
    ]);
    if (!$validated) {
        return ResponseController::json(["status" => WRONG_PARAMS]);
    }
    return ResponseController::json(EmployerController::delete($validated['id']));
});

Route::patch(EMPLOYERS_ROUTE, function (Request $request) {
    $validated = RequestController::validate($request->all(), [
        'id' => ['required', 'numeric'],
        'name' => ['unique:employers', 'string'],
        'position' => ['string'],
        'salary' => ['numeric']
    ]);
    if (!$validated) {
        return ResponseController::json(["status" => WRONG_PARAMS]);
    }
    return ResponseController::json(EmployerController::edit($validated));
});
