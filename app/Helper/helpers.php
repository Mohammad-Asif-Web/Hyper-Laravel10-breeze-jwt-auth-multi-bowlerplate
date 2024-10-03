<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Upload an image and return its URL.
 *
 * @param  \Illuminate\Http\UploadedFile  $image
 * @param  string  $directory
 * @return string
 */
function uploadImage($file, $folder, $name): string
{
    $imageName = Str::slug($name) . '.' . $file->extension();
    $file->move(public_path('uploads/' . $folder), $imageName);
    $path = 'uploads/' . $folder . $imageName;
    return $path;
}

/**
 * Deletes the specified image file if it exists.
 *
 * @param string $image The path to the image file to delete.
 * @return bool True if the file was successfully deleted, false otherwise.
 */
// Delete Image
function deleteImage($image)
{
    if (isset($image) && file_exists($image)) {
        unlink($image);
        return true; // Successfully deleted the file
    }
    return false; // File doesn't exist or wasn't provided
}

// Make Slug
function makeSlug($modal, $title): string
{
    $slug = $modal::where('slug', Str::slug($title))->first();
    if ($slug) {
        $randomString = Str::random(5);
        $slug = Str::slug($title) . $randomString;
    } else {
        $slug = Str::slug($title);
    }
    return $slug;
}

// Generate unique slug
function generateUniqueSlug($title, $table, $slugColumn = 'slug')
{
    // Generate initial slug
    $slug = str::slug($title);

    // Check if the slug exists
    $count = DB::table($table)->where($slugColumn, 'LIKE', "$slug%")->count();

    // If it exists, append the count
    return $count ? "{$slug}-{$count}" : $slug;
}


function uploadPdf($pdfContent, $folder, $name): string
{
    // Define the directory and file name
    $fileName = Str::slug($name) . '.svg';
    $directory = public_path('uploads/' . $folder);

    // Check if the directory exists, if not, create it
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    // Define the full file path
    $filePath = $directory . '/' . $fileName;

    // Save the PDF content to the file
    file_put_contents($filePath, $pdfContent);

    // Return the relative path to store in the database
    return 'uploads/' . $folder . $fileName;
}

