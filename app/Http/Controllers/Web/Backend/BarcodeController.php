<?php

namespace App\Http\Controllers\Web\Backend;
use TCPDF;

use App\Models\Barcode;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarcodeController extends Controller
{

    public function index()
    {
        $barcodes = Barcode::latest()->paginate(10);
        return view('backend.layouts.qr-code.qr-code', compact('barcodes'));
    }

    // Used QR Code Index
    public function ActiveCodes()
    {
        $barcodes = Barcode::where('status', 'active')->latest()->paginate(10);
        return view('backend.layouts.qr-code.active-qr-code', compact('barcodes'));
    }
    // Un-used QR Code Index
    public function Deactivecodes()
    {
        $barcodes = Barcode::where('status', 'de-active')->latest()->paginate(10);
        return view('backend.layouts.qr-code.deactive-qr-code', compact('barcodes'));
    }
    /**
     * Generate a new Barcode
     */
    public function generate()
    {
        // creating a url for qr code
        $code = Str::random(20);
        $qrCodeUrl = route('profile.create', ['code' => $code]);

        // Generate the QR code and convert it as SVG
        $qrCode = QrCode::format('svg')->size(300)->generate($qrCodeUrl);
        $pdfPath = uploadPdf($qrCode, 'qrcodes/', $code);
        Barcode::create([
            'code' => $code,
            'image_url' => $pdfPath,  // Save the PDF path in the database
        ]);

        return back()->with('success', 'QR Code generated successfully!');
    }



    // checkQR Code
    public function checkQrCode(Request $request)
    {
        // Validate the QR code input
        $request->validate([
            'qr_code' => 'required|string',
        ]);


        // Check if the profile with the given QR code exists
        $profile = Profile::where('qr_code', $request->qr_code)->first();

        // dd($profile);

        if (!$profile) {
            return redirect()->back()->with(['error' => 'Invalid QR Code']);
        }

        return redirect()->route('profile', ['slug' => $profile->slug]);


    }

    // public function destroy($id)
    // {
    //     try {
    //         // Find the barcode by ID
    //         $barcode = Barcode::findOrFail($id);

    //         // Delete the barcode
    //         $barcode->delete();

    //         // You can redirect back with a success message
    //         return redirect()->back()->with('success', 'Barcode deleted successfully.');
    //     } catch (\Exception $e) {
    //         // Handle any errors that may occur
    //         return redirect()->back()->with('error', 'Error occurred while deleting the barcode.');
    //     }
    // }

    public function printPdf($id)
    {
        $qrCode = Barcode::find($id);
        $pdf = Pdf::loadView('backend.pdf.qr-code-invoice', compact('qrCode'));
        // this is the file name, how will be the file title after downloading in pdf
        return $pdf->download($qrCode->code.'.pdf');
        // return $pdf->download('invoice.pdf');
    }

    public function searchCode(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Modify the query to search by QR code or token
        $barcodes = Barcode::when($search, function ($query, $search) {
            return $query->where('code', 'like', "%{$search}%");
        })->paginate(10);

        $usedQRCodes = Profile::pluck('qr_code')->toArray();

        // Pass the search term to the view for maintaining the search state
        return view('backend.layouts.qr-code.qr-code', compact('barcodes', 'search', 'usedQRCodes'));
    }

    // Bulk Delete Items
    public function bulkDelete(Request $request)
    {
        $barcodeIds = $request->input('barcode_ids');
        if (!$barcodeIds || count($barcodeIds) === 0) {
            return redirect()->back()->with('error', 'No barcodes selected for deletion.');
        }

        DB::transaction(function () use ($barcodeIds) {
            Barcode::whereIn('id', $barcodeIds)->delete();
        });

        return redirect()->back()->with('success', 'Selected barcodes have been deleted.');
    }










}
