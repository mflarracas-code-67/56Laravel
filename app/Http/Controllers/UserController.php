<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;

class UserController extends Controller
{
    // Display the User List
    public function index(): View
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    // Display the Create User form
    public function create(): View
    {
        return view('users.create');
    }

    // Validate and save a new user
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $validated['name'] = $validated['full_name'];

        User::create($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully!');
    }

    // Display the Edit User form
    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    // Validate and update an existing user
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => ['nullable', 'string', 'min:8'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $validated['name'] = $validated['full_name'];

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        // Prepare the uploaded avatar
        if ($request->hasFile('avatar')) {
            $manager = new ImageManager(new Driver());

            $image = $manager->read($request->file('avatar'));

            // Resize and crop the image to 300 x 300 pixels
            $image->cover(300, 300);

            // Convert the image into JPEG format
            $encodedImage = $image->encode(
                new JpegEncoder(quality: 85)
            );

            // Generate a unique filename
            $avatarPath = 'avatars/' . Str::uuid() . '.jpg';

            // Save the prepared image
            Storage::disk('public')->put(
                $avatarPath,
                (string) $encodedImage
            );

            // Save only the image path in the database
            $validated['avatar'] = $avatarPath;

            // Remove the previous avatar after updating
            $oldAvatar = $user->avatar;

            $user->update($validated);

            if ($oldAvatar) {
                Storage::disk('public')->delete($oldAvatar);
            }
        } else {
            $user->update($validated);
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully!');
    }
}
