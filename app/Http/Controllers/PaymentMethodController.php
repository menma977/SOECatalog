<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
      'type' => 'required|min:1|string',
      'name' => 'required|min:1|string',
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
   * @param string $data
   * @return JsonResponse|Response
   */
  public function show($data = "")
  {
    if ($data) {
      $this->listPaymentMethod = PaymentMethod::where('name', 'like', '%' . $data . '%')->get();
    }

    $this->listPaymentMethod->map(function ($item) {
      $item->date = Carbon::parse($item->created_at)->format('d/M/Y');
    });

    return response()->json($this->listPaymentMethod, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param $id
   * @return RedirectResponse|Response
   * @throws ValidationException
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'type' => 'required|min:1|string',
      'name' => 'required|min:1|string',
      'description' => 'required|min:10|string'
    ]);

    $paymentMethod = PaymentMethod::find($id);
    $paymentMethod->type = $request->type;
    $paymentMethod->name = $request->name;
    $paymentMethod->description = $request->description;
    $paymentMethod->save();

    return redirect()->back()->with('message', "$request->name has been edit");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $id
   * @return RedirectResponse|Response
   */
  public function destroy($id)
  {
    $paymentMethod = PaymentMethod::find($id);
    PaymentMethod::destroy($id);

    return redirect()->back()->with('message', "$paymentMethod->name has been delete");
  }
}
