<x-filament-panels::page>
    <div @class(['apply-image-fix' => request()->boolean('image_fix'), 'apply-upload-fix' => request()->boolean('upload_fix')])>
        <p>Both examples use stock Filament styles. Toggle each workaround to compare.</p>
        <form method="GET" action="{{ route('filament.admin.pages.styling-reproduction') }}">
        <p style="margin-block: 1rem">
            <label><input type="checkbox" name="image_fix" value="1" @checked(request()->boolean('image_fix')) onchange="this.form.requestSubmit()"> Apply image spacing workaround</label>
        </p>
        <p style="margin-block: 1rem">
            <label><input type="checkbox" name="upload_fix" value="1" @checked(request()->boolean('upload_fix')) onchange="this.form.requestSubmit()"> Apply disabled upload workaround</label>
        </p>
        </form>

        {{ $this->form }}

        <h2 style="margin-top: 2rem">Rendered rich content</h2>
        <div id="rendered-prose" class="fi-prose" style="border: 1px solid #888; padding: 1rem; margin-top: 1rem">
            {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make($data['notes'] ?? '')->toHtml() !!}
        </div>
    </div>

    <style>
        .apply-image-fix .fi-prose p img,
        .apply-image-fix .fi-fo-rich-editor .tiptap p [data-resize-container] {
            margin-top: 0;
        }

        .apply-upload-fix .fi-fo-file-upload .filepond--root[data-disabled]:has(.filepond--item) .filepond--drop-label {
            display: none;
        }
    </style>
</x-filament-panels::page>
