<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\HomeService;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomeServicePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:HomeService');
    }

    public function view(AuthUser $authUser, HomeService $homeService): bool
    {
        return $authUser->can('View:HomeService');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:HomeService');
    }

    public function update(AuthUser $authUser, HomeService $homeService): bool
    {
        return $authUser->can('Update:HomeService');
    }

    public function delete(AuthUser $authUser, HomeService $homeService): bool
    {
        return $authUser->can('Delete:HomeService');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:HomeService');
    }

    public function restore(AuthUser $authUser, HomeService $homeService): bool
    {
        return $authUser->can('Restore:HomeService');
    }

    public function forceDelete(AuthUser $authUser, HomeService $homeService): bool
    {
        return $authUser->can('ForceDelete:HomeService');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:HomeService');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:HomeService');
    }

    public function replicate(AuthUser $authUser, HomeService $homeService): bool
    {
        return $authUser->can('Replicate:HomeService');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:HomeService');
    }

}