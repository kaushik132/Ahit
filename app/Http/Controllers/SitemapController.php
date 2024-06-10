<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Blog;
use App\ItServices;
use App\ProjectCategory;
use App\ItProduct;
use App\Project;
use App\BlogCategory;

class SitemapController extends Controller
{
 
    
    public function index(){
    $blogs = Blog::all();
    $itServices = ItServices::all();
    $projectCategory = ProjectCategory::all();
    $projectsCategory = ProjectCategory::all();
    $itProduct = ItProduct::all();
    $project = Project::all();
    $blogCategory = BlogCategory::all();
    
    
            return response()->view('front_website.page.sitemap',['blogs'=> $blogs,  'itServices'=>$itServices, 'projectCategory'=>$projectCategory
            , 'itProduct'=>$itProduct,'projectsCategory'=>$projectsCategory , 'project'=>$project , 'blogCategory'=>$blogCategory
            ])->header('Content-Type','text/xml');
    
    
        
    }




}
