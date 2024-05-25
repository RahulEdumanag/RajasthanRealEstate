<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Hashids\Hashids;
use App\Models\Page;
use App\Models\Setting;

if (!function_exists('getLastSelectedDropdownId')) {
    function getLastSelectedDropdownId($request)
    {
        return $request->session()->get('lastSelectedDropdownId');
    }
}


if (!function_exists('getImgMaxSizeModel')) {
    function getImgMaxSizeModel()
    {
        $ImgMaxSizeModel = Setting::with('imgsize')->where('Set_Reg_Id', getSelectedValue())->where('Set_Status', '=', 0)->first();
        
        return $ImgMaxSizeModel;
    }
}


if (!function_exists('deleteOldImages')) {
    function deleteOldImages($oldPath, $newPath)
    {
        if ($oldPath && $oldPath !== $newPath) {
            $oldImagePath = public_path("uploads/{$oldPath}");
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    }
}

// Old Code

// if (!function_exists('updateOrder')) {
//     function updateSerialOrder($order)
//     {
//         foreach ($order as $index => $itemId) {
//             $item = Page::find($itemId);

//             if ($item) {
//                 $item->Pag_SerialOrder = $index + 1;
//                 $item->save();
//             } else {
//                 \Log::error("Item with ID $itemId not found during order update.");
//             }
//         }
//     }
// }

function updateSerialOrder($order)
{
    foreach ($order as $index => $itemId) {
        // Log debug information
        \Log::debug("Updating order for item ID: $itemId, index: $index");

        $item = Page::find($itemId);

        if ($item) {
            // Log debug information
            $newOrderValue = $index + 1;
            \Log::debug("Found item. Setting Pag_SerialOrder to: $newOrderValue");

            $item->Pag_SerialOrder = $newOrderValue;
            $item->save();
        } else {
            // Log or handle the case where the item is not found
            \Log::error("Item with ID $itemId not found during order update.");
        }
    }
}

function getNextSerialOrder($pagCliId, $category)
{
    return \App\Models\Page::where('Pag_Reg_Id', $pagCliId)->whereHas('category', fn($query) => $query->where('PagCat_Name', $category))->max('Pag_SerialOrder') + 1;
}

function imageOrDefault($filePath, $defaultImagePath)
{
    return file_exists(public_path($filePath)) ? asset($filePath) : asset($defaultImagePath);
}

if (!function_exists('clearCache')) {
    function clearCache()
    {
        \Illuminate\Support\Facades\Cache::flush();
        \Illuminate\Support\Facades\Log::info('Cache cleared successfully.');
    }
}

function encodeId($value)
{
    $hashids = new Hashids('your_salt_here', 30); // Set your own salt and length
    return $hashids->encode($value);
}

function decodeId($hashedId)
{
    $hashids = new Hashids('your_salt_here', 30); // Set your own salt and length
    $decoded = $hashids->decode($hashedId);
    return $decoded ? $decoded[0] : null;
}

function getSelectedValue()
{
    $user = auth()->user();

    if ($user) {
        return session()->get('selectedValue', $user->Log_Reg_Id);
    }

    // Return a default value or handle the case when the user is not authenticated
    return null; // Adjust this based on your requirements
}

function generateRandomUseRegName($length = 8)
{
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function generateNumericPassword($length = 4)
{
    $numericString = '0123456789';
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $numericString[rand(0, strlen($numericString) - 1)];
    }

    return $randomPassword;
}

function getHotelInitials($hotelName)
{
    $words = explode(' ', $hotelName);
    $initials = '';
    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
    }
    return $initials;
}

function getInvoiceNumber($guest)
{
    $hotelInitials = getHotelInitials(Auth::user()->business_name);
    $currentYear = date('Y');
    $customerId = $guest->id;
    $formattedCustomerId = sprintf('%04d', $customerId);
    $invoiceNumber = $hotelInitials . '-' . $currentYear . '-' . $formattedCustomerId;
    return $invoiceNumber;
}

function getStayPrice($guest)
{
    $roomPrice = $guest->reservations->room->price;
    $checkIn = new DateTime($guest->reservations->check_in);
    $checkOut = new DateTime($guest->reservations->check_out);
    $stayDuration = $checkOut->diff($checkIn)->days;
    $totalStayAmount = $roomPrice * $stayDuration;
    $formattedStayAmount = sprintf('₹%d per day * %d days = ₹%.2f', $roomPrice, $stayDuration, $totalStayAmount);
    return [
        'totalStayAmount' => $totalStayAmount,
        'formattedStayAmount' => $formattedStayAmount,
    ];
}

// function getFormattedStayPrice($guest) {
//     $roomPrice = $guest->reservations->room->price;
//     $checkIn = new DateTime($guest->reservations->check_in);
//     $checkOut = new DateTime($guest->reservations->check_out);
//     $stayDuration = $checkOut->diff($checkIn)->days;
//     $totalStayAmount = $roomPrice * $stayDuration;

//     // Format the string
//     $formattedStayAmount = sprintf('₹%d per day * %d days = ₹%.2f', $roomPrice, $stayDuration, $totalStayAmount);

//     return $formattedStayAmount;
// }

?>
