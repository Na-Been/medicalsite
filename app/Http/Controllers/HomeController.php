<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Faq;
use App\Models\News;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        $blogs = Blog::latest()->take(2)->get();
        $testimonials = Testimonial::all();
        $about = About::where('name', 'know_us')->first();
        $slider = Slider::where('rank', 1)->first();
        return view('home.welcome', compact('products', 'blogs', 'testimonials', 'about', 'slider'));
    }

    public function allProducts()
    {
        $items = Product::all();
        $slider = Slider::where('rank', 2)->first();
        return view('home.allProducts', compact('items', 'slider'));
    }

    public function about()
    {
        $abouts = About::all();
        $teams = Team::all();
        $slider = Slider::where('rank', 4)->first();
        return view('home.about', compact('abouts', 'teams', 'slider'));
    }

    public function blog()
    {
        $slider = Slider::where('rank', 6)->first();
        $blogs = Blog::latest()->take(4)->get();
        return view('home.blog', compact('blogs', 'slider'));
    }

    public function news()
    {
        $news = News::latest()->take(4)->get();
        $slider = Slider::where('rank', 5)->first();
        return view('home.news', compact('news', 'slider'));
    }

    public function faq()
    {
        $faqs = Faq::all();
        $slider = Slider::where('rank', 7)->first();
        return view('home.faq', compact('faqs', 'slider'));
    }

    public function contact()
    {
        $slider = Slider::where('rank', 8)->first();
        return view('home.contact', compact('slider'));
    }

    public function showProductAsCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $items = Product::where('category_id', $category->id)->get();
        $slider = Slider::where('rank', 2)->first();
        return view('home.product', compact('items', 'slider'));
    }

    public function showServicesAsCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $services = Service::orderBy('index_number')->get();
        $allServices = $services->groupBy('index_number');
        $brands = Service::where('index_number', 4)->get();
        $slider = Slider::where('rank', 3)->first();
        return view('home.services', compact('allServices', 'category', 'brands', 'slider'));
    }

    public function singleProductDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('home.productDetail', compact('product'));
    }

    public function displayBlogDescription($id)
    {
        $blog = Blog::whereId($id)->first();
        $slider = Slider::where('rank', 6)->first();
        $blogs = Blog::latest()->take(2)->get();
        return view('home.blogDetaill', compact('blog', 'blogs','slider'));
    }

    public function displayNewsDescription($id)
    {
        $news = News::whereId($id)->first();
        $newsUpdate = News::latest()->take(2)->get();
        return view('home.newsDetail', compact('news', 'newsUpdate'));
    }

}
