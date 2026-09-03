@extends('layouts.page')

@section('breadcrumb', __('page.attestation.breadcrumb'))
@section('title', __('page.attestation.title'))
@section('page-desc', __('pages.attestation.intro'))

@section('page-content')

<style>
    .att-lead { margin-bottom: 40px; }

    /* ── Toolbar: back button + breadcrumbs ── */
    .att-bar {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        padding: 12px 14px;
        background: #f4f7fb;
        border: 1px solid #e8edf5;
        border-radius: 12px;
        margin-bottom: 22px;
    }
    .att-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 16px 9px 12px;
        border: 1px solid #d7e0ec;
        border-radius: 9px;
        background: #fff;
        color: #012c68;
        font: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background .15s, border-color .15s, opacity .15s;
        flex-shrink: 0;
    }
    .att-back svg { width: 16px; height: 16px; }
    .att-back:hover:not(:disabled) { background: #012c68; border-color: #012c68; color: #fff; }
    .att-back:disabled { opacity: .4; cursor: default; }

    .att-crumbs {
        display: flex;
        align-items: center;
        gap: 4px;
        flex-wrap: wrap;
        font-size: 14px;
        min-width: 0;
    }
    .att-crumbs button {
        border: none;
        background: none;
        font: inherit;
        font-size: 14px;
        color: #5a6b7d;
        cursor: pointer;
        padding: 4px 6px;
        border-radius: 6px;
        transition: background .15s, color .15s;
    }
    .att-crumbs button:hover { background: #e6ecf5; color: #012c68; }
    .att-crumbs .att-crumbs__sep { color: #b6c2d2; user-select: none; }
    .att-crumbs .att-crumbs__current {
        color: #012c68;
        font-weight: 700;
        padding: 4px 6px;
    }

    /* ── Grid ── */
    .att-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 14px;
    }
    .att-grid > * { animation: attFade .22s ease both; }
    @keyframes attFade { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: none; } }

    .att-card {
        position: relative;
        display: flex;
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 13px;
        transition: border-color .18s, box-shadow .18s, transform .18s;
    }
    .att-card:hover {
        border-color: #cdd8e8;
        box-shadow: 0 10px 26px rgba(1, 44, 104, .10);
        transform: translateY(-2px);
    }

    /* folder card = a button filling the whole card */
    .att-card--folder { padding: 0; cursor: pointer; text-align: left; font: inherit; }
    .att-card--folder .att-card__open { width: 100%; }
    .att-card__chev {
        display: grid;
        place-items: center;
        padding-right: 14px;
        color: #b6c2d2;
        flex-shrink: 0;
        transition: color .15s, transform .15s;
    }
    .att-card__chev svg { width: 18px; height: 18px; }
    .att-card--folder:hover .att-card__chev { color: #012c68; transform: translateX(2px); }

    .att-card__open {
        flex: 1;
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 16px 44px 16px 16px;
        text-decoration: none;
        min-width: 0;
    }
    .att-card--folder .att-card__open { padding-right: 8px; align-items: center; }

    .att-ico {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
        background: #5a6b7d;
    }
    .att-ico svg { width: 23px; height: 23px; display: block; }
    .att-ico--folder { background: #fca206; }
    .att-card[data-type="pdf"]        .att-ico { background: #e0564e; }
    .att-card[data-type="word"]       .att-ico { background: #2b6cb0; }
    .att-card[data-type="excel"]      .att-ico { background: #1e874b; }
    .att-card[data-type="powerpoint"] .att-ico { background: #c05621; }
    .att-card[data-type="image"]      .att-ico { background: #6b46c1; }
    .att-card[data-type="archive"]    .att-ico { background: #b7791f; }

    .att-card__text { min-width: 0; align-self: stretch; display: flex; flex-direction: column; gap: 4px; }
    .att-card--folder .att-card__text { justify-content: center; }
    .att-card__title {
        color: #012c68;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.4;
    }
    .att-card__file {
        color: #98a2b2;
        font-size: 12px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .att-card__meta {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: auto;
        padding-top: 8px;
        font-size: 12px;
        color: #7a869a;
    }
    .att-card--folder .att-card__meta { margin-top: 4px; padding-top: 0; color: #8a95a5; }
    .att-stat { display: inline-flex; align-items: center; gap: 5px; }
    .att-stat svg { width: 15px; height: 15px; opacity: .9; }
    .att-ext {
        font-weight: 700;
        letter-spacing: .5px;
        font-size: 11px;
        color: #012c68;
        background: #eef2f8;
        padding: 2px 7px;
        border-radius: 5px;
    }

    .att-card__dl {
        position: absolute;
        top: 13px;
        right: 13px;
        width: 32px;
        height: 32px;
        border-radius: 9px;
        display: grid;
        place-items: center;
        background: #f4f7fb;
        color: #012c68;
        transition: background .15s, color .15s;
    }
    .att-card__dl svg { width: 17px; height: 17px; display: block; }
    .att-card__dl:hover { background: #012c68; color: #fff; }

    .att-empty {
        text-align: center;
        padding: 52px 24px;
        background: #f7f9fc;
        border-radius: 14px;
        color: #7a869a;
        font-size: 15px;
    }

    .att-note {
        margin-top: 44px;
        padding: 16px 20px;
        background: #f7f9fc;
        border-left: 4px solid #fca206;
        border-radius: 8px;
        color: #7a869a;
        font-size: 13px;
        line-height: 1.7;
    }

    .att-noscript h3 { color: #012c68; font-size: 16px; margin: 24px 0 8px; }
    .att-noscript ul { margin: 0 0 8px; padding-left: 20px; }
    .att-noscript a { color: #01409a; }

    @media (max-width: 520px) {
        .att-grid { grid-template-columns: 1fr; }
        .att-bar { padding: 10px; }
    }
</style>

@php
    $payload = $payload ?? ['tree' => [], 'flat' => []];

    $config = [
        'tree' => $payload['tree'],
        'i18n' => [
            'root' => __('pages.attestation.root'),
            'back' => __('pages.attestation.back'),
            'emptyRoot' => __('pages.attestation.empty'),
            'emptyFolder' => __('pages.attestation.empty_folder'),
            'download' => __('pages.attestation.download'),
            'open' => __('pages.attestation.open'),
        ],
    ];
@endphp

<p class="page-body-text att-lead" data-anim="fade-up">{{ __('pages.attestation.lead') }}</p>

<div id="att-app" data-anim="fade-up">
    <div class="att-bar">
        <button type="button" class="att-back" data-att-back disabled>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
            <span>{{ __('pages.attestation.back') }}</span>
        </button>
        <nav class="att-crumbs" data-att-crumbs aria-label="breadcrumb"></nav>
    </div>

    <div class="att-grid" data-att-grid></div>
</div>

<script type="application/json" id="att-config">@json($config, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)</script>

<noscript>
    <div class="att-note">{{ __('pages.attestation.no_js') }}</div>
    <div class="att-noscript">
        @forelse($payload['flat'] as $group)
            <h3>{{ $group['path'] }}</h3>
            <ul>
                @foreach($group['files'] as $file)
                    <li><a href="{{ $file['url'] }}" target="_blank" rel="noopener">{{ $file['name'] }} ({{ $file['ext'] }}{{ $file['size'] ? ', '.$file['size'] : '' }})</a></li>
                @endforeach
            </ul>
        @empty
            <p>{{ __('pages.attestation.empty') }}</p>
        @endforelse
    </div>
</noscript>

<p class="att-note" data-anim="fade-up">{{ __('pages.attestation.note') }}</p>

<script>
(function () {
    var app = document.getElementById('att-app');
    var cfgEl = document.getElementById('att-config');
    if (!app || !cfgEl) return;

    var cfg = JSON.parse(cfgEl.textContent);
    var i18n = cfg.i18n;

    var grid = app.querySelector('[data-att-grid]');
    var crumbsEl = app.querySelector('[data-att-crumbs]');
    var backBtn = app.querySelector('[data-att-back]');

    // ── Flatten tree into a lookup: id -> {id, name, parentId, folders:[ids], files:[...]} ──
    var nodes = { 0: { id: 0, name: i18n.root, parentId: null, folders: [], files: [] } };
    (function walk(list, parentId) {
        list.forEach(function (f) {
            nodes[f.id] = { id: f.id, name: f.name, parentId: parentId, folders: [], files: f.files || [] };
            nodes[parentId].folders.push(f.id);
            walk(f.folders || [], f.id);
        });
    })(cfg.tree || [], 0);

    var current = 0;

    var ICONS = {
        folder: '<path d="M4 7a2 2 0 0 1 2-2h4l2 2h6a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"/>',
        fileMini: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/>',
        chevron: '<path d="M9 6l6 6-6 6"/>',
        download: '<path d="M12 3v12m0 0 4-4m-4 4-4-4M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/>',
        pdf: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M9 13.5h6M9 17h6"/>',
        word: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M9 13.5h6M9 17h6"/>',
        text: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M9 13.5h6M9 17h6"/>',
        file: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/>',
        excel: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M8.5 13h7M8.5 17h7M12 11.5v7"/>',
        powerpoint: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><rect x="8.5" y="12.5" width="7" height="5" rx="1"/>',
        image: '<rect x="4" y="5" width="16" height="14" rx="2"/><circle cx="9" cy="10" r="1.4"/><path d="m5 16.5 4-3.5 3 2.5 3-3.5 4 4.5"/>',
        archive: '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M10.5 6h1.4M10.5 9h1.4"/><rect x="9.3" y="12.5" width="4" height="5" rx="1"/>'
    };

    function esc(s) {
        return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }
    function svg(name, sw) {
        return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="' + (sw || 1.7) +
            '" stroke-linecap="round" stroke-linejoin="round">' + (ICONS[name] || ICONS.file) + '</svg>';
    }

    function trail(id) {
        var arr = [], n = nodes[id], guard = 0;
        while (n && guard++ < 40) {
            arr.unshift(n);
            n = n.parentId === null ? null : nodes[n.parentId];
        }
        return arr;
    }

    function renderCrumbs() {
        var path = trail(current);
        crumbsEl.innerHTML = path.map(function (n, i) {
            var last = i === path.length - 1;
            var sep = i ? '<span class="att-crumbs__sep">/</span>' : '';
            if (last) return sep + '<span class="att-crumbs__current">' + esc(n.name) + '</span>';
            return sep + '<button type="button" data-att-go="' + n.id + '">' + esc(n.name) + '</button>';
        }).join('');
    }

    function folderCard(node) {
        var subFolders = node.folders.length;
        var subFiles = node.files.length;
        return '<button type="button" class="att-card att-card--folder" data-att-go="' + node.id + '">' +
            '<span class="att-card__open">' +
                '<span class="att-ico att-ico--folder">' + svgWhite('folder') + '</span>' +
                '<span class="att-card__text">' +
                    '<span class="att-card__title">' + esc(node.name) + '</span>' +
                    '<span class="att-card__meta">' +
                        '<span class="att-stat">' + svg('folder') + ' ' + subFolders + '</span>' +
                        '<span class="att-stat">' + svg('fileMini') + ' ' + subFiles + '</span>' +
                    '</span>' +
                '</span>' +
            '</span>' +
            '<span class="att-card__chev">' + svg('chevron', 2.2) + '</span>' +
        '</button>';
    }

    function svgWhite(name) {
        return '<svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">' +
            (ICONS[name] || ICONS.file) + '</svg>';
    }

    function fileCard(file) {
        var type = file.type || 'file';
        var meta = '<span class="att-ext">' + esc(file.ext || 'FILE') + '</span>';
        if (file.size) meta += '<span>·</span><span>' + esc(file.size) + '</span>';
        return '<div class="att-card att-card--file" data-type="' + esc(type) + '">' +
            '<a class="att-card__open" href="' + esc(file.url) + '" target="_blank" rel="noopener" ' +
               'aria-label="' + esc(i18n.open + ': ' + file.name) + '">' +
                '<span class="att-ico">' + svgWhite(type) + '</span>' +
                '<span class="att-card__text">' +
                    '<span class="att-card__title">' + esc(file.name) + '</span>' +
                    '<span class="att-card__file">' + esc(file.file) + '</span>' +
                    '<span class="att-card__meta">' + meta + '</span>' +
                '</span>' +
            '</a>' +
            '<a class="att-card__dl" href="' + esc(file.url) + '" download ' +
               'aria-label="' + esc(i18n.download + ': ' + file.name) + '">' + svg('download', 2) + '</a>' +
        '</div>';
    }

    function render() {
        var node = nodes[current] || nodes[0];

        backBtn.disabled = node.parentId === null;
        renderCrumbs();

        var html = node.folders.map(function (id) { return folderCard(nodes[id]); }).join('') +
                   node.files.map(fileCard).join('');

        if (!html) {
            html = '<div class="att-empty">' + esc(current === 0 ? i18n.emptyRoot : i18n.emptyFolder) + '</div>';
        }
        grid.innerHTML = html;
    }

    function go(id, push) {
        current = nodes[id] ? id : 0;
        if (push !== false) {
            var hash = current === 0 ? location.pathname + location.search : '#f' + current;
            history.pushState({ attId: current }, '', hash);
        }
        render();
    }

    function fromHash() {
        var m = /^#f(\d+)$/.exec(location.hash);
        return m && nodes[+m[1]] ? +m[1] : 0;
    }

    app.addEventListener('click', function (e) {
        var goEl = e.target.closest('[data-att-go]');
        if (goEl) { e.preventDefault(); go(+goEl.getAttribute('data-att-go')); return; }
        if (e.target.closest('[data-att-back]')) {
            var node = nodes[current];
            if (node && node.parentId !== null) go(node.parentId);
        }
    });

    window.addEventListener('popstate', function (e) {
        var id = e.state && typeof e.state.attId === 'number' ? e.state.attId : fromHash();
        go(id, false);
    });

    go(fromHash(), false);
    history.replaceState({ attId: current }, '');
})();
</script>

@endsection
