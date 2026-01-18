<?php

namespace App\Providers;

use App\Models\Doctype;
use App\Models\Historique;
use App\Models\Logo;
use App\Models\Ressource;
use App\Models\Servicetype;
use App\Models\SocialLink;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('welcome', function ($view) {
            $sharedVar = Doctype::where('isPublished', true)
            ->whereNot('footer', true)
            ->get();
            // dd($sharedVar);
            $serviceVar = Servicetype::where('isPublished', true)->get();
            
            $logoUrl=  Logo::latest('id')->first()->image_url ?? null;
            // dd($logoUrl);
            $footer = Doctype::where('isPublished', true)
                    ->where('footer', true)
                    ->get();
            //  dd($footer);
            $socialLinks = SocialLink::where('isPublished', true)->get();
            $ressource = Ressource::where('isPublished', true)->get();
            // dd($ressource);
            $view->with(['sharedVar'=> $sharedVar, 'serviceVar' => $serviceVar, 'logo'=>$logoUrl,'footer'=>$footer,'socialLinks'=>$socialLinks,'ressource'=>$ressource]);

        });
        View::composer('*', function ($view) {
            $direction = App::getLocale() === 'ar' ? 'rtl' : 'ltr';
            $view->with('direction', $direction);
        });
        
    }
}
