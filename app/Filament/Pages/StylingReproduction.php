<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class StylingReproduction extends Page
{
    protected string $view = 'filament.pages.styling-reproduction';

    /** @var array{notes?: string, documents?: array<string>} */
    public array $data = [];

    public function mount(): void
    {
        Storage::disk('local')->put('example.txt', 'Example document for the disabled upload reproduction.');

        $this->form->fill([
            'notes' => '<p><strong>Inline label</strong> <img src="'.asset('example.svg').'" alt="Example" width="120" height="80"> trailing text</p><p>Next paragraph</p>',
            'documents' => ['example.txt'],
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                RichEditor::make('notes')->resizableImages(),
                FileUpload::make('documents')
                    ->disk('local')
                    ->multiple()
                    ->previewable(false)
                    ->disabled(),
            ]);
    }
}
