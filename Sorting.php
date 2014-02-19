<?php
/*
@Author Name : Onjon Shahadat Hossain
@Email : onjon_sh@yahoo.com

@Project Name : Marge Sort
@Version : 1.0.1
@Release Date : 23rd October, 2012
*/ 


// Take Input 
$a = array();
for( $i = 0 ; $i < 100 ; $i++ ) {
    // Input all the random and unique number as Input
    $b = rand( 0 , 99 );
    // Initialize Flag 
    $fl = 0 ;
    
    // Check the number is already in the input array or not
    for( $j = 0 ; $j < sizeof( $a ) ; $j++ ) {
        if( $a[ $j ] == $b ) {
            // If contain same number then start Flag and Stop Execution
            $fl = 1 ;
            break ;
        }
    }    
    
    
    if( $fl == 0 ) {
        $a[] = $b ; // If all values are unique then set value into Input Array 
    }
    else {
        $i-- ; // Else duplicate input last index is clear and Take Input Again 
    }
}
// End Input 


// Main Sorting Start 
// Devide Part 
function doSort( $arr ) {
    $sz = sizeof( $arr ) ;
    if( $sz == 1 ) {
        return $arr ;
    }
    $b = $sz / 2 ; // First half Element 
    settype( $b , "int" ) ; // Type Define as INTEGER
    $c = $sz - $b ; // Second half Element 
    
    // Initialize Array 
    $brr = array() ;
    $crr = array() ;
    // Initialize Array End
    
    // Set Value into the Array
    for( $i = 0 ; $i < $b ; $i++ ) {
        $brr[] = $arr[ $i ] ; // Left Part or First Half 
    }
    
    for( $i = $b ; $i < $sz ; $i++ ) {
        $crr[] = $arr[ $i ] ; // Right Part or Last Half
    }
    // Set Value into the Array End 
    
    $drr = doSort( $brr ) ; // Left Tree 
    $err = doSort( $crr ) ; // Right Tree 
    $mainArr = conqure( $drr , $err );
    return $mainArr ; 
}

// Conqure Part 
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
    // Return Output 
    return $arr ; 
} 
// Main Sorting End 

// Print/Display Data 
$arr = doSort( $a );
// Title 
echo "Divide And Conquere/ Marge Sort<br/>";

// Set Counter for Diplay 10 data in a row
$c = 0 ;
// Loop Output Array 
for( $i = 0 ; $i < sizeof( $arr ) ; $i++ ) {
    // Show Data 
    echo $arr[ $i ] . "&nbsp;&nbsp;&nbsp;" ;
    // Increase Counter 
    $c++ ; 
    // Check if print data is 10 then add Break 
    if( $c % 10 == 0 ) {
        // Add Break 
        echo "<br/>";
    }
}
?>
