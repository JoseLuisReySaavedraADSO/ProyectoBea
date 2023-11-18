@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/M2PPb6n/boceto-logo-2.png" class="logo" alt="Logo bea">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
