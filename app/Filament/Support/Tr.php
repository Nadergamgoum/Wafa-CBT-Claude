<?php

namespace App\Filament\Support;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;

/**
 * Translatable field pairs: English and Arabic side by side, stored as
 * {"en": "...", "ar": "..."} on the owning JSON attribute.
 */
class Tr
{
    public static function text(string $name, string $label, bool $required = false, ?string $help = null, int $max = 300): Grid
    {
        return Grid::make(['default' => 1, 'md' => 2])->schema([
            TextInput::make($name.'.en')->label($label.' — English')->required($required)->maxLength($max)->helperText($help),
            TextInput::make($name.'.ar')->label($label.' — العربية')->maxLength($max)
                ->extraInputAttributes(['dir' => 'rtl', 'lang' => 'ar']),
        ])->columnSpanFull();
    }

    public static function textarea(string $name, string $label, bool $required = false, ?string $help = null, int $rows = 3): Grid
    {
        return Grid::make(['default' => 1, 'md' => 2])->schema([
            Textarea::make($name.'.en')->label($label.' — English')->rows($rows)->required($required)->helperText($help)->autosize(),
            Textarea::make($name.'.ar')->label($label.' — العربية')->rows($rows)->autosize()
                ->extraInputAttributes(['dir' => 'rtl', 'lang' => 'ar']),
        ])->columnSpanFull();
    }

    public static function lines(string $name, string $label): Grid
    {
        return static::textarea($name, $label, false, 'One item per line.', 4);
    }

    public static function rich(string $name, string $label, bool $required = false): Grid
    {
        $toolbar = [['bold', 'italic', 'link'], ['h2', 'h3'], ['blockquote', 'bulletList', 'orderedList'], ['undo', 'redo']];

        return Grid::make(1)->schema([
            RichEditor::make($name.'.en')->label($label.' — English')->required($required)->toolbarButtons($toolbar),
            RichEditor::make($name.'.ar')->label($label.' — العربية')->toolbarButtons($toolbar)
                ->extraInputAttributes(['dir' => 'rtl', 'lang' => 'ar']),
        ])->columnSpanFull();
    }
}
