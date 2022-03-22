<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\News;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $category = Category::count();
        $product = Product::count();
        $news = News::count();
        $enquiry = Enquiry::count();
        $enquiries = Enquiry::latest()->take(10)->get();
        return view('admin.dashboard.dashboard', compact('enquiries', 'category', 'product', 'news', 'enquiry'));
    }

    public function setting()
    {
        return view('admin.setting.create');
    }

    public function changeMode()
    {
        $setting = Setting::where('name', 'mode_status')->first();
        if ($setting) {
            DB::table('settings')->where([['name', 'mode_status']])
                ->update(['value' => !$setting->value]);
            return redirect()->back()->with('success', 'Theme Change Successfully');
        } else {
            return redirect()->back()->with('failed', 'Theme Cannot Be change Please Add Setting First');
        }
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required',
            'site_title' => 'required',
            'short_name' => 'required',
            'phone_number' => 'required|min:7|max:10',
            'mobile_number' => 'required|min:10|max:20',
            'address' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'skype_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
        ]);
        if ($request->hasFile('logo')) {
            $this->validate($request, [
                'logo' => 'required',
                'logo.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ]);
            $validated['logo'] = $request->logo->store('public/image');
        } else {
            $setting = Setting::where('name', 'logo')->first();
            if ($setting) {
                if ($setting->value) {
                    $validated['logo'] = $setting->value;
                }
            }
        }
        try {
            DB::beginTransaction();
            $validated['mode_status'] = 0;
            Setting::truncate();
            foreach ($validated as $key => $value) {
                Setting::insert([
                    'name' => $key,
                    'value' => $value,
                ]);
            }
            DB::commit();
            return redirect()->route('setting.store')->with('success', 'Setting Added Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('setting.store')->with('failed', 'Something Went Wrong While Adding Setting');
        }
    }

    public function showProfilePage()
    {
        return view('admin.profile.profile');
    }

    public function updateProfile(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $validateData['image'] = $this->storeImage($request);
        }
        try {
            $users = User::findOrFail(Auth::id());
            $users->update($validateData);
            return back()->with('success', 'Profile Updated Successfully');
        } catch (\Exception $exception) {
            return back()->with('failed', 'Profile Cannot Be Updated, Something Went Wrong');
        }
    }

    public function changePasswordPage()
    {
        return view('admin.profile.changePassword');
    }

    public function changePassword(ChangePassword $request)
    {
        try {
            DB::beginTransaction();
            User::findOrFail(Auth::id())->update(['password' => bcrypt($request->new_password)]);
            DB::commit();
            return redirect()->route('profile.index')->with('success', 'Password change successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('profile.index')->with('failed', 'Something went Wrong while changing password');
        }
    }
}
