<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnArgument;
class UserAuthController extends Controller
{
    // register page controller
    function register_form(Request $request)
    {

        // validating the form fields
        $validate = $request->validate([
            "username" => "required|string|min:6|max:70",
            "email" => "required|email",
            "password" => "required|string|min:4|max:10|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[!@#$%^&*]/"
        ], [
            "username.required" => "Username is required.",
            "username.min" => "Username must have 6 characters.",
            "username.max" => "Username must be less than 70 characters.",
            "email.required" => "Email is required.",
            "email.email" => "Enter valid email address.",
            "password.required" => "Password is required.",
            "password.min" => "Password must have 4 characters.",
            "password.max" => "Password must be less than 10 characters.",
            "password.regex" => "Password must contain one uppercase,lowercase,number and special characters."
        ]);

        // checking the user exists or not
        $user_exist = User::select("email")->whereEmail($validate["email"])->first();//sql query
        if ($user_exist) {
            return redirect()->back()->with("userExists", "User already exists.");
        }

        // saving the user in database
        $validate["password"] = Hash::make($validate["password"]);//hashing the password
        $add_user = User::create(["username" => $validate["username"], "email" => $validate["email"], "password" => $validate["password"]]);//saving the user sql query

        if (!$add_user) {
            return redirect()->back()->with("techError", "Technical Error! Please try again later.");
        }

        return redirect()->route("login");
    }

    // login page controller
    function login_form(Request $request)
    {
        // validating the login fields
        $validate = $request->validate([
            "email" => "required|email",
            "password" => "required|string|min:4|max:10|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[!@#$%^&*]/"
        ], [
            "email.required" => "Email is required.",
            "email.email" => "Enter valid email address.",
            "password.required" => "Password is required.",
            "password.min" => "Password must have atleast 4 characters.",
            "password.max" => "Password must be less then 10 characters.",
            "password.regex" => "Password must contain One uppercase, lowercase, Number and special characters."
        ]);

        // checking the user not exist

        $user_exits = User::select(["email", "password"])->whereEmail($validate["email"])->first();//sql query for user checking

        // checking the user is save or not
        if (!$user_exits) {
            return redirect()->back()->with("noUser", "Invalid email! please try again.");
        }

        // checking the password
        if (!Hash::check($validate["password"], $user_exits->password)) {
            return redirect()->back()->with("passwordError", "Invalid Password! Please try again.");
        }

        // authorization the user
        $auth_user = Auth::attempt($validate);
        if (!$auth_user) {
            return redirect()->back()->with("techError", "Technical error! Please try again later.");
        }

        return redirect()->route("home");

    }


    // logout route controller
    function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }

}
