<?php

namespace App\Http\Controllers\Webcore;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\Webcore\CreateUserRequest;
use App\Http\Requests\Webcore\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Permission;
use App\Models\Permissiongroup;
use App\Models\Permissionlabel;
use Response;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request; // added by dandisy
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth; // added by dandisy
use Illuminate\Support\Facades\Storage; // added by dandisy
use Maatwebsite\Excel\Facades\Excel; // added by dandisy

class StaffTUController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        // $this->middleware('auth');
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        $userDataTable->setIsStaffTU(true);
        return $userDataTable->render('staff_tus.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('staff_tus.create')
                    ->with('roles',$roles);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        if($request->roles <> ''){
            $user->roles()->attach($request->roles);
        }

        Flash::success('User saved successfully.');

        return redirect(route('staff_tus.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('staff_tus.index'));
        }

        $groups = Permissiongroup::all();
        $permissions = [];

        foreach($groups as $group){
            $labels = Permissionlabel::where('permission_group_id', $group->id)->get();
            $arr_label = [];
            foreach($labels as $label){
                $arr_label[] = [
                    'name' => $label->name,
                    'permissions' => Permission::where('permissions_label_id', $label->id)->select('id', 'name')->get()
                ];
            }

            $permissions[] = [
                'group' => $group->name,
                'labels' => $arr_label
            ];
        }

        return view('staff_tus.show')->with('user', $user)->with('permissions', $permissions);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('staff_tus.index'));
        }

        // edited by dandisy
        // return view('staff_tus.edit')->with('user', $user);
        return view('staff_tus.edit')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('staff_tus.index'));
        }

        // Sync roles if provided
        if ($request->roles <> '') {
            $user->syncRoles($request->roles);
        } else {
            $user->roles()->detach();
        }

        // Prepare data for update
        $data = $request->all();

        // Check if password is present and not empty
        if (empty($data['password'])) {
            unset($data['password']); // Remove password from the data array if it's empty
        }

        // Update user data
        $user = $this->userRepository->update($data, $id);

        Flash::success('User updated successfully.');
        return redirect(route('staff_tus.index'));
    }


    public function permissions(Request $request){

        $input = $request->except('checkAll');
        $user = $this->userRepository->findWithoutFail(@$input['id']);
        
        if($request->permissions <> ''){
            $user->syncPermissions($request->permissions);
        }else{
            $user->permissions()->detach();
        }

        Flash::success('User Permissions updated successfully.');
        return redirect(route('staff_tus.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('staff_tus.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('staff_tus.index'));
    }

    /**
     * Store data User from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $user = $this->userRepository->create($item->toArray());
            });
        });

        Flash::success('User saved successfully.');

        return redirect(route('staff_tus.index'));
    }
}
