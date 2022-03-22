<?php

use App\Models\Setting;

function modeSelector($status)
{
    try {
        $setting = getSetting($status);
        if ($setting == null) {
            return 0;
        } else {
            return $setting;
        }
    } catch (Exception $exception) {
        return back()->with('failed', 'Cannot Change The Mode Please Add Setting First');
    }
}

function storeImage($request)
{
    return $request->image->store('public/image');
}

function getSetting($name)
{
    $setting = Setting::pluck('value', 'name')->toArray();
    return $setting[$name] ?? '';
}



?>
