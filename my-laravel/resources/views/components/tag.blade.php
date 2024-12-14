@props(['size' => 'base'])

@php
$classes ="bg-white/10 hover:bg-red/25 font-bold rounded-x1 transition-colors duration-300";

if($size == 'base'){
$classes .=" px-5 py-2 text-sm";
}

if($size == 'small'){
$classes .=" px-2 py-1 text-2xs";

}
@endphp
<a href="#" class="{{$classes}}">{{$slot}}</a>