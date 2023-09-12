@props([
    'fontSize' => 'text-tiny',
    'id' => '',
    'onclick' => '',
    'modalTarget' => '',
    'type' => 'button',
])

<button @if ($id) id="{{ $id }}" @endif
    @if ($onclick) onclick="{{ $onclick }}" @endif
    @if ($type) type="{{ $type }}" @endif
    @if ($modalTarget) data-modal-target="{{ $modalTarget }}" data-modal-toggle="{{ $modalTarget }}" @endif
    class="block items-center md:flex text-white bg-red-500 hover:bg-red-700 text-tiny font-medium rounded-lg {{ $fontSize }} px-5 py-2.5 text-center"
    type="button">
    Hapus
</button>
