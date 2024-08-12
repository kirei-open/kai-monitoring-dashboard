<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TrainProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_train::profile');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TrainProfile $trainProfile): bool
    {
        return $user->can('view_train::profile');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_train::profile');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TrainProfile $trainProfile): bool
    {
        return $user->can('update_train::profile');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TrainProfile $trainProfile): bool
    {
        return $user->can('delete_train::profile');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_train::profile');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, TrainProfile $trainProfile): bool
    {
        return $user->can('force_delete_train::profile');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_train::profile');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, TrainProfile $trainProfile): bool
    {
        return $user->can('restore_train::profile');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_train::profile');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, TrainProfile $trainProfile): bool
    {
        return $user->can('replicate_train::profile');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_train::profile');
    }
}
