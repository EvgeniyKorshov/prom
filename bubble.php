<?php
$time_start = microtime(true);
// PHP program for implementation
// of Bubble Sort

function bubbleSort(&$arr)
{
	$n = sizeof($arr);

	// Traverse through all array elements
	for($i = 0; $i < $n; $i++)
	{
		// Last i elements are already in place
		for ($j = 0; $j < $n - $i - 1; $j++)
		{
			// traverse the array from 0 to n-i-1
			// Swap if the element found is greater
			// than the next element
			if ($arr[$j] > $arr[$j+1])
			{
				$t = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $t;
			}
		}
	}
}

// Driver code to test above
for($i=1;$i<10000;$i++)
    {
    $arr[] = $i;
    }
    $arr[] = shuffle($arr);

$len = sizeof($arr);
bubbleSort($arr);

//echo "Sorted array : \n";

//for ($i = 0; $i < $len; $i++)
	//echo $arr[$i]." ";

// This code is contributed by ChitraNayal.
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Ничего не делал $time секунд\n";
//Ничего не делал 0.032112121582031 секунд
?>
