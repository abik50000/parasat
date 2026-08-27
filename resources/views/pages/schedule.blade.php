@extends('layouts.page')

@section('breadcrumb', __('page.schedule.breadcrumb'))
@section('title', __('page.schedule.title'))
@section('page-desc', __('pages.schedule.intro'))

@section('page-content')

@php $days = trans('pages.schedule.days'); $suffix = __('pages.schedule.class_suffix'); @endphp

<div style="display:flex;gap:10px;margin-bottom:32px;flex-wrap:wrap;" data-anim="fade-up">
    @foreach(['1','2','3','4','5','6','7','8','9','10','11'] as $cls)
    <button onclick="showClass('{{ $cls }}')" id="btn-{{ $cls }}"
            class="page-class-btn {{ $cls === '1' ? 'active' : '' }}">
        {{ $cls }}{{ $suffix ? ' '.$suffix : '' }}
    </button>
    @endforeach
</div>

@foreach(['1','2','3','4','5','6','7','8','9','10','11'] as $cls)
<div id="class-{{ $cls }}" style="display:{{ $cls === '1' ? 'block' : 'none' }};">
    <div class="page-table-wrap" data-anim="fade-up">
        <table class="page-table">
            <thead>
                <tr>
                    <th>#</th>
                    @foreach($days as $day)
                    <th>{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @for($i = 1; $i <= 7; $i++)
                <tr>
                    <td class="strong">{{ $i }}</td>
                    @foreach(range(1,5) as $d)
                    <td>—</td>
                    @endforeach
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <p class="banner-paragraph dark" style="font-size:13px;margin-top:16px;opacity:.6;">
        {{ __('pages.schedule.update_note') }}
    </p>
</div>
@endforeach

<script>
function showClass(cls) {
    document.querySelectorAll('[id^="class-"]').forEach(el => el.style.display = 'none');
    document.querySelectorAll('.page-class-btn').forEach(btn => btn.classList.remove('active'));
    document.getElementById('class-' + cls).style.display = 'block';
    document.getElementById('btn-' + cls).classList.add('active');
}
</script>

@endsection
