<?php

namespace App\Filament\Resources\AttestationLinkResource\Pages;

use App\Filament\Resources\AttestationLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttestationLinks extends ListRecords
{
    protected static string $resource = AttestationLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
