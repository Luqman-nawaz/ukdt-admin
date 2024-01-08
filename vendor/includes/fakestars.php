<?php
    function generateStars($inputStars, $totalRatings){

        if($inputStars == 5){
            $stars = array(
                'highest_rating' => 5,
                'lowest_rating' => 5,
                'totalRatings' => $totalRatings,
                'inputStars' => $inputStars,
            );
            return $stars;
        }else if($inputStars >= 4 && $inputStars < 5){
            $stars = array(
                'highest_rating' => 5,
                'lowest_rating' => 3,
                'totalRatings' => $totalRatings,
                'inputStars' => $inputStars,
            );
            return $stars;
        }else if($inputStars < 4 && $inputStars >= 3){
            $stars = array(
                'highest_rating' => 4,
                'lowest_rating' => 3,
                'totalRatings' => $totalRatings,
                'inputStars' => $inputStars,
            );
            return $stars;
        }else if($inputStars < 3){
            $stars = array(
                'highest_rating' => RAND(3,4),
                'lowest_rating' => 1,
                'totalRatings' => $totalRatings,
                'inputStars' => $inputStars,
            );
            return $stars;
        }
    }
?>