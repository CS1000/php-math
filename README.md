php-math
========

Collection of mathematical and math related <b>functions</b>

<h2> FACTORS - DIVISORS (array)</h2>
 * Get all divisors of $x
 * if $all==true return the other half
 * Output #1 (default): factors(10) => array(1=>10,2=>5)
 * Output #2 : factors(10,true) => array(1=>10,2=>5,5=>2,10=>1)
  
<b>function factors($x,$all=false,$onlyCount=false)</b>

//sum all proper divisors (1 included, N excluded) 
<b>function sumFactors($x)</b>

// get the first factor (v2)
// return: array(0,1)
<b>function firstFactor($x)</b>

<h2> LCD: LOWEST COMMON DIVISOR</h2>
 * Input: A < B !!!
  
<b>function lcd($a,$b)</b>

<h2> LCM: LOWEST COMMON MULTIPLE</h2>
 * Input: array() !!!
  
<b>function lcm($a)</b>

<h2> PRIME FACTORS</h2>
 * Needs a prime slieve !!! with primes as keys !!!
 * Will return all primes that factor in the number (and their powers) unless $howMany is set over 1
 * Will return false is $howMany is set and prime factors differ from $howMany (except value 1)
 * - using this with a prime number will just waste time
  
<b>function primeFactors($x,&$primeList,$howMany=0)</b>

<h2> PRIMES</h2>
 * Output: array() | eg. prime=>Nth (2=>1,3=>2,5=>3,7=>4,11=>5,13=>6,17=>7,19=>8...)
  
<b>function primes($max)</b>

<h2> IS PRIME</h2>
 * Output: bool (true/false)
  
<b>function is_prime($x)</b>

<h2> UN-POWER </h2>
 * Default:   Return lowest base at highest power
 * Backwards: Return highest base -at least squared-
 * Fallback:  Return the number itself at power 1
 * eg. unpow(1024) => array(2,10)
 * eg. unpow(1024,true) => array(32,2)
  
<b>function unpow($n,$backwards=false)</b>

<h2> BC FACTORIAL</h2>
 * n! = n * (n-1) * (n-2) .. 1 [eg. 5! = 5 * 4 * 3 * 2 * 1 = 120]
  
<b>function bcfact($n)</b>

<h2> SIGMA - SUM (int)</h2>
 * Sum all numbers 1...$n
 * Output : sigma(10) => 55
 * Output : sigma(100) => 5050
  
<b>function sigma($n)</b>

// BC SIGMA big numbers
<b>function bcsigma($n)</b>

<h2> SIGMA^2 - SUM^2 (int)</h2>
 * Sum all numbers 1^2...$n^2
 * Output : sigma2(4) => 30
 * Output : sigma2(10) => 385
  
<b>function sigma2($n)</b>

// BC SIGMA^2 big numbers
<b>function bcsigma2($n)</b>

<h2> GRADED </h2>
 * Find out individual grade posibilities when graded by $no Prof.s
 * $grade (float); grades (int) base10! range 1..10 !
  
<b>function graded($grade,$no,$min=1,$max=10)</b>

<h2> Kaprekar </h2>
 * Input: (string) !!!!
 * Unknown effects for sting length other than 3 or 4 !!! MIGHT LOOP 4ever
 
<b>function kaprekar($x,$c=0)</b>

<h2> Kaprekar BASE b = 6t+3, t>1 (15,21...) (constant length will be 5)</h2>
 * Input: (array) !!!!
 * Output: (int) number of stages to get to the constant
 * Unknown effects for Base != ^above^ !!! MIGHT LOOP 4ever
 
<b>function kaprekarB($x,$base,$c=0,$orig=array())</b>

<h2> Collatz Sequence</h2>
 * Return NEXT Collatz number in Sequence !
 * Input: (string/int)
 
<b>function Collatz($n)</b>

<h2> ADD a+b (in base $base)</h2>
 * Input: $a, $b (array) !!! A>B !
 * Output: (array) !!!
  
<b>function add($a,$b,$base)</b>

<h2> SUBSTRACT a-b (in base $base)</h2>
 * Input: $a, $b (array) !!! A>B !!!
 * Output: (array) !!!
  
<b>function sub($a,$b,$base)</b>

<h2> PERMUTE</h2>
 * Return next lexicographic permutation of the array
  
<b>function permute($array)</b>

<h2> INCREASE UNIQUE</h2>
 * Make unique sets for given $base
  
<b>function inc_uniq($a,$base,$autoExpand=false)</b>

<h2> STRIP ZEROES (string)</h2>
 * Strip leading zeroes
 * Output : strip0('00009') => 9
  
<b>function strip0($n)</b>

<h2> REPEATING SUB STRING</h2>
 * Get the first (shortest) repeating substring
 * Useful with fractions::repeating decimals
  
<b>function repeatingSubString($s)</b>

<h2> SUB STRINGS (array)</h2>
 * Get all posible substrings from (string) $s
 * Output : subStrings('1234') => array('1234','123','234','12','23','34','1','2','3','4')
 * Output : subStrings('abc') => array('abc','ab','bc','a','b','c')
  
<b>function subStrings($s)</b>

<h2> WORD SCORE</h2>
 * score a word (eg. 'Bay'=2+1+25=28)
  
<b>function wordScore($word)</b>

<h2> ADD DIGITS </h2>
 * Add up all digits in a number
  
<b>function addDigits($stringNumber)</b>

<h2> SPELL NUMBER</h2>
 * Up to 999 in English (translate for more langs)
  
<b>function spellNumber($number,$separator=' ',$useAND=true)</b>

<h2> DIVISOR OF 1 (bool)</h2>
 * Dummy <b>function</b>
 * Output : true !!!
  
<b>function divisor1($n)</b>

<b>function divisor2($n)</b>

<h2> DIVISOR OF 3 (bool)</h2>
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it //(Slower)???
 * Input: (string) !!!
 * Output : true/false
  
<b>function divisor3($n)</b>

<h2> DIVISOR OF 4 (bool)</h2>
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it
 * Input: (string) !!!
 * Output : true/false
  
<b>function divisor4($n)</b>

<h2> DIVISOR OF 5 (bool)</h2>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
  
<b>function divisor5($n)</b>

<h2> DIVISOR OF 6 (bool)</h2>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
  
<b>function divisor6($n)</b>

<h2> DIVISOR OF 7 (bool)</h2>
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
  
<b>function divisor7($n)</b>
