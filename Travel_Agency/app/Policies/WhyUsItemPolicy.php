<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\WhyUsItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class WhyUsItemPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:WhyUsItem');
    }

    public function view(AuthUser $authUser, WhyUsItem $whyUsItem): bool
    {
        return $authUser->can('View:WhyUsItem');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:WhyUsItem');
    }

    public function update(AuthUser $authUser, WhyUsItem $whyUsItem): bool
    {
        return $authUser->can('Update:WhyUsItem');
    }

    public function delete(AuthUser $authUser, WhyUsItem $whyUsItem): bool
    {
        return $authUser->can('Delete:WhyUsItem');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:WhyUsItem');
    }

    public function restore(AuthUser $authUser, WhyUsItem $whyUsItem): bool
    {
        return $authUser->can('Restore:WhyUsItem');
    }

    public function forceDelete(AuthUser $authUser, WhyUsItem $whyUsItem): bool
    {
        return $authUser->can('ForceDelete:WhyUsItem');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:WhyUsItem');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:WhyUsItem');
    }

    public function replicate(AuthUser $authUser, WhyUsItem $whyUsItem): bool
    {
        return $authUser->can('Replicate:WhyUsItem');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:WhyUsItem');
    }

}