<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CateringTestimonial;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CateringTestimonialApiResource;

class CateringTestimonialController extends Controller
{
    //
    public function index()
    {
        $testimonials = CateringTestimonial::with(['cateringPackage'])->get();
        return CateringTestimonialApiResource::collection($testimonials);
    }
}
