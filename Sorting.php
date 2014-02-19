<?php
/*
@Author Name : Onjon Shahadat Hossain
@Email : onjon_sh@yahoo.com

@Project Name : Marge Sort
@Version : 1.0.1
@Release Date : 23rd October, 2012
*/ 

$a = array();
for( $i = 0 ; $i < 100 ; $i++ ) {
    $b = rand( 0 , 99 );
    $fl = 0 ;
    for( $j = 0 ; $j < sizeof( $a ) ; $j++ ) {
        if( $a[ $j ] == $b ) {
            $fl = 1 ;
            break ;
        }
    }    
    if( $fl == 0 ) {
        $a[] = $b ;
    }
    else {
        $i-- ;
    }
}
function doSort( $arr ) {
    $sz = sizeof( $arr ) ;
    if( $sz == 1 ) {
        return $arr ;
    }
    $b = $sz / 2 ; // First half Element 
    settype( $b , "int" ) ;
    $c = $sz - $b ; // Second half Element  
    $brr = array() ;
    $crr = array() ;
    for( $i = 0 ; $i < $b ; $i++ ) {
        $brr[] = $arr[ $i ] ;
    }
    for( $i = $b ; $i < $sz ; $i++ ) {
        $crr[] = $arr[ $i ] ;
    }
    $drr = doSort( $brr ) ; // Left Tree 
    $err = doSort( $crr ) ; // Right Tree 
    $mainArr = conqure( $drr , $err );
    return $mainArr ; 
}

function conqure( $a , $b ) {
    $asz = sizeof( $a );
    $bsz = sizeof( $b );
    $arr = array();
    for( $i = 0 , $j = 0 ; $i < $asz || $j < $bsz ; ) {
        if( $i >= $asz ) {
            $arr[] = $b[ $j ] ; 
            $j++ ; 
        }
        else if( $j >= $bsz ) {
            $arr[] = $a[ $i ] ; 
            $i++ ; 
        }
        else if( $a[ $i ] < $b[ $j ] ) {
            $arr[] = $a[ $i ] ; 
            $i++ ;
        }
        else {
            $arr[] = $b[ $j ] ; 
            $j++ ;
        }
    }
    
    return $arr ; 
} 

$arr = doSort( $a );
echo "Divide And Conquere/ Marge Sort<br/>";
$c = 0 ;
for( $i = 0 ; $i < sizeof( $arr ) ; $i++ ) {
    echo $arr[ $i ] . "&nbsp;&nbsp;&nbsp;" ;
    $c++ ; 
    if( $c % 10 == 0 ) {
        echo "<br/>";
    }
}
?>