<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\User;
use App\Repositories\StaffRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class StaffController extends AppBaseController
{
    /** @var  StaffRepository */
    private $staffRepository;

    public function __construct(StaffRepository $staffRepo)
    {
        $this->staffRepository = $staffRepo;
    }

    /**
     * Display a listing of the Staff.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('staffs.index');
    }

    /**
     * Show the form for creating a new Staff.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = $this->staffRepository->getRole()->except([User::ADMIN]);

        return view('staffs.create', compact('roles'));
    }

    /**
     * Store a newly created Staff in storage.
     *
     * @param  CreateStaffRequest  $request
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function store(CreateStaffRequest $request)
    {
        $input = $request->all();
        $this->staffRepository->store($input);

        Flash::success('Staff created successfully.');

        return redirect(route('staff.index'));
    }

    /**
     * @param  User  $staff
     *
     * @return Application|Factory|View
     */
    public function show(User $staff)
    {
        $staff->load('roles');

        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified Staff.
     *
     * @param  User  $staff
     * @return Application|Factory|View
     */
    public function edit(User $staff)
    {
        $staff->load('roles');
        $roles = $this->staffRepository->getRole()->except([User::ADMIN]);

        return view('staffs.edit', compact('staff', 'roles'));
    }

    /**
     * Update the specified Staff in storage.
     *
     * @param  UpdateStaffRequest  $request
     * @param  User  $staff
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateStaffRequest $request, User $staff)
    {
        $request['status'] = isset($request['status']);
        $this->staffRepository->update($request->all(), $staff->id);

        Flash::success('Staff updated successfully.');

        return redirect(route('staff.index'));
    }

    /**
     * Remove the specified Staff from storage.
     *
     * @param  User  $staff
     * @return JsonResponse
     */
    public function destroy(User $staff)
    {
        $staff->delete();

        return $this->sendSuccess('Staff deleted successfully.');
    }
}
