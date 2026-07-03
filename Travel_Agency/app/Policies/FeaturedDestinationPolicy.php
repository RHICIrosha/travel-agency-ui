<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FeaturedDestination;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeaturedDestinationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FeaturedDestination');
    }

    public function view(AuthUser $authUser, FeaturedDestination $featuredDestination): bool
    {
        return $authUser->can('View:FeaturedDestination');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FeaturedDestination');
    }

    public function update(AuthUser $authUser, FeaturedDestination $featuredDestination): bool
    {
        return $authUser->can('Update:FeaturedDestination');
    }

    public function delete(AuthUser $authUser, FeaturedDestination $featuredDestination): bool
    {
        return $authUser->can('Delete:FeaturedDestination');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:FeaturedDestination');
    }

    public function restore(AuthUser $authUser, FeaturedDestination $featuredDestination): bool
    {
        return $authUser->can('Restore:FeaturedDestination');
    }

    public function forceDelete(AuthUser $authUser, FeaturedDestination $featuredDestination): bool
    {
        return $authUser->can('ForceDelete:FeaturedDestination');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FeaturedDestination');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FeaturedDestination');
    }

    public function replicate(AuthUser $authUser, FeaturedDestination $featuredDestination): bool
    {
        return $authUser->can('Replicate:FeaturedDestination');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FeaturedDestination');
    }

}