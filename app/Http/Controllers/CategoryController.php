<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
   * @return Response
   */
  public function store(Request $request)
  {
    //
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
   * @param Category $category
   * @return Response
   */
  public function update(Request $request, Category $category)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Category $category
   * @return Response
   */
  public function destroy(Category $category)
  {
    //
  }
}
