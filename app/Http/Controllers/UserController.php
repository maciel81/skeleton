<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::whereNot('username', 'SysAdmin')->with(['roles'])->paginate(20);

        return view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $roles = Role::whereNot('name', 'super-admin')->get();

        return view('admin.users.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => Hash::make('der@123'),
        ]);
        $user->assignRole($request->input('role'));
        DB::commit();

        return redirect()->route('admin.users.index')->with([
            'alert' => 'success',
            'message' => 'Usuário ' . $request->input('username') . ' criado com sucesso'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View|RedirectResponse
     */
    public function edit(User $user): View|RedirectResponse
    {
        $roles = Role::whereNot('name', 'super-admin')->get();

        if ($user->id === 1) {
            return redirect()->route('admin.users.index')->with([
                'alert' => 'error',
                'message' => 'Usuário não encontrado'
            ]);
        }

        return view('admin.users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        if ($user->id === 1) {
            return redirect()->route('admin.users.index')->with([
                'alert' => 'error',
                'message' => 'Usuário não encontrado'
            ]);
        }

        DB::beginTransaction();
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->updated_id = Auth::user()->id;
            $user->save();
            $user->syncRoles([$request->input('role')]);
        DB::commit();

        return redirect()->route('admin.users.index')->with(['alert' => 'success', 'message' => 'Dados do usuário alterados com sucesso!']);
    }

    /**
     * Habilita/Desabilita o usuário.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function active(User $user): RedirectResponse
    {

        if ($user->id === 1) {
            return redirect()->route('admin.users.index')->with([
                'alert' => 'error',
                'message' => 'Usuário não encontrado'
            ]);
        }

        if ($user->isActive()) {
            $user->updated_id = Auth::user()->id;
            $user->active = 0;
            $user->save();



            return redirect()->route('admin.users.index')->with([
                'alert' => 'success',
                'message' => 'Usuário desabilitado com sucesso',
            ]);
        }

        $user->updated_id = Auth::user()->id;
        $user->active = 1;
        $user->save();

        return redirect()->route('admin.users.index')->with([
            'alert' => 'success',
            'message' => 'Usuário habilitado com sucesso',
        ]);
    }

    /**
     * Exibe o formulário para alteração de senha.
     *
     * @return View
     */
    public function changePasswordForm(): View
    {
        return view(view: 'auth.change-password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function changeUserPassword($id): RedirectResponse
    {
        $user = User::where('id', $id)->whereNot('username', 'SysAdmin')->first();
        if (!$user) {
            return redirect()->route('admin.users.index')->with([
                'alert' => 'error',
                'message' => 'Usuário não encontrado'
            ]);
        }

        $user->password = Hash::make('der@123');
        $user->save();

        return redirect()->route('admin.users.index')->with([
            'alert' => 'success',
            'message' => 'Senha do usuário ' . $user->username . ' resetada com sucesso!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PasswordRequest $request
     * @return RedirectResponse
     */
    public function changeOwnPassword(PasswordRequest $request): RedirectResponse
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('user.change-password-form')
            ->with([
                'alert' => 'success',
                'message' => 'A senha foi alterada com sucesso'
            ]);
    }
}
