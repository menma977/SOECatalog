<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PaymentMethodController extends Controller
{
  protected $listPaymentMethod;

  public function __construct()
  {
    $this->listPaymentMethod = PaymentMethod::all();
  }

  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    return view('paymentMethod.index');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse
   * @throws ValidationException
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:1|string|unique:categories,name',
      'description' => 'required|min:10|string'
    ]);

    $paymentMethod = new PaymentMethod();
    $paymentMethod->type = $request->type;
    $paymentMethod->name = $request->name;
    $paymentMethod->description = $request->description;
    $paymentMethod->save();

    return redirect()->back()->with('message', "$request->name has been saved");
  }

  /**
   * Display the specified resource.
   *
   * @param PaymentMethod $paymentMethod
   * @return Response
   */
  public function show(PaymentMethod $paymentMethod)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param PaymentMethod $paymentMethod
   * @return Response
   */
  public function update(Request $request, PaymentMethod $paymentMethod)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param PaymentMethod $paymentMethod
   * @return Response
   */
  public function destroy(PaymentMethod $paymentMethod)
  {
    //
  }
}
