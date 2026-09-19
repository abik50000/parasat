<?php

namespace App\Filament\Resources\AttestationLinkResource\Pages;

use App\Filament\Resources\AttestationLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttestationLink extends EditRecord
{
    protected static string $resource = AttestationLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
