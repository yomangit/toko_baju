@props(['error','options','nama','disabled' => false])
<select {{ $attributes->class(['select validator select-xs border-slate-300 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1',
'select validator select-xs border-slate-300   outline-none border-rose-500 ring-rose-500 ring-1' => $error]) }}>
 <option selected  value="">{{__('Pilih :')}}</option>
    @foreach ($options as $option )
    <option value={{ $option->id }}>{{$option->$nama }}</option>
    @endforeach

</select>
