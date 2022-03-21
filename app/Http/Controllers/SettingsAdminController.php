<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\admin\Account;
use App\Models\admin\Artist;
use App\Models\admin\Label;
use wapmorgan\MediaFile\MediaFile;
use App\Models\album;
use App\Models\TotalStores;
use App\Models\artwork;
use App\Models\CustomUserSettings;
use App\Models\ArtistReleases;
use App\Models\genre;
use App\Models\Languages;
use App\Models\primaryGenre;
use App\Models\release;
use App\Models\User;
use App\Models\AudioDetails;
use App\Models\TrackDetails;
use App\Models\audio;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Support\Facades\DB;

class SettingsAdminController extends Controller
{
    public function release_settings(Request $request, $id){

      if(CustomUserSettings::where('user_id',$id)->exists()){
        $user_settings = CustomUserSettings::where('user_id',$id)->first();
        $user_settings->user_id = $id;
        $user_settings->record = $request->record;
        $user_settings->c_year = $request->c_year;
        $user_settings->r_year = $request->r_year;
        $user_settings->c_license = $request->c_license;
        $user_settings->r_license = $request->r_license;
        $user_settings->save();
        return redirect('/edit-settings/'.$id);
      }
      else {
        $user_settings = new CustomUserSettings;
        $user_settings->user_id = $id;
        $user_settings->record = $request->record;
        $user_settings->c_year = $request->c_year;
        $user_settings->r_year = $request->r_year;
        $user_settings->c_license = $request->c_license;
        $user_settings->r_license = $request->r_license;
        $user_settings->save();
        return redirect('/edit-settings/'.$id);
      }



    }

    public function store_settings(Request $request, $id){
      if(CustomUserSettings::where('user_id',$id)->exists()){
        $user_settings = CustomUserSettings::where('user_id',$id)->first();
        $user_settings->stores = $request->stores;
        $user_settings->save();
        $return_path = '/edit-settings/'.$id;
        return response()->json(['success'=>true, 'link'=>$return_path]);
      }
      else {
        $user_settings = new CustomUserSettings;
        $user_settings->stores = $request->stores;
        $user_settings->user_id = $id;
        $user_settings->save();
        $return_path = '/edit-settings/'.$id;
        return response()->json(['success'=>true, 'link'=>$return_path]);
      }
    }

    public function multi_release_page(Request $request){
      $array_ids = $request->array_id;
      return view('admin.us_settings.release',compact('array_ids'));
    }

    public function multi_store_page(Request $request){
      $array_ids = $request->array_id;
      $stores = TotalStores::all();
      return view('admin.us_settings.stores',compact('stores','array_ids'));
    }

    public function multi_release_settings(Request $request){
      $ids = $request->array_id;
      $array_id = $ids;
      $ids = explode(',', $ids);
      foreach($ids as $id){
        if(CustomUserSettings::where('user_id',$id)->exists()){
          $user_settings = CustomUserSettings::where('user_id',$id)->first();
          $user_settings->user_id = $id;
          $user_settings->record = $request->record;
          $user_settings->c_year = $request->c_year;
          $user_settings->r_year = $request->r_year;
          $user_settings->c_license = $request->c_license;
          $user_settings->r_license = $request->r_license;
          $user_settings->save();
        }
        else {
          $user_settings = new CustomUserSettings;
          $user_settings->user_id = $id;
          $user_settings->record = $request->record;
          $user_settings->c_year = $request->c_year;
          $user_settings->r_year = $request->r_year;
          $user_settings->c_license = $request->c_license;
          $user_settings->r_license = $request->r_license;
          $user_settings->save();
        }

      }
      return view('admin.setting')->with('array_id',$array_id);
    }

    public function multi_store_settings(Request $request){
      $ids = $request->array_id;
      $ids = explode(',', $ids);
      foreach($ids as $id){
        if(CustomUserSettings::where('user_id',$id)->exists()){
          $user_settings = CustomUserSettings::where('user_id',$id)->first();
          $user_settings->stores = $request->stores;
          $user_settings->save();
        }
        else {
          $user_settings = new CustomUserSettings;
          $user_settings->stores = $request->stores;
          $user_settings->user_id = $id;
          $user_settings->save();
        }
      }
      $return_path = '/user-settings';
      return response()->json(['success'=>true, 'link'=>$return_path]);
    }
}
