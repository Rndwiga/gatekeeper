<?php

namespace Rndwiga\Gatekeeper\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class GatekeeperUserController extends Controller
{

    /**
     * Store a single category.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($id)
    {
        $data = [
            'name' => request('name'),
            'slug' => request('slug'),
            'email' => request('email'),
            'bio' => request('bio'),
            'avatar' => request('avatar'),
            'meta' => request('meta', (object) []),
        ];

        validator($data, [
            'meta.theme' => 'in:dark,light',
            'name' => 'required',
            'slug' => 'required|'.Rule::unique(config('writter.database_connection').'.writter_authors', 'slug')->ignore(request('id')),
            'email' => 'required|email|'.Rule::unique(config('writter.database_connection').'.writter_authors', 'email')->ignore(request('id')),
        ])->validate();

        $entry = $id !== 'new' ? WritterAuthor::findOrFail($id) : new WritterAuthor(['id' => request('id')]);

        if (request('password')) {
            $entry->password = Hash::make(request('password'));
        }

        if (request('email') !== $entry->email && Str::contains($entry->avatar, 'gravatar')) {
            unset($data['avatar']);

            $entry->avatar = null;
        }

        $entry->fill($data);

        $entry->save();

        return  $entry->fresh();
    }

    /**
     * Return a single author.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function delete($id)
    {
        $entry = WritterAuthor::findOrFail($id);

        if ($entry->posts()->count()) {
            return response()->json(['message' => 'Please remove the author\'s posts first.'], 402);
        }

        if ($entry->id == auth('wink')->user()->id) {
            return response()->json(['message' => 'You cannot delete yourself.'], 402);
        }

       return $entry->delete();
    }

    /*
     * Profile
     */
    /**
     * Show the form for editing the profile.
     *
     * @return View
     */
    public function editProfile()
    {
        return view(config('gatekeeper.views.pages.profile'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return RedirectResponse
     */
    public function updateProfile(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return RedirectResponse
     */
    public function passwordProfile(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    /*
     * Authors management
     */

    /**
     * Store a newly created user in storage
     *
     * @param UserRequest $request
     * @param WritterAuthor $model
     * @return RedirectResponse
     */
    public function storeAuthor(UserRequest $request, WritterAuthor $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return View
     */
    public function editAuthor(WritterAuthor $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return RedirectResponse
     */
    public function updateAuthor(UserRequest $request, WritterAuthor  $user)
    {
        $hasPassword = $request->get("password");
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
                ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return RedirectResponse
     */
    public function destroyAuthor(WritterAuthor  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
