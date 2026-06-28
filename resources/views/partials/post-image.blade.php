@php
 //TODO Clean

 if(!isset($cover)) $cover = false;
 if(!isset($yellow)) $yellow = false;

 $landscape = false;//$r->img_is_landscape();

 $zoom = "cover";
 if ($landscape) $zoom = "130%"; //"contain"

 if ($yellow) { $bgcol = "accent"; } else { $bgcol = $r->type_label; }
@endphp

<div class="overflow-hidden p-3 w-full bg-{{ $bgcol }}
    @if ($cover)
        h-full
    @endif">
    <div class="relative full overflow-hidden">
    @if ($cover)
        @php $url = get_the_post_thumbnail_url($r->p->ID, 'medium_large') @endphp
        @if ($landscape)
            <div
            class="absolute sat-hover full top-0 left-0  opacity-25"
            style="background: url('{!! $url !!}') center/cover no-repeat;">&nbsp;</div>
        @endif
        <div
            class="absolute sat-hover full top-0 left-0"
            style="background: url('{!! $url !!}') center/{{ $zoom }} no-repeat;"
        >&nbsp;</div>
    @else
        {!! get_the_post_thumbnail($r->p->ID, 'medium_large') !!}
    @endif
    </div>
</div>
