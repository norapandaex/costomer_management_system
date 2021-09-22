<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="/">
                    ホーム
                </a>
                <div class="sb-sidenav-menu-heading">スケジュール管理</div>
                {!! link_to_route('schedules.index', '一覧', [], ['class' => 'nav-link']) !!}
                {!! link_to_route('schedules.create', '作成', [], ['class' => 'nav-link']) !!}

                <div class="sb-sidenav-menu-heading">顧客管理</div>
                {!! link_to_route('costomers.index', '一覧', [], ['class' => 'nav-link']) !!}
                {!! link_to_route('costomers.create', '登録', [], ['class' => 'nav-link']) !!}

                <div class="sb-sidenav-menu-heading">サイト管理</div>
                {!! link_to_route('sites.index', '一覧', [], ['class' => 'nav-link']) !!}
                {!! link_to_route('sites.create', '登録', [], ['class' => 'nav-link']) !!}

                <div class="sb-sidenav-menu-heading">コスト管理</div>
                {!! link_to_route('costs.index', '一覧・登録', [], ['class' => 'nav-link']) !!}

                <div class="sb-sidenav-menu-heading">売り上げ管理</div>
                {!! link_to_route('sales.index', '一覧', [], ['class' => 'nav-link']) !!}

                <br>
                {!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'nav-link']) !!}

                {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            @if(Auth::user()->division == 1)
                HP制作事業部
            @elseif(Auth::user()->division == 2)
                P管理事業部1
            @elseif(Auth::user()->division == 3)
                P管理事業部2
            @elseif(Auth::user()->division == 4)
                メディア事業部
            @endif<br>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>