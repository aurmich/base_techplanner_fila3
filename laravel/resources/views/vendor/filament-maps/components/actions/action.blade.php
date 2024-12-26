@props([
    'action',
    'component',
    'icon' => null,
])

<x-dynamic-component
    :x-on:click="$action->getAlpineClickHandler()"
    :component="$component"
    :dark-mode="config('filament.dark_mode')"
    :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->merge($action->getExtraAttributes())"
    :form="$action->getFormToSubmit()"
    :tag="$action->getUrl() ? 'a' : 'button'"
    :wire:click="$action->getLivewireClickHandler()"
    :href="$action->isEnabled() ? $action->getUrl() : null"
    :target="$action->shouldOpenUrlInNewTab() ? '_blank' : null"
    :type="$action->canSubmitForm() ? 'submit' : 'button'"
    :color="$action->getColor()"
    :key-bindings="$action->getKeybindings()"
    :tooltip="$action->getTooltip()"
    :disabled="$action->isDisabled()"
    :icon="$icon ?? $action->getIcon()"
    :size="$action->getSize()"
    :label-sr-only="$action->isLabelHidden()"
    dusk="filament.admin.action.{{ $action->getName() }}"
>
    {{ $slot }}
</x-dynamic-component>
