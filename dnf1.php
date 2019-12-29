<?php

const  WHITE = 0;
const GRAY = 1;
const BLACK = 2;

//$M[]が隣接行列。以下ですべてを0で作成。
fscanf(STDIN, "%d", $n);

for($i = 0; $i < $n; $i++){
    for($j = 0; $j < $n; $j++) $adj_list[$i][$j] = 0; //0~$n-1というkey
}

for($i = 0; $i < $n; $i++){

    $input = explode(' ', fgets(STDIN));
    $input = array_map(function($a){
        return (int)$a;
    }, $input);
    // var_dump($input);
    $u = $input[0] - 1;

    for($j= 0; $j < $input[1]; $j++){
        $v = $input[2 + $j] - 1;
        $adj_list[$u][$v] = 1;
    }
    
}

var_dump($adj_list);

// var_dump($adj_list);

// for($i = 0; $i < $n; $i ++){

//     fscanf(STDIN, "%d %d", $u, $k);
//     $u--;
// //おそらく、fscanfは一行ごとに読んでいるから、上のfscanfでまとめて$vも取得しないと行けない気がする。explodeを使うようかも？
//     for($j = 0; $j < $k; $j++){
//         fscanf(STDIN, "%d", $v);
//         $v--; //$u--と同様、一番始めに作成した$n*$n全て0の隣接行列のキーに合わせるため。
//         //デクリメントしないと、0~6の配列に1~6の配列のデータを挿入することになる。
//         $M[$u][$v] = 1;
//     }

// }


// function dfs_visit($u){

//     $colour[$u] = GRAY;
//     $d[$u] = ++$t;

//     for($v = 0; $v < $n; $v++){
//         if($adj_list[$u]{$v} == 0) continue; //おそらく、$uが縦、$vが横になるはず

//         if($colour[$v] == WHITE) dfs_visit($v);
//     }

//     $colour[$u] == BLACK;
//     $f[$u] == ++$t;

// }

// function dfs(){

//     for($u = 0; $u < $n; $u++) $colour[$u] == WHITE;
//     $t = 0;

//     for($u = 0; $u < $n; $u++){
//         if($colour[$u] == WHITE) dfs_visit($u); 
//     }

//     for($u = 0; $u < $n; $u++){
//         echo $u+1, $d[$u], $f[$u];
//     }

// }

