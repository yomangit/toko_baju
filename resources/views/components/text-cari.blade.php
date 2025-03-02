@props(['type','disabled' => false])

<input @disabled($disabled) {{ $attributes->class(['block max-w-xs px-3 font-semibold border shadow-sm  w-xs input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1'
]) }}
@isset($type) type="{{ $type }}" @endif  />
