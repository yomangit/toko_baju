@props(['error','type','disabled' => false])

<input @disabled($disabled) {{ $attributes->class(['block max-w-3xs   font-semibold border shadow-sm file-input-secondary file-input file-input-bordered file-input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1',
'block max-w-3xs   font-semibold border shadow-sm  file-input file-input-bordered file-input-xs file-input-secondary placeholder-slate-400 outline-none border-rose-500 ring-rose-500 ring-1' => $error
]) }}
@isset($type) type="{{ $type }}" @endif  />
