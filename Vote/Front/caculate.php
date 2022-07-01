<?php
    //偵測是否需要排序
    $orderStr = '';
    if (isset($_GET['order'])) {
        $_SESSION['order']['col'] = $_GET['order'];
        $_SESSION['order']['type'] = $_GET['type'];

        if ($_GET['order'] == 'remain') {
            $orderStr = " ORDER BY DATEDIFF(`end`,now()) {$_SESSION['order']['type']}";
        } else {
            $orderStr = " ORDER BY `{$_SESSION['order']['col']}` {$_SESSION['order']['type']}";
        }
    }
    //使用all()函式來取得資料表subjects中的所有資料，請參考base.php中的函式all($table,...$arg)
    
    /**建立分頁所需的變數群
     * 
     * 
     * 
     */
    
    $filter = [];
    if (isset($_GET['filter'])) {
        if (!$_GET['filter'] == 0) {
            $filter = ['type_id' => $_GET['filter']];
        }
    }
    

    //算頁數

    $total = math('subjects', 'count', 'id', $filter);
    $div = 6;  // 一頁顯示幾筆
    $pages = ceil($total / $div);  //判斷有幾頁
    $now = isset($_GET['p']) ? $_GET['p'] : 1;
    $start = ($now - 1) * $div;
    $page_rows = " limit $start,$div";
    
    
    $subjects = all('subjects', $filter, $orderStr . $page_rows);
    
    /*  
    177~202   為 $subjects 加上all ()
    if(!empty($arg[0])){
            //第一個參數必須為陣列，使用迴圈來建立條件語句的陣列
            foreach($arg[0] as $key =>$value){
                
                $tmp[]="`$key`='$value'";
                
            }
            
            //將條件語句的陣列使用implode()來轉成字串，最後再接上第二個參數(必須為字串)
            $sql.=" WHERE ". implode(" AND " ,$tmp) . $arg[1];
        }else{
            $sql.=$arg[1];
        }
        break;
        
        //執行連線資料庫查詢並回傳sql語句執行的結果
        
        
        //fetchAll()加上常數參數FETCH_ASSOC是為了讓取回的資料陣列中
        //只有欄位名稱,而沒有數字的索引值
        
        // echo $sql;
        // echo "base.php 80行";
        
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);*/
        
        
        
        ?>