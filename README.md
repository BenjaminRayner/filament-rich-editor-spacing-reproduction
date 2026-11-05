# Rich-editor image spacing reproduction

Filament 5.11.1, Laravel 13.40.0, Livewire 4.4.8, PHP 8.5.12. Based on Filament's official 5.x reproduction template.

## Setup

```sh
git clone https://github.com/BenjaminRayner/filament-rich-editor-spacing-reproduction.git
cd filament-rich-editor-spacing-reproduction
composer setup
php artisan serve
```

Log in at `/admin` with `test@example.com` / `password` (local template credentials). Open **Examples** and select the seeded record. Standard list, create, edit, and view resource pages are available.

## Reproduce

1. Open the seeded **Image spacing example** record for editing.
2. The notes contain a text paragraph above the image, a bold inline label before it, trailing text, and a text paragraph below it.
3. Inspect `.tiptap p [data-resize-container]`: its computed top margin is 16px.
4. Open the resource's **View** page. The disabled rich editor renders the same saved content; `.fi-prose p img` has a computed top margin of 16px.
5. Append `?workarounds=1` to either page and reload. Both affected margins become 0px, with paragraph spacing retained.

There is no custom page or custom page template. `ExampleResource` uses `RichEditor::make('notes')->resizableImages()`; the view page uses Filament's default disabled form. The model, migration, factory, and seeder provide one persisted example. The image is a local SVG fixture.

## Workaround

`public/workarounds.css` contains only the image-spacing override. It is loaded by an optional panel head hook when `?workarounds=1` is present. Default pages use stock Filament styles.

## Screenshots

Edit: [before](public/edit-before.png) / [after](public/edit-after.png).

View: [before](public/view-before.png) / [after](public/view-after.png).

## Verification

Verified in Chromium: both extra margins change from 16px to 0px, and text above and below the image remains present. Resource create and edit submissions were also checked for persistence.
