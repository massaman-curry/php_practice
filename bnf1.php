<?php


// 7 7
// 1 3
// 2 7
// 3 4
// 4 5
// 4 6
// 5 6
// 6 7

$adj_list = [[1, 3], [2, 7], [3, 4], [4, 5], [4, 6], [5, 6], [6, 7]];
// $adj_lists = [
//     []
// ];

$n = 7; //頂点の数
$m = 7; //辺の数

$dist = array_fill(1, $n, -1);
$que = [];

$dist[1] = 0;
array_push($que, 1);

// var_dump($que);
// var_dump($dist);

while (!empty($que)){

    $v = array_shift($que);
    
    foreach($adj_list as $adj){ 
        //$v(つまり4など)の入った配列$adj_listからforeachで取得（[3, 4],[4, 5], [4, 6])、。

        // if($dist[$v] != -1) continue;
        //↑検査済みならもう検査しない。
        //adj_list を adjとして一つずつ取出し、queから取出した値（$v）が含まれている配列の、ペアの値（隣接の頂点）を取得。
        if(in_array($v, $adj)){
            // $adj[0]か[1]、$vでない値を$queに挿入
            $k = array_search($v, $adj) == 0 ? 1 : 0;
            $nv = $adj[$k];

            if($dist[$nv] == -1){

                $dist[$nv] = $dist[$v] + 1;
                array_push($que, $nv);

            }

        }

    }


}

var_dump($dist);













// function($input){

    
// }

// for($i = 0; $i < count($arrays); $i++){

//     if($arrays[$i][0] == $search_point){



//     }

// }



// foreach($arrays as $array){
//     [

//     foreach($array as $value){

//         $judge = ($value == $search_point) ?: FALSE;

//     }

//     $array[0] == $search_point ? $start[] = $array : '';

// }
