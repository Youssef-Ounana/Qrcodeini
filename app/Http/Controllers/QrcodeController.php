<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQrcodeRequest;
use App\Http\Requests\UpdateQrcodeRequest;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;





class QrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qrcodes=Qrcode::paginate(10);
        $qrcodes = auth()->user()->qrcodes;
        return view('qrcodes.index', compact('qrcodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qrcodes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQrcodeRequest $request)
    {

        $data = $request->validated(); //que les reps validé du request
        $data['user_id'] = auth()->user()->id;
        $qrcode = Qrcode::create($data); //creee Qrcode a partir du module Qrcode avec data recus
        $qrcode->qrcode_path = $this->saveQrcode($qrcode); //sauvegarder dans path
        $qrcode -> save();
        //decrementer le nombre des qrcode pour l'user
        //auth()->user()->decrement('nb_of_qrcodes');
        return to_route('qrcodes.index')->with('success','Qrcode added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Qrcode $qrcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Qrcode $qrcode)
    {
        return view('qrcodes.edit')->with('qrcode',$qrcode);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQrcodeRequest $request, Qrcode $qrcode)
    {
         $data = $request->validated(); //que les reps validé du request
        $data['user_id'] = 1;
        $qrcode = Qrcode::update($data); //creee Qrcode a partir du module Qrcode avec data recus
        $qrcode->qrcode_path = $this->saveQrcode($qrcode); //sauvegarder dans path
        $qrcode -> save();
        //decrementer le nombre des qrcode pour l'user
        auth()->user()->decrement('nb_of_qrcodes');
        return to_route('qrcodes.index')->with('success','Qrcode added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qrcode $qrcode)
    {
        //remove the qr code image from the storage
        $this->removeQrCodeFromStorage($qrcode->qrcode_path);
        //delete the qr code from our database
        $qrcode->delete();
        return to_route('qrcodes.index')->with('success','Qrcode deleted successfully.');
    }


    public function saveQrcode($qrcode){
        $builder = new Builder(
            writer: new PngWriter(),
            data: $qrcode->content,
            size: 150,
        );
        $generatedQrcode = $builder->build();

        $qrCodePath = 'qr_codes/'.$qrcode->id.'.png';

        Storage::disk('public')->put($qrCodePath, $generatedQrcode->getString());

        return 'storage/'.$qrCodePath;

    }


    public function removeQrCodeFromStorage($qrcodeFile)
    {
        $path = public_path($qrcodeFile);
        if(File::exists($path)) {
            File::delete($path);
        }
    }




}
