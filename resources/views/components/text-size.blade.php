@props(['error', 'type', 'value', 'disabled' => false])

<input @disabled($disabled)
    {{ $attributes->class([
        'block  w-24 px-3 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1',
        'block  w-24 px-3 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 outline-none border-rose-500 ring-rose-500 ring-1' => $error,
    ]) }}
    @isset($type) type="{{ $type }}" @endif
@isset($value) value="{{ $value }}" @endif />
