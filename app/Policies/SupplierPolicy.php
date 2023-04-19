<?php

namespace App\Policies;

use App\Models\User;
use App\Models\supplier;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SupplierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param supplier $supplier
     * @return Response|bool
     */
    public function view(User $user, supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param supplier $supplier
     * @return Response|bool
     */
    public function update(User $user, supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param supplier $supplier
     * @return Response|bool
     */
    public function delete(User $user, supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param supplier $supplier
     * @return Response|bool
     */
    public function restore(User $user, supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param supplier $supplier
     * @return Response|bool
     */
    public function forceDelete(User $user, supplier $supplier)
    {
        //
    }
}
