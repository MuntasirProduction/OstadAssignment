<?php
/*
 1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)
*/

function sortArrStrings($first, $second){  
    $firstLength = strlen($first);
    $secondLength = strlen($second);
    
    if($firstLength == $secondLength){
        return 0;
    }

    return $firstLength > $secondLength ? 1 : -1;
}

$strings = [
    "a",
    "aba",
    "a",
    "sadad",
    "asadadadasd",
    "asd",
    "ad",
    "asdad",
    "ad"
];

usort($strings, "sortArrStrings");

print_r($strings);

/*
2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.
*/

function concatTwoString($string1, $string2){

    $string1 = $string1.$string2 . "\n";
    echo $string1;
}

concatTwoString("first", "second");

/*
3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.
*/

function removeHeadTail($arr){
    array_shift($arr);
    array_pop($arr);
    return $arr;
}

print_r(removeHeadTail([
    1,2,4,21,4,21,54,2,56,5,4,2,4,34
]));

/*
4.Write a PHP function to check if a string contains only letters and whitespace.
*/

function checkForLetterAndWhitespace($string){
    $stringLength = strlen($string);

    for($i=0; $i<$stringLength; $i++){
        $asciiValue = ord($string[$i]);
        if(($asciiValue>=65 && $asciiValue<=90) || ($asciiValue>=97 && $asciiValue<=122) || $asciiValue==32){
            continue;
        } else{
            return false;
        }
    }
    return true;
}
$givenString = "abada adfas,df adfasdf ad";
if(checkForLetterAndWhitespace($givenString) == true){
    echo "Ths given string contains only letters and whitepsace\n";
} else{
    
    echo "Ths given string contains something other than letters and whitespace\n";
};

/*
5.Write a PHP function to find the second largest number in an array of numbers.
*/

function findSecondMax($arr){
    $arrayLength = count($arr);
    if($arrayLength<2){
        return "At least two elements are needed two find the second largest in the array\n";
    }
    $max = $arr[0];
    $secondMax = null;

    for($i=1; $i<$arrayLength; $i++){
        if($arr[$i] > $max){
            $secondMax = $max;
            $max = $arr[$i];
        }
    }
    if($secondMax == null){
        return "All elements are equal in the array\n";
    } else{
        return "The second maximum value in the array is: {$secondMax}\n";
    }
}

$arr = [1,4,34,5,2,5,3,6,34,54,6,3];
$arr1 = [2,3,3,3,3,3,3,3,3,3];
$arr2 = [1,1,1,1,1,1,1];
$arr3 = [];
$arr4 = [1];

echo findSecondMax($arr);
echo findSecondMax($arr1);
echo findSecondMax($arr2);
echo findSecondMax($arr3);
echo findSecondMax($arr4);
