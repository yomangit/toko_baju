@props(['error', 'type', 'disabled' => false])

<input @disabled($disabled)
    {{ $attributes->class([
        'block px-3 font-semibold border input-ghost shadow-sm input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:bg-transparant focus:border-accent focus:ring-accent focus:ring-1',
        'block px-3 font-semibold border shadow-sm input input-ghost input-bordered input-xs placeholder-slate-400 outline-none focus:bg-transparant border-rose-500 ring-rose-500 ring-1' => $error,
    ]) }}
    @isset($type) type="{{ $type }}" @endif />
