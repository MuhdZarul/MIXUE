namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
<!-- // Assuming you're using the User model for authentication -->

class LoginController extends Controller
{
public function showLoginForm()
{
return view('adminlogin');
<!-- // Show the admin login form -->
}

public function login(Request $request)
{
<!-- // Validate the request data (e.g., email and password) -->
$validated = $request->validate([
'email' => 'required|email',
'password' => 'required|min:8', // Adjust password rules as needed
]);

<!-- // Attempt to authenticate the user with the provided credentials -->
if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
<!-- // Check if the user is an admin (you might have a role field or a boolean is_admin flag) -->
<!-- if (Auth::user()->is_admin) {
// Redirect to the admin dashboard -->
<!-- return redirect()->route('admin'); -->
<!-- }  -->

<!-- // If the user is not an admin, redirect to the regular login page or dashboard -->
return redirect()->route('login');
}

<!-- // If authentication fails, redirect back with an error -->
return back()->withErrors([
'email' => 'The provided credentials are incorrect.',
]);
}

protected function redirectTo()
{
<!-- // Redirect to the admin dashboard after successful login (handled in the login method) -->
return route('admin');
}
}