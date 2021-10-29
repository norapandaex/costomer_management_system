<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="/">
                    ホーム
                </a>

                <a href="#" style="text-decoration: none;"><div class="sb-sidenav-menu-heading" onclick="clickBtn1()" style="color: rgba(249, 248, 248, 0.825);">スケジュール管理 ▼</div></a>
                <div id="p1">
                    {!! link_to_route('schedules.index', '一覧', [], ['class' => 'nav-link']) !!}
                    {!! link_to_route('schedules.create', '作成', [], ['class' => 'nav-link']) !!}
                </div>

                @if(Auth::user()->division == 1 || Auth::user()->division == 0)
                    <a href="#" style="text-decoration: none;"><div class="sb-sidenav-menu-heading" onclick="clickBtn2()" style="color: rgba(249, 248, 248, 0.825);">顧客管理 ▼</div></a>
                    <div id="p2">
                        {!! link_to_route('costomers.index', '一覧', [], ['class' => 'nav-link']) !!}
                        {!! link_to_route('costomers.create', '登録', [], ['class' => 'nav-link']) !!}
                    </div>

                    <a href="#" style="text-decoration: none;"><div class="sb-sidenav-menu-heading" onclick="clickBtn3()" style="color: rgba(249, 248, 248, 0.825);">サイト管理 ▼</div></a>
                    <div id="p3">
                        {!! link_to_route('sites.index', '一覧', [], ['class' => 'nav-link']) !!}
                        {!! link_to_route('sites.create', '登録', [], ['class' => 'nav-link']) !!}
                    </div>

                    <a href="#" style="text-decoration: none;"><div class="sb-sidenav-menu-heading" onclick="clickBtn4()" style="color: rgba(249, 248, 248, 0.825);">コスト管理 ▼</div></a>
                    <div id="p4">
                        {!! link_to_route('costs.index', '一覧・登録', [], ['class' => 'nav-link']) !!}
                    </div>

                    <a href="#" style="text-decoration: none;"><div class="sb-sidenav-menu-heading" onclick="clickBtn5()" style="color: rgba(249, 248, 248, 0.825);">売り上げ管理 ▼</div></a>
                    <div id="p5">
                        {!! link_to_route('sales.index', '一覧', [], ['class' => 'nav-link']) !!}
                    </div>
                @endif

                <br>
                {!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'nav-link']) !!}

                {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <div style="color: white;">
            @if(Auth::user()->division == 1)
                WEB事業部/HP制作事業部
            @elseif(Auth::user()->division == 2)
                P管理事業部/マーケティング事業部
            @elseif(Auth::user()->division == 3)
                P管理事業部/動画事業部
            @elseif(Auth::user()->division == 4)
                WEB事業部/メディア事業部
            @endif<br>
            </div>
            {!! link_to_route('users.show', Auth::user()->name, ['user' => Auth::user()->id], ['style' => 'color: white;']) !!}
        </div>
    </nav>
</div>

<script>
    //初期表示は非表示
    document.getElementById("p1").style.display ="none";
    document.getElementById("p2").style.display ="none";
    document.getElementById("p3").style.display ="none";
    document.getElementById("p4").style.display ="none";
    document.getElementById("p5").style.display ="none";
    
    function clickBtn1(){
        const p1 = document.getElementById("p1");
    
        if(p1.style.display=="block"){
            // noneで非表示
            p1.style.display ="none";
        }else{
            // blockで表示
            p1.style.display ="block";
        }
    }

    function clickBtn2(){
        const p2 = document.getElementById("p2");

        if(p2.style.display=="block"){
            // noneで非表示
            p2.style.display ="none";
        }else{
            // blockで表示
            p2.style.display ="block";
        }
    }

    function clickBtn3(){
        const p3 = document.getElementById("p3");

        if(p3.style.display=="block"){
            // noneで非表示
            p3.style.display ="none";
        }else{
            // blockで表示
            p3.style.display ="block";
        }
    }

    function clickBtn4(){
        const p4 = document.getElementById("p4");

        if(p4.style.display=="block"){
            // noneで非表示
            p4.style.display ="none";
        }else{
            // blockで表示
            p4.style.display ="block";
        }
    }

    function clickBtn5(){
        const p5 = document.getElementById("p5");

        if(p5.style.display=="block"){
            // noneで非表示
            p5.style.display ="none";
        }else{
            // blockで表示
            p5.style.display ="block";
        }
    }
    </script>