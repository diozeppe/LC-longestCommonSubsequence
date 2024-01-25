// Not the best, there is a lot of optmization to be done
class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        $t1Length = strlen($text1);
        $t2Length = strlen($text2);

        $dp = array_fill(0, $t1Length, array_fill(0, $t2Length, 0));

        for($i = $t1Length-1; $i >= 0; $i--){
            for($j = $t2Length-1; $j >= 0; $j--){
                if ($text1[$i] === $text2[$j]) {
                    $dp[$i][$j] = $dp[$i+1][$j+1] + 1;
                } else {
                    $dp[$i][$j] = max([$dp[$i+1][$j], $dp[$i][$j+1]])??0;
                }
            }
        }

        return max($dp[0]);
    }
}
