php-math
========

Collection of mathematical and math related functions

/* FACTORS - DIVISORS (array)
 * Get all divisors of $x
 * if $all==true return the other half
 * Output #1 (default): factors(10) => array(1=>10,2=>5)
 * Output #2 : factors(10,true) => array(1=>10,2=>5,5=>2,10=>1)
 */
function factors($x,$all=false,$onlyCount=false)

//sum all proper divisors (1 included, N excluded) 
function sumFactors($x)

// get the first factor (v2)
// return: array(0,1)
function firstFactor($x)

/* LCD: LOWEST COMMON DIVISOR
 * Input: A < B !!!
 */
function lcd($a,$b)

/* LCM: LOWEST COMMON MULTIPLE
 * Input: array() !!!
 */
function lcm($a)

/* PRIME FACTORS
 * Needs a prime slieve !!! with primes as keys !!!
 * Will return all primes that factor in the number (and their powers) unless $howMany is set over 1
 * Will return false is $howMany is set and prime factors differ from $howMany (except value 1)
 * - using this with a prime number will just waste time
 */
function primeFactors($x,&$primeList,$howMany=0)

/* PRIMES
 * Output: array() | eg. prime=>Nth (2=>1,3=>2,5=>3,7=>4,11=>5,13=>6,17=>7,19=>8...)
 */
function primes($max)

/* IS PRIME
 * Output: bool (true/false)
 */
function is_prime($x)

/* UN-POWER 
 * Default:   Return lowest base at highest power
 * Backwards: Return highest base -at least squared-
 * Fallback:  Return the number itself at power 1
 * eg. unpow(1024) => array(2,10)
 * eg. unpow(1024,true) => array(32,2)
 */
function unpow($n,$backwards=false)

/* BC FACTORIAL
 * n! = n * (n-1) * (n-2) .. 1 [eg. 5! = 5 * 4 * 3 * 2 * 1 = 120]
 */
function bcfact($n)

/* SIGMA - SUM (int)
 * Sum all numbers 1...$n
 * Output : sigma(10) => 55
 * Output : sigma(100) => 5050
 */
function sigma($n)

// BC SIGMA big numbers
function bcsigma($n)

/* SIGMA^2 - SUM^2 (int)
 * Sum all numbers 1^2...$n^2
 * Output : sigma2(4) => 30
 * Output : sigma2(10) => 385
 */
function sigma2($n)

// BC SIGMA^2 big numbers
function bcsigma2($n)

/* GRADED 
 * Find out individual grade posibilities when graded by $no Prof.s
 * $grade (float); grades (int) base10! range 1..10 !
 */
function graded($grade,$no,$min=1,$max=10)

/* Kaprekar 
 * Input: (string) !!!!
 * Unknown effects for sting length other than 3 or 4 !!! MIGHT LOOP 4ever
*/
function kaprekar($x,$c=0)

/* Kaprekar BASE b = 6t+3, t>1 (15,21...) (constant length will be 5)
 * Input: (array) !!!!
 * Output: (int) number of stages to get to the constant
 * Unknown effects for Base != ^above^ !!! MIGHT LOOP 4ever
*/
function kaprekarB($x,$base,$c=0,$orig=array())

/* Collatz Sequence
 * Return NEXT Collatz number in Sequence !
 * Input: (string/int)
*/
function Collatz($n)

/* ADD a+b (in base $base)
 * Input: $a, $b (array) !!! A>B !
 * Output: (array) !!!
 */
function add($a,$b,$base)

/* SUBSTRACT a-b (in base $base)
 * Input: $a, $b (array) !!! A>B !!!
 * Output: (array) !!!
 */
function sub($a,$b,$base)

/* PERMUTE
 * Return next lexicographic permutation of the array
 */
function permute($array)

/* INCREASE UNIQUE
 * Make unique sets for given $base
 */
function inc_uniq($a,$base,$autoExpand=false)

/* STRIP ZEROES (string)
 * Strip leading zeroes
 * Output : strip0('00009') => 9
 */
function strip0($n)

/* REPEATING SUB STRING
 * Get the first (shortest) repeating substring
 * Useful with fractions::repeating decimals
 */
function repeatingSubString($s)

/* SUB STRINGS (array)
 * Get all posible substrings from (string) $s
 * Output : subStrings('1234') => array('1234','123','234','12','23','34','1','2','3','4')
 * Output : subStrings('abc') => array('abc','ab','bc','a','b','c')
 */
function subStrings($s)

/* WORD SCORE
 * score a word (eg. 'Bay'=2+1+25=28)
 */
function wordScore($word)

/* ADD DIGITS 
 * Add up all digits in a number
 */
function addDigits($stringNumber)

/* SPELL NUMBER
 * Up to 999 in English (translate for more langs)
 */
function spellNumber($number,$separator=' ',$useAND=true)

/* DIVISOR OF 1 (bool)
 * Dummy function
 * Output : true !!!
 */
function divisor1($n)

function divisor2($n)

/* DIVISOR OF 3 (bool)
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it //(Slower)???
 * Input: (string) !!!
 * Output : true/false
 */
function divisor3($n)

/* DIVISOR OF 4 (bool)
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it
 * Input: (string) !!!
 * Output : true/false
 */
function divisor4($n)

/* DIVISOR OF 5 (bool)
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
 */
function divisor5($n)

/* DIVISOR OF 6 (bool)
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
 */
function divisor6($n)

/* DIVISOR OF 7 (bool)
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
 */
function divisor7($n)
