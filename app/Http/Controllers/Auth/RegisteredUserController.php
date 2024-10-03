<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {

        return view('frontend.auth.layouts.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Generate a random token and OTP
        $verificationToken = Str::random(32);
        $otp = rand(100000, 999999);

        // Temporarily store the user's data and verification token in the session for first time new users
        Session::put('registration_data', [
            'name'                  => $request->name,
            'email'                 => $request->email,
            'password'              => Hash::make($request->password),
            'verification_token'    => $verificationToken,
            'otp'                   => $otp,
        ]);

        // Send OTP email
        Mail::to($request->email)->send(new VerifyEmail($otp));

        // Redirect to the OTP verification page
        return redirect()->route('email.verify', ['token' => $verificationToken]);
    }

    /**
     * Display the OTP verification page.
     */
    public function verifyEmailPage($token)
    {
        // Check if the token matches the session data
        if (Session::get('registration_data.verification_token') !== $token) {
            return redirect()->route('register')->withErrors(['message' => 'Invalid verification token.']);
        }

        return view('frontend.auth.layouts.verify-account', ['token' => $token]);
    }

    /**
     * Verify the email with OTP.
     */
    public function verifyEmail(Request $request, $token): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'size:6'],
        ]);

        $otp = (int)implode('', $request->otp); // This will return '249664'

        $registrationData = Session::get('registration_data');
        if (!$registrationData) {
            return redirect()->route('register')->with('error', 'No registration data found. Please register first.');
        }

        $storedOtp = $registrationData['otp'];
        $storedToken = $registrationData['verification_token'];

        if ($token !== $storedToken) {
            return redirect()->route('register')->withErrors(['message' => 'Invalid verification token.']);
        }

        if ($otp !== $storedOtp) {
            return redirect()->route('email.verify', ['token' => $token])
                             ->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        // Create a new user using the registration data
        $user = User::create([
            'name' => $registrationData['name'],
            'email' => $registrationData['email'],
            'password' => $registrationData['password'],
        ]);

        $user->email_verified_at = Carbon::now();
        $user->save();

        // Log the user in
        Auth::login($user);

        return redirect()->route('success')->with('status', 'Your email has been verified successfully.');
    }

    // ========= Googlo Login Functions ================





}







