<?php

use App\Http\Controllers\ActualiteController;

use App\Http\Controllers\Admin\CategoryadController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\ComuniqueController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\DoctypeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExternalLinkController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\MoocController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PdfViewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\ServicetController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\SvgController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\Website\CommuniqueController;
use App\Http\Controllers\Website\DirecterController;
use App\Http\Controllers\Website\MediaController;
use App\Http\Controllers\Website\PolitiqueController;
use App\Http\Controllers\Website\ServiceController;
use App\Http\Middleware\ForceHttps;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\DSController;
use App\Http\Controllers\Website\HistoriqueController;
use App\Http\Controllers\Website\OrgagigrameController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\CategoryController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/direct', [DirecterController::class, 'index'])->name('direct.index');
Route::get('/sitemap', [App\Http\Controllers\Website\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/media', [MediaController::class,'index'])->name('media.index');
Route::get('/carousel/{type}/', [\App\Http\Controllers\Website\SettingController::class,'index'])->name('carousel.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}/chart', [CategoryController::class, 'showChart'])->name('categories.chart');

Route::get('/testsvg', [SvgController::class, 'showSvg']);
Route::get('/test', function () {
    return view('test.test');
});
Route::get('/testdash', function () {
    return view('test.dashboard');
})->name('dashtesting.index');
Route::get('/document/thumbnail/{id}', [DSController::class, 'getThumbnail'])->name('document.thumbnail');
Route::get('/partenair', [App\Http\Controllers\Website\PartnerController::class, 'index'])->name('partenair.index');
Route::get('view-pdf/{url}', [PdfViewController::class, 'viewPdf'])->where('url', '.*')->name('view.pdf');
Route::get('/presentation', [App\Http\Controllers\MissionController::class, 'index'])->name('presentation.index');
Route::get('/communique', [CommuniqueController::class, 'index'])->name('communique.index');
Route::get('/politique', [PolitiqueController::class, 'index'])->name('politique.index');
Route::get('/indicators-public', [\App\Http\Controllers\Website\IndicatorController::class, 'publicIndex'])->name('indicators.public');
Route::get('/historique', [HistoriqueController::class, 'index'])->name('historique.index');
Route::get('/organigramme', [OrgagigrameController::class, 'index'])->name('organigramme.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactMessageController::class, 'store'])->name('contactm.store');
Route::get('/docs/{type}/', [DSController::class, 'index'])->name('docs.index');
Route::get('/service/{type}/', [ServiceController::class, 'index'])->name('service.index');
Route::get('/serviced/{service}', [ServiceController::class, 'edit'])->name('service.details');
Route::get('/actualites/{actualite}/', [\App\Http\Controllers\Website\ActualiteController::class, 'edit'])->name('actualite.details');
Route::get('/actualites', [\App\Http\Controllers\Website\ActualiteController::class, 'index'])->name('actualites.index');
Route::get('/events', [\App\Http\Controllers\Website\EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [\App\Http\Controllers\Website\EventController::class, 'edit'])->name('events.details');
Route::get('/project', [\App\Http\Controllers\Website\ProjetController::class, 'index'])->name('project.index');
Route::get('/project/{projet}', [\App\Http\Controllers\Website\ProjetController::class, 'edit'])->name('project.details');
Route::get('/moocs', [\App\Http\Controllers\Website\MoocController::class, 'index'])->name('moocs.index');
Route::get('/moocs/{mooc}', [\App\Http\Controllers\Website\MoocController::class, 'show'])->name('moocs.details');
// Show the upload form
Route::get('/upload', [TestController::class, 'showUploadForm']);

// Handle file upload
Route::post('/upload', [TestController::class, 'upload']);

// Display or download a file
Route::get('/file/{file}', [TestController::class, 'showFile']);

Route::get('/files/{filename}', [FileController::class, 'serveFile']);

Route::get('/administration', [App\Http\Controllers\AdministrationController::class, 'index'])->middleware(['auth', 'verified'])->name('administration.index');
Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('language.switch');
Route::group(['middleware' => ['role:super-admin|admin|agent']  ], function () {
    Route::resource('categoriesad', \App\Http\Controllers\CategoryadController::class)->parameters(['categoriesad' => 'category']);
    Route::resource('categories.titles', TitleController::class);
    Route::resource('states', \App\Http\Controllers\StateController::class);
    Route::get('/statevalues', [\App\Http\Controllers\StateValueController::class, 'index'])->name('statevalues.index');
    Route::get('/statevalues/{title}/edit', [\App\Http\Controllers\StateValueController::class, 'edit'])->name('statevalues.edit');
    Route::put('/statevalues/{title}', [\App\Http\Controllers\StateValueController::class, 'update'])->name('statevalues.update');



    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);
    // Route::resource('logo', \App\Http\Controllers\LogoController::class);
    // logos
    Route::get('logoad', [ParametreController::class, 'indexlogo'])->name('logoad.index');

    Route::put('parametres/{id}/logo', [ParametreController::class, 'updateLogo']);
    Route::post('parametres/new/logo', [ParametreController::class, 'updateLogo'])->name('logo.store');
    

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

    Route::get('parametres', [ParametreController::class, 'index'])->name('parametres.index');
    Route::get('mission', [ParametreController::class, 'indexmission'])->name('mission.index');
    Route::get('motdirectad', [ParametreController::class, 'indexdirect'])->name('motdirectad.index');
    Route::get('histoad', [ParametreController::class, 'indexhisto'])->name('histoad.index');
    Route::get('orgad', [ParametreController::class, 'indexorg'])->name('orgad.index');
    Route::get('contad', [ParametreController::class, 'indexcont'])->name('contad.index');
    Route::get('/empty', function () {
        return view('administration.pages.empty.index');
    })->name('empty.index');
    Route::resource('settings', SettingController::class);
    Route::resource('externallinks', ExternalLinkController::class);
    Route::resource('indicators', IndicatorController::class);
    
    Route::get('parametres/{id}', [ParametreController::class, 'show']);
    // Route::delete('parametres/{id}', [ParametreController::class, 'destroy']);
    
    // Mots Directeur
    Route::put('parametres/{id}/mots-directeur', [ParametreController::class, 'updateMotsDirecteur']);
    Route::post('parametres/new/mots-directeur', [ParametreController::class, 'updateMotsDirecteur'])->name('motsdirect.store');

    // Mission
    Route::put('parametres/{id}/mission', [ParametreController::class, 'updateMission']);
    Route::post('parametres/new/mission', [ParametreController::class, 'updateMission'])->name('mission.store');
    
    // Contact
    Route::put('parametres/{id}/contact', [ParametreController::class, 'updateContact']);
    Route::post('parametres/new/contact', [ParametreController::class, 'updateContact'])->name('contact.store');
    
    // Organigramme
    Route::put('parametres/{id}/organigramme', [ParametreController::class, 'updateOrganigramme']);
    Route::post('parametres/new/organigramme', [ParametreController::class, 'updateOrganigramme'])->name('organigramme.store');
    
    // Historique
    Route::put('parametres/{id}/historique', [ParametreController::class, 'updateHistorique']);
    Route::post('parametres/new/historique', [ParametreController::class, 'updateHistorique'])->name('historique.store');
    

    Route::resource('document', DocumentController::class);
    Route::get('document/{id}/delete', [DocumentController::class, 'destroy']);
    
    Route::resource('documentad', DoctypeController::class);
    Route::get('documentad/{id}/delete', [DoctypeController::class, 'destroy']);
    
    Route::resource('servicetad', ServicetController::class);
    Route::get('servicetad/{id}/delete', [ServicetController::class, 'destroy']);
    Route::resource('servicead', \App\Http\Controllers\ServiceController::class);
    Route::get('servicead/{id}/delete', [\App\Http\Controllers\ServiceController::class, 'destroy']);
    
    Route::resource('projet', ProjectController::class);
    Route::get('projet/{id}/delete', [ProjectController::class, 'destroy']);

    Route::resource('event', EventController::class);
    Route::get('event/{id}/delete', [EventController::class, 'destroy']);
    
    Route::resource('ressource', RessourceController::class);
    Route::get('ressource/{id}/delete', [RessourceController::class, 'destroy']);


    Route::resource('actualite', ActualiteController::class);
    Route::get('actualite/{id}/delete', [ActualiteController::class, 'destroy']);

    
    Route::resource('partners', PartnerController::class);
    Route::get('partners/{id}/delete', [PartnerController::class, 'destroy']);
    Route::resource('multimedia', MultimediaController::class);
    
    Route::get('comunique', [ComuniqueController::class, 'index'])->name('comunique.index');
    Route::put('comunique/{id}/mission', [ComuniqueController::class, 'updatecomunique']);
    Route::put('comunique/new/mission', [ComuniqueController::class, 'updatecomunique'])->name('comunique.store');
    Route::get('politiquead', [\App\Http\Controllers\PolitiqueController::class, 'index'])->name('politiquead.index');
    Route::put('politiquead/{id}/mission', [\App\Http\Controllers\PolitiqueController::class, 'updatepolitiquead']);
    Route::put('politiquead/new/mission', [\App\Http\Controllers\PolitiqueController::class, 'updatepolitiquead'])->name('politiquead.store');

    Route::resource('social', SocialLinkController::class);
    Route::get('social/{id}/delete', [SocialLinkController::class, 'destroy']);

    Route::resource('mooc', MoocController::class);
    Route::get('/sitemaps', [App\Http\Controllers\SitemapController::class, 'index'])->name('admin.sitemap.index');
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('admin.messages.index');
    Route::delete('/messages/{id}', [ContactMessageController::class, 'delete'])->name('admin.messages.delete');
    Route::patch('/admin/messages/{id}/toggle-read', [ContactMessageController::class, 'toggleRead'])->name('admin.messages.toggle-read');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});






require __DIR__ . '/auth.php';
