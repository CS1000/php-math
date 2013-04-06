php-math
========

Collection of mathematical and math related <b>functions</b>

<h3> FACTORS - DIVISORS (array)</h3>
 * Get all divisors of $x
 * if $all==true return the other half
 * Output #1 (default): factors(10) => array(1=>10,2=>5)
 * Output #2 : factors(10,true) => array(1=>10,2=>5,5=>2,10=>1)
<b>function factors($x,$all=false,$onlyCount=false)</b>

<h4>sum all proper divisors (1 included, N excluded) </h4><b>function sumFactors($x)</b>

<h4>get the first factor (v2)</h4>
<h4>return: array(0,1)</h4><b>function firstFactor($x)</b>

<h3> LCD: LOWEST COMMON DIVISOR</h3>
 * Input: A < B !!!
<b>function lcd($a,$b)</b>

<h3> LCM: LOWEST COMMON MULTIPLE</h3>
 * Input: array() !!!
<b>function lcm($a)</b>

<h3> PRIME FACTORS</h3>
 * Needs a prime slieve !!! with primes as keys !!!
 * Will return all primes that factor in the number (and their powers) unless $howMany is set over 1
 * Will return false is $howMany is set and prime factors differ from $howMany (except value 1)
 * - using this with a prime number will just waste time
<b>function primeFactors($x,&$primeList,$howMany=0)</b>

<h3> PRIMES</h3>
 * Output: array() | eg. prime=>Nth (2=>1,3=>2,5=>3,7=>4,11=>5,13=>6,17=>7,19=>8...)
<b>function primes($max)</b>

<h3> IS PRIME</h3>
 * Output: bool (true/false)
<b>function is_prime($x)</b>

<h3> UN-POWER </h3>
 * Default:   Return lowest base at highest power
 * Backwards: Return highest base -at least squared-
 * Fallback:  Return the number itself at power 1
 * eg. unpow(1024) => array(2,10)
 * eg. unpow(1024,true) => array(32,2)
<b>function unpow($n,$backwards=false)</b>

<h3> BC FACTORIAL</h3>
 * n! = n * (n-1) * (n-2) .. 1 [eg. 5! = 5 * 4 * 3 * 2 * 1 = 120]
<b>function bcfact($n)</b>

<h3> SIGMA - SUM (int)</h3>
 * Sum all numbers 1...$n
 * Output : sigma(10) => 55
 * Output : sigma(100) => 5050
<b>function sigma($n)</b>

<h4>BC SIGMA big numbers</h4><b>function bcsigma($n)</b>

<h3> SIGMA^2 - SUM^2 (int)</h3>
 * Sum all numbers 1^2...$n^2
 * Output : sigma2(4) => 30
 * Output : sigma2(10) => 385
<b>function sigma2($n)</b>

<h4>BC SIGMA^2 big numbers</h4><b>function bcsigma2($n)</b>

<h3> GRADED </h3>
 * Find out individual grade posibilities when graded by $no Prof.s
 * $grade (float); grades (int) base10! range 1..10 !
<b>function graded($grade,$no,$min=1,$max=10)</b>

<h3> Kaprekar </h3>
 * Input: (string) !!!!
 * Unknown effects for sting length other than 3 or 4 !!! MIGHT LOOP 4ever
<b>function kaprekar($x,$c=0)</b>

<h3> Kaprekar BASE b = 6t+3, t>1 (15,21...) (constant length will be 5)</h3>
 * Input: (array) !!!!
 * Output: (int) number of stages to get to the constant
 * Unknown effects for Base != ^above^ !!! MIGHT LOOP 4ever
<b>function kaprekarB($x,$base,$c=0,$orig=array())</b>

<h3> Collatz Sequence</h3>
 * Return NEXT Collatz number in Sequence !
 * Input: (string/int)
<b>function Collatz($n)</b>

<h3> ADD a+b (in base $base)</h3>
 * Input: $a, $b (array) !!! A>B !
 * Output: (array) !!!
<b>function add($a,$b,$base)</b>

<h3> SUBSTRACT a-b (in base $base)</h3>
 * Input: $a, $b (array) !!! A>B !!!
 * Output: (array) !!!
<b>function sub($a,$b,$base)</b>

<h3> PERMUTE</h3>
 * Return next lexicographic permutation of the array
<b>function permute($array)</b>

<h3> INCREASE UNIQUE</h3>
 * Make unique sets for given $base
<b>function inc_uniq($a,$base,$autoExpand=false)</b>

<h3> STRIP ZEROES (string)</h3>
 * Strip leading zeroes
 * Output : strip0('00009') => 9
<b>function strip0($n)</b>

<h3> REPEATING SUB STRING</h3>
 * Get the first (shortest) repeating substring
 * Useful with fractions::repeating decimals
<b>function repeatingSubString($s)</b>

<h3> SUB STRINGS (array)</h3>
 * Get all posible substrings from (string) $s
 * Output : subStrings('1234') => array('1234','123','234','12','23','34','1','2','3','4')
 * Output : subStrings('abc') => array('abc','ab','bc','a','b','c')
<b>function subStrings($s)</b>

<h3> WORD SCORE</h3>
 * score a word (eg. 'Bay'=2+1+25=28)
<b>function wordScore($word)</b>

<h3> ADD DIGITS </h3>
 * Add up all digits in a number
<b>function addDigits($stringNumber)</b>

<h3> SPELL NUMBER</h3>
 * Up to 999 in English (translate for more langs)
<b>function spellNumber($number,$separator=' ',$useAND=true)</b>

<h3> DIVISOR OF 1 (bool)</h3>
 * Dummy <b>function</b>
 * Output : true !!!
<b>function divisor1($n)</b>
<b>function divisor2($n)</b>

<h3> DIVISOR OF 3 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it //(Slower)???
 * Input: (string) !!!
 * Output : true/false
<b>function divisor3($n)</b>

<h3> DIVISOR OF 4 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it
 * Input: (string) !!!
 * Output : true/false
<b>function divisor4($n)</b>

<h3> DIVISOR OF 5 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
<b>function divisor5($n)</b>

<h3> DIVISOR OF 6 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
<b>function divisor6($n)</b>

<h3> DIVISOR OF 7 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
<b>function divisor7($n)</b>
