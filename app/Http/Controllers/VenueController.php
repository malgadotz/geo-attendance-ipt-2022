<?php

namespace App\Http\Controllers;
use App\Models\Venue;
use App\Models\Geotable;
use App\Http\Requests\VenueRequest;
use App\Http\Requests\GeotableRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class VenueController extends Controller
{
     public function view()
    {
        $model= Venue::all();
        return view('venueview', ['model'=>$model]);
    }
    public function add()
    {
        return view('venueadd');
    }
    
    public function create(VenueRequest $request)
    {
        $data = $request->validated();
        $model= new Venue;

        $model->code=$data['code'];
        $model->identifier=$data['code'];
        $model->capacity=$data['capacity'];
        $model->locality=$data['locality'];
        $model->save();
        Alert::toast('Venue Added Succesfully: '.$model->code,'success');

        return redirect('admin/venue/view');
    }
    public function delete($id)
    {
        $model=Venue::find($id);     
        if($model->delete())
        Alert::toast('Venue Deleted Succesfully ','success');
           return redirect('admin/venue/view');
    }

    public function edit($id)
    {
        $model = Venue::find($id);   
        return view('venueedit', ['model'=>$model]);
    }
    
    public function update(Request $data)
    {
        $model = Venue::find($data->vid);

        $model->code=$data['code'];
        $model->identifier=$data['code'];
        $model->capacity=$data['capacity'];
        $model->locality=$data['locality'];
        if($model->save())
        Alert::toast('Venue Updated Succesfully ','success');
        return redirect('admin/venue/view');
    }

    public function location($id)
    {
        $model = Venue::find($id);
        $geo = Geotable::all();
        foreach($geo as $geo)
        if($geo->venue_id == $id) 
        {
            Alert::toast('Already assigned venue coordinates for: '.$model->code,'error');
            return redirect()->back();
        }
        
        return view('venuelocation', ['model'=>$model]);
    }

    public function locate(GeotableRequest $request)
    {
        
        $data = $request->validated();
        $model = new Geotable; 
        $model->venue_id = $data['venue_id'];
        $model->min_lat=$data['min_lat']   ;
        $model->min_long=$data['min_long']   ;
        $model->max_lat=$data['max_lat']   ;
        $model->max_long=$data['max_long']   ;

        $model->save();
        Alert::toast('Venue Location Assigned succesfully', 'success');
        return redirect()->route('admin.venue.view');
    }
    
}

