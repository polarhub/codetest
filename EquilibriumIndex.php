<?php

# Put a valid docblock here!
/** 
* This function finds the equilibrium Index in an array
* The equilibrium Index is one where the sum of elements to the left 
* and the sum of elements to the right is equal
* Note that the value of the element at this equilibrium index 
* is NOT added on either side.
* Based on the test case provided, the function returns a 2 element array:
* First element is the equilibrium index, and second element is the count of elements 
* not counting the equilibrium element
* if not equilibrium is found, the function returns an empty array
*/
function getEquilibriums($arr) {
	$output = array();
	# Logic goes here!
	
	// get the number of elements in the array ..
	$ecount = count($arr);
    	if ($ecount <= 2) // we'll return an empty array if there aren't sufficient elements
		return $output;

	// thinking of the two sides - start keeping totals of left and right
	// with two indexes of where each side is - and bring them together
	$lIdx = 0; // start the left side as the first element
	$lTot = $arr[$lIdx];

	$rIdx = $ecount - 1;  // start the right side as the last element
	$rTot = $arr[$rIdx];

	while ($lIdx < ($rIdx - 2)) { 
		// make sure there is an unused element that is potentially the fulcrum ..
		// if the left total is <= right total, add the next available element on the left to the left total
		// and move the left index right towards the equilibrium point if any
        	if ($lTot <= $rTot) {
			$lIdx++;
			$lTot += $arr[$lIdx];
		} else {
		// else if the left total is > right total, 
		// add the next available element on the right to the right total
		// and move the right index towards the equlibrium point if any
			if ($lTot > $rTot) { // redundant if stmt - for readability, remove for performance
				$rIdx--;
				$rTot += $arr[$rIdx];
			}
        	}
    	}
    
    	// we've come to a point where there's only one element bet our two converging indexes
    	// verify that and see if the two sides have the same total
    	if (($lIdx == ($rIdx - 2)) && ($rTot == $lTot)) {
		$output[0] = $lIdx + 1; // if yes, return the element between the two indexes
		$output[1] = $ecount - 1;
	} else { // return an empty array
		return $output; 
	}
}
