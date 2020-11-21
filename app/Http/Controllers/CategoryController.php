<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
  protected $listCategory;

  public function __construct()
  {
    $this->listCategory = Category::all();
  }

  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    return view('category.index');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse|Response
   * @throws ValidationException
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:1|string|unique:categories,name',
      'description' => 'required|min:10|string'
    ]);

    $category = new Category();
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    return redirect()->back()->with('message', "$request->name has been saved");
  }

  /**
   * Display the specified resource.
   *
   * @param string $data
   * @return JsonResponse|void
   */
  public function show($data = "")
  {
    if ($data) {
      $this->listCategory = Category::where('name', 'like', '%' . $data . '%')->get();
    }

    $this->listCategory->map(function ($item) {
      $item->date = Carbon::parse($item->created_at)->format('d/M/Y');
    });

    return response()->json($this->listCategory, 200);
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
      'name' => 'required|min:1|string|unique:categories,name',
      'description' => 'required|min:10|string'
    ]);

    $category = Category::find($id);
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    return redirect()->back()->with('message', "$request->name has been edit");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $id
   * @return RedirectResponse
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    Category::destroy($id);

    return redirect()->back()->with('message', "$category->name has been delete");
  }
}
