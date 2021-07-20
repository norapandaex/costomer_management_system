    
            $("#sites").DataTable({
                "aaSorting": [],
                language: {
                 "decimal": ".",
                 "thousands": ",",
                 "sProcessing": "処理中...",
                 "sLengthMenu": "_MENU_ 件表示",
                 "sZeroRecords": "データはありません。",
                 "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
                 "sInfoEmpty": " 0 件中 0 から 0 まで表示",
                 "sInfoFiltered": "（全 _MAX_ 件より抽出）",
                 "sInfoPostFix": "",
                 "sSearch": "検索:",
                 "sUrl": "",
                 "oPaginate": {
                 "sFirst": "先頭",
                 "sPrevious": "前",
                 "sNext": "次",
                 "sLast": "最終",
                 }
                },
                // 件数切替機能 無効
                lengthChange: false,
                // 検索機能 無効
                //searching: false,
                // ソート機能 無効
                //ordering: false,
                // 情報表示 無効
                info: false,
                // ページング機能 無効
                paging: false,
            });
    
            $("#schedules").DataTable({
                
                "aaSorting": [],
                language: {
                 "decimal": ".",
                 "thousands": ",",
                 "sProcessing": "処理中...",
                 "sLengthMenu": "_MENU_ 件表示",
                 "sZeroRecords": "データはありません。",
                 "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
                 "sInfoEmpty": " 0 件中 0 から 0 まで表示",
                 "sInfoFiltered": "（全 _MAX_ 件より抽出）",
                 "sInfoPostFix": "",
                 "sSearch": "検索:",
                 "sUrl": "",
                 "oPaginate": {
                 "sFirst": "先頭",
                 "sPrevious": "前",
                 "sNext": "次",
                 "sLast": "最終",
                 }
                },
                order: [ [ 1, "desc" ] ],
                
                "lengthMenu": [10, 50, 100, 500, 1000],
            });

            $("#sales").DataTable({
                
                "aaSorting": [],
                language: {
                 "decimal": ".",
                 "thousands": ",",
                 "sProcessing": "処理中...",
                 "sLengthMenu": "_MENU_ 件表示",
                 "sZeroRecords": "データはありません。",
                 "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
                 "sInfoEmpty": " 0 件中 0 から 0 まで表示",
                 "sInfoFiltered": "（全 _MAX_ 件より抽出）",
                 "sInfoPostFix": "",
                 "sSearch": "検索:",
                 "sUrl": "",
                 "oPaginate": {
                 "sFirst": "先頭",
                 "sPrevious": "前",
                 "sNext": "次",
                 "sLast": "最終",
                 }
                },
                order: [ [ 0, "desc" ] ],
                
                "lengthMenu": [10, 50, 100, 500, 1000],
            });