<?php

const  WHITE = 0;
const GRAY = 1;
const BLACK = 2;

//$M[]が隣接行列。以下ですべてを0で作成。
fscanf("%d", $n);
for($i = 0; $i < $n; $i++){
    for($j = 0; $j < $n; $j++) $M[$i][$j] = 0;
}

for($i = 0; $i < $n; $i ++){

    fscanf("%d %d", $u, $k);

    for($j = 0; $j < $k; $j++){
        fscanf("%d", $v);
    }


}




function dfs_visit($u){

    $colour[$u] = GRAY;
    $d[$u] = ++$t;

    for($v = 0; $v < $n; $v++){
        if($adj_list[$u]{$v} == 0) continue; //おそらく、$uが縦、$vが横になるはず

        if($colour[$v] == WHITE) dfs_visit($v);
    }

    $colour[$u] == BLACK;
    $fin_t[$u] == ++$t;

}

function dfs(){

    for($u = 0; $u < $n; $u++) $colour[$u] == WHITE;
    $t = 0;

    for($u = 0; $u < $n; $u++){
        if($colour[$u] == WHITE) dfs_visit($u); 
    }

    for($u = 0; $u < $n; $u++){
        echo $u+1, $d[$u], $t[$u];
    }

}

