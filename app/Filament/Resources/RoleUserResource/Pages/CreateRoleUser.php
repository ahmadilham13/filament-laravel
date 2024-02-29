<?php

namespace App\Filament\Resources\RoleUserResource\Pages;

use App\Filament\Resources\RoleUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRoleUser extends CreateRecord
{
    protected static string $resource = RoleUserResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->user()->id;

        return $data;
    }
}
