<?php

namespace App\Http\Controllers;
use App\Models\Historique;
use App\Models\Logo;
use App\Models\Mission;
use App\Models\Organigrame;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Models\Motsdirect;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParametreController extends Controller
{
   
    public function index()
    {
        // Retrieve only records where isPublished is true
        $Motsdirect = Motsdirect::where('isPublished', true)->first();
        $contact = Contact::where('isPublished', true)->first();
        $org = Organigrame::where('isPublished', true)->first();
        $histo = Historique::where('isPublished', true)->first();
        $mission = Mission::where('isPublished', true)->first();

        // dd($parametres->id);
        return view('administration.pages.parametre.edit', compact('Motsdirect','contact','org','histo','mission'));
        // return response()->json($parametres);
    }
    public function indexcont()
    {
        $contact = Contact::where('isPublished', true)->first()?? Contact::latest('id')->first();



      

        // dd($parametres->id);
        return view('administration.pages.contact.index', compact('contact'));
        // return response()->json($parametres);
    }
    public function indexorg()
    {
        $org = Organigrame::where('isPublished', true)->first()?? Organigrame::latest('id')->first();


      

        // dd($parametres->id);
        return view('administration.pages.organigrame.index', compact('org'));
        // return response()->json($parametres);
    }
    public function indexhisto()
    {
        $histo = Historique::where('isPublished', true)->first()?? Historique::latest('id')->first();

      

        // dd($parametres->id);
        return view('administration.pages.historique.index', compact('histo'));
        // return response()->json($parametres);
    }
    public function indexlogo()
    {
        $histo = Logo::latest('id')->first();

      

        // dd($parametres->id);
        return view('administration.pages.logo.index', compact('histo'));
        // return response()->json($parametres);
    }
    public function indexdirect()
    {
        $Motsdirect = Motsdirect::where('isPublished', true)->first() ?? Motsdirect::latest('id')->first();
        return view('administration.pages.motdirect.index', compact('Motsdirect'));
    }
    public function indexmission()
    {
        $mission = Mission::where('isPublished', true)->first() ?? Mission::latest('id')->first();
        // dd($parametres->id);
        return view('administration.pages.mission.index', compact('mission'));
        // return response()->json($parametres);
    }

   


    public function updateMotsDirecteur(Request $request, $id = 'new')
    {
        $validated = $request->validate([
            'NameWAr' => 'required|string|max:255',
            'NameWFr' => 'required|string|max:255',
            'myeditorinstanceAr' => 'required|string',
            'myeditorinstanceFr' => 'required|string',
            'imgUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('imgUrl')) {
            $imagePath = $request->file('imgUrl')->store('directeurImg', 's3');
            $validated['imgUrl'] = ($imagePath);

            // Initialize the ImageManager
            $manager = new ImageManager(new Driver());

            // Read the image from S3
            $image = $manager->read(Storage::disk('public')->get($imagePath));

            // Resize the image
            $image->resize(width: 680, height: 922);

            // Save the resized image to a temporary file
            $resizedImagePath = tempnam(sys_get_temp_dir(), 'resized_image');
            $image->save($resizedImagePath);

            // Upload the resized image back to S3
            $resizedImageS3Path = 'settingImages/resized_' . basename($imagePath);
            Storage::disk('public')->put($resizedImageS3Path, file_get_contents($resizedImagePath));

            // Save the resized image URL (the path relative to the S3 folder)
            $validated['image'] = $resizedImageS3Path;

            // Optionally, delete the temporary file
            unlink($resizedImagePath);


            
        }

        if ($id !== 'new') {
            $motsdirect = Motsdirect::find($id);
            $motsdirect->isPublished = false;
            $motsdirect->updated_at = now();
        }

        $newmotsdirect = Motsdirect::create([
            'NameWAr' => $validated['NameWAr'] ?? $motsdirect->NameWAr ?? null,
            'NameWFr' => $validated['NameWFr'] ?? $motsdirect->NameWFr ?? null,
            'descriptionWAr' => $validated['myeditorinstanceAr'] ?? $motsdirect->descriptionWAr ?? null,
            'descriptionWFr' => $validated['myeditorinstanceFr'] ?? $motsdirect->descriptionWFr ?? null,
            'imgUrl' => $validated['imgUrl'] ?? $motsdirect->imgUrl ?? null,
            'isPublished' => $request->has('isPublished'),
            'created_at' => now(),
            'user_id' => auth()->id(),
        ]);

        if ($id !== 'new') {
            $motsdirect->save();
        }

        return Redirect::route('motdirectad.index')->with('status', 'mots-directeur-updated');
    }


    
    /**
     * Update "Contact" fields.
     */
    public function updateContact(Request $request, $id = 'new')
    {
        $validated = $request->validate([
            'telephone' => 'required|string|max:20',
            'adressAr' => 'required|string',
            'adressFR' => 'required|string',
            'boitePostaleFR' => 'nullable|string|max:20',
            'boitePostaleAR' => 'nullable|string|max:20',
            'longe' => 'nullable|string|max:50',
            'alt' => 'nullable|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        if ($id !== 'new') {
            $contact = Contact::find($id);
            $contact->isPublished = false;
            $contact->updated_at = now();
        }

        $newcontact = Contact::create([
            'isPublished' => $request->has('isPublished'),
            'telephone' => $validated['telephone'] ?? $contact->telephone ?? null,
            'adressAr' => $validated['adressAr'] ?? $contact->adressAr ?? null,
            'adressFR' => $validated['adressFR'] ?? $contact->adressFR ?? null,
            'boitePostaleFR' => $validated['boitePostaleFR'] ?? $contact->boitePostaleFR ?? null,
            'boitePostaleAR' => $validated['boitePostaleAR'] ?? $contact->boitePostaleAR ?? null,
            'longe' => $validated['longe'] ?? $contact->longe ?? null,
            'alt' => $validated['alt'] ?? $contact->alt ?? null,
            'email' => $validated['email'] ?? $contact->email ?? null,
            'created_at' => now(),
            'user_id' => auth()->id(),
        ]);

        if ($id !== 'new') {
            $contact->save();
        }

        return Redirect::route('contad.index')->with('status', 'profile-updated');
    }

    public function updateOrganigramme(Request $request, $id = 'new')
    {
        $validated = $request->validate([
            'orgImgUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descriptionorgAR' => 'nullable|string',
            'descriptionorgFR' => 'nullable|string',
        ]);

        if ($request->hasFile('orgImgUrl')) {
            $imagePath = $request->file('orgImgUrl')->store('OrganigramImg', 's3');
            $validated['orgImgUrl'] = ($imagePath);
        }

        if ($id !== 'new') {
            $org = Organigrame::find($id);
            $org->isPublished = false;
            $org->updated_at = now();
        }

        $neworg = Organigrame::create([
            'isPublished' => $request->has('isPublished'),
            'orgImgUrl' => $validated['orgImgUrl'] ?? $org->orgImgUrl ?? null,
            'descriptionorgAR' => $validated['descriptionorgAR'] ?? $org->descriptionorgAR ?? null,
            'descriptionorgFR' => $validated['descriptionorgFR'] ?? $org->descriptionorgFR ?? null,
            'created_at' => now(),
            'user_id' => auth()->id(),
        ]);

        if ($id !== 'new') {
            $org->save();
        }

        return Redirect::route('orgad.index')->with('status', 'organigramme-updated');
    }

    public function updateHistorique(Request $request, $id = 'new')
    {
        $validated = $request->validate([
            'histoAr' => 'nullable|string',
            'histoFR' => 'nullable|string',
        ]);

      

        if ($id !== 'new') {
            $histo = Historique::find($id);
            $histo->isPublished = false;
            $histo->updated_at = now();
        }

        $newParametre = Historique::create([
            'histoAr' => $validated['histoAr'] ?? $histo->histoAr ?? null,
            'histoFR' => $validated['histoFR'] ?? $histo->histoFR ?? null,
            'created_at' => now(),
            'isPublished' => $request->has('isPublished'),
            'user_id' => auth()->id(),
        ]);

        if ($id !== 'new') {
            $histo->save();
        }

        return Redirect::route('histoad.index')->with('status', 'historique-updated');
    }
    public function updateLogo(Request $request, $id = 'new')
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('logoImg', 's3');
            $validated['image_url'] = ($imagePath);
        }

        if ($id !== 'new') {
            $logo = Logo::find($id);
           
            $logo->updated_at = now();
        }

        $newParametre = Logo::create([
        'name' => $validated['name'] ?? $histo->name ?? null,
            'image_url' => $validated['image_url'] ?? $histo->image_url ?? null,
            'created_at' => now(),
        ]);

        if ($id !== 'new') {
            $logo->save();
        }

        return Redirect::route('logoad.index')->with('status', 'logo-updated');
    }


    public function updateMission(Request $request, $id = 'new')
    {
        $validated = $request->validate([
           
            'titleAr'=> 'nullable|string',
        'titleFr'=> 'nullable|string',
        'descriptionWAr'=> 'nullable|string',
        'descriptionWFr'=> 'nullable|string',
            

        ]);
        // dd($validated);
        if ($id !== 'new'){
        $mission = Mission::find($id);

            $mission->isPublished = false;
            $mission->updated_at = now();
        } 
        $newParametre = Mission::create([
        
            'titleAr' =>  $validated['titleAr'] ??  $mission->titleAr, // Preserve old histoAr
            'titleFr' =>  $validated['titleFr'] ?? $mission->titleFr, // Preserve old histoFR
            'descriptionWAr' => $validated['descriptionWAr'] ?? $mission->descriptionWAr, // Preserve old logoUrl
            'descriptionWFr' => $validated['descriptionWFr'] ?? $mission->descriptionWFr, // Preserve old logoUrl
            'created_at' => now(),
            'updated_at' => null,
            'isPublished' => $request->has('isPublished'),
             // Set updated_at to current time
            'user_id' => auth()->id(), 
        ]);
        if ($id !== 'new'){
        $mission->save();
        }
    
        return Redirect::route('mission.index', )->with('status', 'mission-updated');
   
    }

}
