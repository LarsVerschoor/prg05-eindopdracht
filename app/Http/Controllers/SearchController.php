<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $allCars = Car::all();
        $search = '';
        $cars = 0;
        $posts = [];
        if ($request->has('search')) {
            $search = $request->search;
        }
        if ($request->has('cars')) {
            $cars = $request->cars;
        }

        if ($search === '' && $cars === 0) {
            return view('search.index', compact('allCars', 'search', 'cars', 'posts'));
        }

        $posts = Post::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })
            ->where('visibility', '1')
            ->when($cars, function ($query) use ($cars) {
                $query->whereHas('cars', function($query) use ($cars) {
                    $query->where('cars.id', $cars);
                });
            })
            ->get();

        return view('search.index', compact('allCars', 'search', 'cars', 'posts'));
    }
}
