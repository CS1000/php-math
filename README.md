php-math
========

Collection of mathematical and math related functions

<h3> FACTORS - DIVISORS (array)</h3>
 * Get all divisors of $x
 * if $all==true return the other half
 * Output #1 (default): factors(10) => array(1=>10,2=>5)
 * Output #2 : factors(10,true) => array(1=>10,2=>5,5=>2,10=>1)

<code>function factors($x,$all=false,$onlyCount=false)</code>

<h4>sum all proper divisors (1 included, N excluded) </h4>

<code>function sumFactors($x)</code>

<h4>get the first factor (v2)</h4>
 * return: array(0,1)

<code>function firstFactor($x)</code>

<h3> LCD: LOWEST COMMON DIVISOR</h3>
 * Input: A < B !!!

<code>function lcd($a,$b)</code>

<h3> LCM: LOWEST COMMON MULTIPLE</h3>
 * Input: array() !!!

<code>function lcm($a)</code>

<h3> PRIME FACTORS</h3>
 * Needs a prime slieve !!! with primes as keys !!!
 * Will return all primes that factor in the number (and their powers) unless $howMany is set over 1
 * Will return false is $howMany is set and prime factors differ from $howMany (except value 1)
 * - using this with a prime number will just waste time

<code>function primeFactors($x,&$primeList,$howMany=0)</code>

<h3> PRIMES</h3>
 * Output: array() | eg. prime=>Nth (2=>1,3=>2,5=>3,7=>4,11=>5,13=>6,17=>7,19=>8...)

<code>function primes($max)</code>

<h3> IS PRIME</h3>
 * Output: bool (true/false)

<code>function is_prime($x)</code>

<h3> UN-POWER </h3>
 * Default:   Return lowest base at highest power
 * Backwards: Return highest base -at least squared-
 * Fallback:  Return the number itself at power 1
 * eg. unpow(1024) => array(2,10)
 * eg. unpow(1024,true) => array(32,2)

<code>function unpow($n,$backwards=false)</code>

<h3> BC FACTORIAL</h3>
 * n! = n * (n-1) * (n-2) .. 1 [eg. 5! = 5 * 4 * 3 * 2 * 1 = 120]

<code>function bcfact($n)</code>

<h3> SIGMA - SUM (int)</h3>
 * Sum all numbers 1...$n
 * Output : sigma(10) => 55
 * Output : sigma(100) => 5050

<code>function sigma($n)</code>

<h4>BC SIGMA big numbers</h4>

<code>function bcsigma($n)</code>

<h3> SIGMA^2 - SUM^2 (int)</h3>
 * Sum all numbers 1^2...$n^2
 * Output : sigma2(4) => 30
 * Output : sigma2(10) => 385

<code>function sigma2($n)</code>

<h4>BC SIGMA^2 big numbers</h4>

<code>function bcsigma2($n)</code>

<h3> GRADED </h3>
 * Find out individual grade posibilities when graded by $no Prof.s
 * $grade (float); grades (int) base10! range 1..10 !

<code>function graded($grade,$no,$min=1,$max=10)</code>

<h3> Kaprekar </h3>
 * Input: (string) !!!!
 * Unknown effects for sting length other than 3 or 4 !!! MIGHT LOOP 4ever

<code>function kaprekar($x,$c=0)</code>

<h3> Kaprekar BASE b = 6t+3, t>1 (15,21...) (constant length will be 5)</h3>
 * Input: (array) !!!!
 * Output: (int) number of stages to get to the constant
 * Unknown effects for Base != ^above^ !!! MIGHT LOOP 4ever

<code>function kaprekarB($x,$base,$c=0,$orig=array())</code>

<h3> Collatz Sequence</h3>
 * Return NEXT Collatz number in Sequence !
 * Input: (string/int)

<code>function Collatz($n)</code>

<h3> ADD a+b (in base $base)</h3>
 * Input: $a, $b (array) !!! A>B !
 * Output: (array) !!!

<code>function add($a,$b,$base)</code>

<h3> SUBSTRACT a-b (in base $base)</h3>
 * Input: $a, $b (array) !!! A>B !!!
 * Output: (array) !!!

<code>function sub($a,$b,$base)</code>

<h3> PERMUTE</h3>
 * Return next lexicographic permutation of the array

<code>function permute($array)</code>

<h3> INCREASE UNIQUE</h3>
 * Make unique sets for given $base

<code>function inc_uniq($a,$base,$autoExpand=false)</code>

<h3> STRIP ZEROES (string)</h3>
 * Strip leading zeroes
 * Output : strip0('00009') => 9

<code>function strip0($n)</code>

<h3> REPEATING SUB STRING</h3>
 * Get the first (shortest) repeating substring
 * Useful with fractions::repeating decimals

<code>function repeatingSubString($s)</code>

<h3> SUB STRINGS (array)</h3>
 * Get all posible substrings from (string) $s
 * Output : subStrings('1234') => array('1234','123','234','12','23','34','1','2','3','4')
 * Output : subStrings('abc') => array('abc','ab','bc','a','b','c')

<code>function subStrings($s)</code>

<h3> WORD SCORE</h3>
 * score a word (eg. 'Bay'=2+1+25=28)

<code>function wordScore($word)</code>

<h3> ADD DIGITS </h3>
 * Add up all digits in a number

<code>function addDigits($stringNumber)</code>

<h3> SPELL NUMBER</h3>
 * Up to 999 in English (translate for more langs)

<code>function spellNumber($number,$separator=' ',$useAND=true)</code>

<h3> DIVISOR OF 1 (bool)</h3>
 * Dummy 
<code>function</code>
 * Output : true !!!

<code>function divisor1($n)</code>

<code>function divisor2($n)</code>

<h3> DIVISOR OF 3 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it //(Slower)???
 * Input: (string) !!!
 * Output : true/false

<code>function divisor3($n)</code>

<h3> DIVISOR OF 4 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it
 * Input: (string) !!!
 * Output : true/false

<code>function divisor4($n)</code>

<h3> DIVISOR OF 5 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false

<code>function divisor5($n)</code>

<h3> DIVISOR OF 6 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false

<code>function divisor6($n)</code>

<h3> DIVISOR OF 7 (bool)</h3>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false

<code>function divisor7($n)</code>
