@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                {{-- Incluindo o SVG diretamente --}}
                @include('components.logos.logo-regiao')
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
