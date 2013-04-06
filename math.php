<?php
/* FACTORS - DIVISORS (array)
 * Get all divisors of $x
 * if $all==true return the other half
 * Output #1 (default): factors(10) => array(1=>10,2=>5)
 * Output #2 : factors(10,true) => array(1=>10,2=>5,5=>2,10=>1)
 */
function factors($x,$all=false,$onlyCount=false){
	$i=1;
	if (!$onlyCount) $factors=array();
	else $factors=0;
	do {
		$o=$x/$i;
		if ($o==round($o)) {
			if (!$onlyCount) {
				$factors[$i]=$o;
				if ($all) $factors[$o]=$i;
			} else {
				$factors++;
				if ($all) $factors++;
			}
		}
		$i++;
	} while ($i<$o);
	return $factors;
}
//sum all proper divisors (1 included, N excluded) 
function sumFactors($x){
	$i=2;
	$factors=0;
	do {
		$o=$x/$i;
		if ($o==round($o)) {
			$factors+=$i;
			if ($i!=$o) $factors+=$o;
		}
		$i++;
	} while ($i<$o);
	if ($x==2) return 1;
	return ++$factors; //add 1
}
// get the first factor (v2)
// return: array(0,1)
function firstFactor($x){
	$i=2;
	do {
		$o=$x/$i;
		if ($o==round($o)) return array($i,$o);
		$i++;
	} while ($i<$o);
	return false;
}
/* LCD: LOWEST COMMON DIVISOR
 * Input: A < B !!!
 */
function lcd($a,$b){
	$i=1;
	while (++$i<=$a) {
		if (($a%$i==0)&&($b%$i==0)) return $i;
	}
	return false;
}
/* LCM: LOWEST COMMON MULTIPLE
 * Input: array() !!!
 */
function lcm($a){
	rsort($a);
	$lcm=1;
	$i=1;
	while (++$i<$a[0]) { //todo:could be better
		$use=false;
		foreach ($a as $k=>$no) if ($no%$i==0) {
			$use=true;
			if ($a[$k]==$i) unset($a[$k]);
			else $a[$k]=$no/$i;
		}
		if ($use) $lcm*=$i;
	}
	foreach ($a as $no) $lcm*=$no;
	return $lcm;
}

/* PRIME FACTORS
 * Needs a prime slieve !!! with primes as keys !!!
 * Will return all primes that factor in the number (and their powers) unless $howMany is set over 1
 * Will return false is $howMany is set and prime factors differ from $howMany (except value 1)
 * - using this with a prime number will just waste time
 */
function primeFactors($x,&$primeList,$howMany=0) {
	$result=array();
	foreach ($primeList as $p=>$no) {
		if ($p>$x) break;
		$o=$x/$p;
		if ($o==round($o)) {
			if (isset($primeList[$o])) {
				$result[$o]=1;
				if ($o!=$p) $result[$p]=1;
				else $result[$o]=2;
				break;
			}
			if (($howMany>1)&&((count($result)+1)>$howMany)) return false;
			$result[$p]=0;
			while ($o==round($o)) {
				$result[$p]++;
				$o=$o/$p; // ceil/temp_var/if_break/etc. ? for large numbers
			}
			$x=$o*$p;
		}
	}
	$c=count($result);
	if (($howMany>1)&&($c!=$howMany)) return false;
	return $result;
}

/* PRIMES
 * Output: array() | eg. prime=>Nth (2=>1,3=>2,5=>3,7=>4,11=>5,13=>6,17=>7,19=>8...)
 */
function primes($max){
	$primes=array();
	$primes[2]=1;
	for ($i=3;$i<=$max;$i+=2) $primes[$i]=1;
	$c=1;
	foreach ($primes as $prime=>$v) {
		if (!empty($primes[$prime])) {
			$primes[$prime]=$c++;
			for ($i=2;($i*$prime)<=$max;$i++) unset($primes[($i*$prime)]);
		}
	}
	return $primes;
}

/* IS PRIME
 * Output: bool (true/false)
 */
function is_prime($x){
	$i=2;
	do {
		$o=$x/$i;
		if ($o==round($o)) return false;
		$i++;
	} while ($i<$o);
	return true;
}

/* UN-POWER 
 * Default:   Return lowest base at highest power
 * Backwards: Return highest base -at least squared-
 * Fallback:  Return the number itself at power 1
 * eg. unpow(1024) => array(2,10)
 * eg. unpow(1024,true) => array(32,2)
 */
function unpow($n,$backwards=false){
	//could have been used log() for this [REQ: test which is faster]
	if ($backwards) $j=floor(sqrt($n));else $j=2;
	while (
			(
				(
					!$backwards
				) && (
					$j<=sqrt($n)
				)
			) || (
				($backwards) && ($j>1)
			)
		) {
		$e=2;
		do {
			$new=pow($j,$e);
			if ($new==$n) return array($j,$e);
			$e++;
		} while ($new<=$n);
		if ($backwards) $j--;else $j++;
	}
	return array($n,1);
}

/* BC FACTORIAL
 * n! = n * (n-1) * (n-2) .. 1 [eg. 5! = 5 * 4 * 3 * 2 * 1 = 120]
 */
function bcfact($n){
	$factorial=$n;
	while (--$n>1) $factorial=bcmul($factorial,$n);
	return $factorial;
}


/* SIGMA - SUM (int)
 * Sum all numbers 1...$n
 * Output : sigma(10) => 55
 * Output : sigma(100) => 5050
 */
function sigma($n){ return ($n*($n+1))/2; }
// BC SIGMA big numbers
function bcsigma($n){ return bcdiv(bcmul($n,bcadd($n,1)),2); }

/* SIGMA^2 - SUM^2 (int)
 * Sum all numbers 1^2...$n^2
 * Output : sigma2(4) => 30
 * Output : sigma2(10) => 385
 */
function sigma2($n){ return ($n*($n+1)*((2*$n)+1))/6; }
// BC SIGMA^2 big numbers
function bcsigma2($n){ return bcdiv(bcmul(bcmul($n,bcadd($n,1)),bcadd(bcmul($n,2),1)),6); }

/* GRADED 
 * Find out individual grade posibilities when graded by $no Prof.s
 * $grade (float); grades (int) base10! range 1..10 !
 */
function graded($grade,$no,$min=1,$max=10){
	$a=array_fill(0,$no,$min);
	$ret=array();
	while (true) {
		$exit=0;$sum=0;
		foreach ($a as $g) {
			if ($g==$max) $exit++;
			$sum+=$g;
		}
		$tgr=$sum/$no;
		if (round($tgr,1)==round($grade,1)) {
			print implode(' ',$a)."\t".round($tgr,4)."\n"; //output 
		}
		if ($exit==$no) break;
		$a=inc_uniq($a,11);
	}
}

/* Kaprekar 
 * Input: (string) !!!!
 * Unknown effects for sting length other than 3 or 4 !!! MIGHT LOOP 4ever
*/
function kaprekar($x,$c=0){
	for ($i=0;$i<strlen($x);$i++) $n[]=$x[$i];
	$r=$n;
	rsort($r);$r=implode('',$r);
	sort($n);$n=implode('',$n);
	$k=$r-$n;
	$k=str_pad($k,strlen($x),'0',STR_PAD_LEFT);
	if (($k==0)||($k==$x)) return $k.'-'.$c;
	else {
		$c++;
		return kaprekar($k,$c);
	}
}
/* Kaprekar BASE b = 6t+3, t>1 (15,21...) (constant length will be 5)
 * Input: (array) !!!!
 * Output: (int) number of stages to get to the constant
 * Unknown effects for Base != ^above^ !!! MIGHT LOOP 4ever
*/
function kaprekarB($x,$base,$c=0,$orig=array()){
	$n=$x;
	if ($c==0) $orig=$x;
	$r=$x;
	rsort($r);
	sort($n);
	$k=sub($r,$n,$base);
	if (($k==array(0,0,0,0,0))||($k==$x)) return $c;//array_merge($k,(array)$c); //also show Kap. const
	else {
		$c++;
		return kaprekarB($k,$base,$c,$orig);
	}
}

/* Collatz Sequence
 * Return NEXT Collatz number in Sequence !
 * Input: (string/int)
*/
function Collatz($n){ return (bcmod($n,2)==0)?bcdiv($n,2):bcadd(bcmul($n,3),1); }

/* ADD a+b (in base $base)
 * Input: $a, $b (array) !!! A>B !
 * Output: (array) !!!
 */
function add($a,$b,$base){
	$a=array_reverse($a);
	$b=array_reverse($b);
	$carry=0;
	for ($i=0;$i<count($a);$i++) {
		if ($carry==1) {
			if ($a[$i]==($base-1)) {
				$a[$i]=0;
			} else {
				$a[$i]=$a[$i]+1;
				$carry=0;
			}
		}
		if (($b[$i]+$a[$i])>($base-1)) {
			$a[$i]=($a[$i]+$b[$i])-$base;
			$carry=1;
		} else {
			$a[$i]=$a[$i]+$b[$i];
		}
	}
	//if ($carry==0) 
	return array_reverse($a);
	//else return false;
}

/* SUBSTRACT a-b (in base $base)
 * Input: $a, $b (array) !!! A>B !!!
 * Output: (array) !!!
 */
function sub($a,$b,$base){
	$a=array_reverse($a);
	$b=array_reverse($b);
	$carry=0;
	for ($i=0;$i<count($a);$i++) {
		if ($carry==1) {
			if ($a[$i]==0) $a[$i]=$base-1;
			else {
				$a[$i]=$a[$i]-1;
				$carry=0;
			}
		}
		if (isset($b[$i])) {
			if ($b[$i]>$a[$i]) {
				$a[$i]=($a[$i]+$base)-$b[$i];
				$carry=1;
			} else $a[$i]=$a[$i]-$b[$i];
		}
	}
	//if ($carry==0) 
	return array_reverse($a);
	//else return false;
}

/* PERMUTE
 * Return next lexicographic permutation of the array
 */
function permute($array) {
	$r=array(); 
	$r[]=$end=array_pop($array); 
	while (end($array)>$end) $r[]=$end=array_pop($array); //shortening input arr => tail arr
	$end=array_pop($array); //last one remaining needs to change
	sort($r); 
	$i=0;while ($r[$i]<$end) $i++; //while tail (get minimum, greater than last element)
	$array[]=$r[$i]; 
	unset($r[$i]);
	$r[]=$end;
	sort($r); 
	
	/* //auto-stop version
	$r=array_merge($array,$r);
	if ($r!=$a) return $r;
	else return false;
	*/
	
	return array_merge($array,$r);
}

/* INCREASE UNIQUE
 * Make unique sets for given $base
 */
function inc_uniq($a,$base,$autoExpand=false){
	if (($autoExpand)&&(end($a)==($base-1))) {
		foreach ($a as &$v) $v=0;
		$a[0]=1;$a[]=0;
		return $a;
	}
	if ($a[0]==($base-1)) {
		for ($i=0;$i<count($a);$i++) {
			if ($a[$i]<($base-1)) {
				for ($j=0;$j<=$i;$j++) $a[$j]=$a[$i]+1;
				return $a;
			}
		}
	} else $a[0]++;
	return $a;
}

/* STRIP ZEROES (string)
 * Strip leading zeroes
 * Output : strip0('00009') => 9
 */
function strip0($n){
	while (($n[0]=='0')&&(strlen($n)>1)) $n=substr($n,1);
	return $n;
}

/* REPEATING SUB STRING
 * Get the first (shortest) repeating substring
 * Useful with fractions::repeating decimals
 */
function repeatingSubString($s){
	$idx=0;$i=1;
	$half=floor(strlen($s)/2);
	while ($i<$half) {
		$sub=$t=substr($s,$idx,$i);
		//print $sub."\t";
		if (strpos($s,$sub,$idx+1)===false) {
			if ($idx>=$half) break;
			$idx++;$i=0;
			goto end;
		}
		while (strlen($t.$sub)<(strlen($s)-$idx)) $t.=$sub; //todo:improve
		if (strpos($s,$t)!==false) return $sub;
		end: $i++;
	}
	return false;
}

/* SUB STRINGS (array)
 * Get all posible substrings from (string) $s
 * Output : subStrings('1234') => array('1234','123','234','12','23','34','1','2','3','4')
 * Output : subStrings('abc') => array('abc','ab','bc','a','b','c')
 */
function subStrings($s){
	$ss=array($s);
	//return $ss; // DEBUG
	$d=strlen($s);
	$d--;$i=0;
	while ($d>0) {
		if (strlen(substr($s,$i,$d))==$d) {
			$ss[]=substr($s,$i,$d);
			$i++;
		} else { $i=0;$d--; }
	}
	return $ss;
}

/* WORD SCORE
 * score a word (eg. 'Bay'=2+1+25=28)
 */
function wordScore($word){
	$word=strtoupper($word);$score=0;
	for ($i=-1;++$i<strlen($word);) $score+=(ord($word[$i])-64);
	return $score;
}

/* ADD DIGITS 
 * Add up all digits in a number
 */
function addDigits($stringNumber){
	$stringNumber.='';$sum=0;$i=0;$len=strlen($stringNumber);
	do { $sum+=$stringNumber[$i];$i++; } while ($i<$len);
	return $sum;
}

/* SPELL NUMBER
 * Up to 999 in English (translate for more langs)
 */
function spellNumber($number,$separator=' ',$useAND=true){
	$n=array(0=>'zero', 1=>'one', 2=>'two', 3=>'three', 4=>'four', 5=>'five', 6=>'six', 
			7=>'seven', 8=>'eight', 9=>'nine', 10=>'ten', 11=>'eleven', 12=>'twelve', 
			13=>'thirteen', 14=>'fourteen', 15=>'fifteen', 16=>'sixteen', 17=>'seventeen',
			18=>'eighteen', 19=>'nineteen', 20=>'twenty', 30=>'thirty', 40=>'forty', 
			50=>'fifty', 60=>'sixty', 70=>'seventy', 80=>'eighty', 90=>'ninety', 
			100=>'hundred', 1000=>'thousand');
	
	if ($number<21) $ret=$n[$number];
	elseif (strlen($number)==2) {
		$number.='';
		$ret=$n[$number[0]*10];
		if ($number[1]!='0') $ret.=$separator.$n[$number[1]];
	}elseif (strlen($number)==3) {
		$number.='';
		$ret=$n[$number[0]].$separator.$n[100];
		$last2=($number[1]*10)+$number[2];
		if ($last2>0) {
			if ($useAND) $ret.=$separator.'and';
			if ($last2<21) $ret.=$separator.$n[$last2];
			else {
				$ret.=$separator.$n[$number[1]*10];
				if ($number[2]!='0') $ret.=$separator.$n[$number[2]];
			}
		}
	}
	return $ret;
}

/* DIVISOR OF 1 (bool)
 * Dummy function
 * Output : true !!!
 */
function divisor1($n){ return true; }
/* DIVISOR OF 2 (bool)
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
 */
function divisor2($n){
	$last=$n[strlen($n)-1];
	return (($last=='0')||($last=='2')||($last=='4')||($last=='6')||($last=='8'));
}
/* DIVISOR OF 3 (bool)
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it //(Slower)???
 * Input: (string) !!!
 * Output : true/false
 */
function divisor3($n){
	if ((strlen(PHP_INT_MAX)-1)<=strlen($n)) {
		$sum=0;
		for ($i=0;$i<strlen($n);$i++) $sum+=$n[$i];
		$f=$sum/3;
		return ($f==round($f));
	} else {
		$f=$n/3;
		return ($f==round($f));
	}
}
/* DIVISOR OF 4 (bool)
 * Evaluate if very big integer is divisible
 * Fallback on engine math if it can handle it
 * Input: (string) !!!
 * Output : true/false
 */
function divisor4($n){
	if ((strlen(PHP_INT_MAX)-1)<=strlen($n)) {
		$last2=substr($n,-2);
		$f=$last2/4;
		return ($f==round($f));
	} else {
		$f=$n/4;
		return ($f==round($f));
	}
}
/* DIVISOR OF 5 (bool)
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
 */
function divisor5($n){
	$last=$n[strlen($n)-1];
	return (($last=='0')||($last=='5'));
}
/* DIVISOR OF 6 (bool)
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
 */
function divisor6($n){ 
	if ((strlen(PHP_INT_MAX)-1)>strlen($n)) {
		$f=$n/6;
		return ($f==round($f));
	} else return (divisor2($n)&&divisor3($n)); 
}
/* DIVISOR OF 7 (bool)
 * Evaluate if very big integer is divisible
 * Input: (string) !!!
 * Output : true/false
 */
function divisor7($n){
	if ((strlen(PHP_INT_MAX)-1)<=strlen($n)) {
		/*
		Division by 7--Second Method:
		Multiply the last digit by 5 and add it to the number formed by the remaining digits. 
		Repeat this process until you arrive at a smaller number whose divisiblity you know. 
		If this smaller number is divisible by 7, then so is the larger number. 
		If this smaller number is not divisible by 7, then neither is the larger number. 
		For instance, suppose we check the divisibility of 864503 using this technique:
		
		864503, 3x5 = 15 and 86450+15 = 86465
		86465, 5x5 = 25 and 8646+25 = 8671
		8671, 1x5 = 5 and 867+5 = 872
		872, 2x5 = 10 and 87+10 = 97
		
		Since 97 is not divisible by 7, neither is the original number 864503.
		
		Division by 7--Third Method:
		This technique works for large numbers: 
		Take the last three digits of the number and subtract this from the number 
		formed by the remaining digits. Repeat this process until you end up with 
		a number that has at most three digits. 
		At that point you may apply either the first method or the second method. 
		For example, let's check if 3718549877 is divisible by 7:
		
		3718549877, 3718549-877 = 3717672
		3717672, 3717-672 = 3045
		3045, 3-45 = -42
		
		Since -42 is divisible by 7, then 3718549877 is also divisible by 7.
		*/
	} else {
		$f=$n/7;
		return ($f==round($f));
	}
}

/*
Division by 8:
Check the last three digits of the number. If it forms an integer that is divisible by 8, 
then the number is also divisible by 8. For instance, 73540665742 is not divisible by 8 
since 742 is not divisible by 8.

Division by 9:
Add up all of the digits in the number. If the sum of the digits is divisible by 9, 
then so is the number.

Division by 10:
If the last digit is 0, then the number is divisible by 10.

Division by 11:
Alternately add and subtact all of the digits of the number, starting with subtraction on 
the second digit. If the result is 0 or any number divisible by 11, then so is the number.
For example, consider the number 119637360799. If we compute

1-1+9-6+3-7+3-6+0-7+9-9

we get a total of -11. Since -11 is divisible by 11, so is 119637360799.

Division by 12:
Apply the rules for 3 and 4. If the number passes both tests, 
then the number is divisible by 12.

Division by 13--First Method:
Multiply the last digit by 9 and subtact it from the number formed by the remaining digits.
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 13, then so is the larger number. 
If this smaller number is not divisible by 13, then neither is the larger number. 
For example, let's check the divisibility of 399074:

399074, 4x9 = 36 and 39907-36 = 39871
39871, 1x9 = 9 and 3987-9 = 3978
3978, 8x9 = 72 and 397-72 = 325
325, 5x9 = 45 and 32-45 = -13

Since -13 divisible by 13, then 399074 is also divisible by 13.

Division by 13--Second Method:
Multiply the last digit by 4 and add it to the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 13, then so is the larger number. 
If this smaller number is not divisible by 13, then neither is the larger number. 
For example, let's check the divisibility of 399074:

399074, 4x4 = 16 and 39907+16 = 39923
39923, 3x4 = 12 and 3992+12 = 4004
4004, 4x4 = 16 and 400+16 = 416
416, 6x4 = 24 and 41+24 = 65

Since 65 divisible by 13, then 399074 is also divisible by 13.

Division by 13--Third Method:
This is the same technique as for 7: Take the last three digits of the number and 
subtract this from the number formed by the remaining digits. 
Repeat this process until you end up with a number that has at most three digits. 
At that point you may apply either the first method or the second method to check 
if the number is divisible by 13. For example, let's check if 16049371 is divisible by 13:

16049371, 1234-580 = 15678
15678, 15-678 = -663
Now use the second method to check if 663 is divisible by 13:
663, 3x4 = 12 and 66+12 = 78
78, 8x4 = 32 and 7-32 = -26
Since -26 is divisible by 13, then 16049371 is also divisible by 13.

Division by 14:
Apply the rule for 2 and one of the rules for 7. 
If the number passes both divisibility tests, then the number can be divided by 14.

Division by 15:
Apply the rules for 3 and 5. 
If the number passes both tests, then the number is divisible by 15.

Division by 16:
Check the last 4 digits of the number. 
If the last 4 digits form an integer that is divisible by 16, 
then the original number is also divisible by 16. 
For instance, 157675552 can be divided by 16 since 5552 is a multiple of 16.

Division by 17:
Multiply the last digit by 5 and substact it from the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 17, then so is the larger number. 
If this smaller number is not divisible by 17, then neither is the larger number.
For example, let's check the divisibility of 521172:

521172, 2x5 = 10 and 52117-10 = 52107
52107, 7x5 = 35 and 5210-35 = 5175
5175, 5x5 = 25 and 517-25 = 492
492, 2x5 = 10 and 49-10 = 39

Since 39 is not divisible by 17, then neither is 521172.

Division by 18:
Apply the rules for 2 and 9. If the number passes both tests, it is divisible by 18.

Division by 19:
Multiply the last digit by 2 and add it to the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 19, then so is the larger number. 
If this smaller number is not divisible by 19, then neither is the larger number. 
For example, let's check the divisibility of 12483:

12483, 3x2 = 6 and 1248+6 = 1254
1254, 4x2 = 8 and 125+8 = 133
133, 3x2 = 6 and 13+6 = 19

Since 19 is divisible by 19, then so is 12483.

Division by 20:
Apply the rules for 4 and 5. If the number passes both tests, it is divisible by 20.

Division by 21:
Apply the rule for 3 and one of the rules for 7. 
If the number passes both tests, it is divisible by 21.

Division by 22:
Apply the divisiblility tests for 2 and 11. 
If the number meets both conditions, it is divisible by 22.

Division by 23:
Multiply the last digit by 7 and add it to the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 23, then so is the larger number. 
If this smaller number is not divisible by 23, then neither is the larger number. 
For example, let's check the divisibility of 53682:

53682, 2x7 = 14 and 5368+14 = 5382
5382, 2x7 = 14 and 538+14 = 552
552, 2x7 = 14 and 55+14 = 69
69, 9x7 = 63 and 6+63 = 69

Since 69 is divisible by 23, 53682 is also divisible by 23.
 
Division by 24:
Apply the tests for 3 and 8. If the number passes both tests, 
then the number is a multiple of 24.

Division by 25:
If the last two digits are 00, 25, 50, or 75, then the number can be divided by 25.

Division by 26:
Apply the rule for 2 and one of the rules for 13. 
If the number passes both tests, it is divisible by 26.

Division by 27:
Multiply the last digit by 8 and subtract it from the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 27, then so is the larger number. 
If this smaller number is not divisible by 27, then neither is the larger number. 
For example, let's check the divisibility of 10962:

10962, 2x8 = 16 and 1096-16 = 1080
1080, 0x8 = 0 and 108-0 = 108
108, 8x8 = 64 and 10-64 = -54

Since -54 is divisible by 27, 10962 is also divisible by 27.

Division by 28:
Apply the rule for 4 and one of the rules for 7. If the number passes both tests, 
it is divisible by 28.

Division by 29:
Multiply the last digit by 3 and add it to the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 29, then so is the larger number. 
If this smaller number is not divisible by 29, then neither is the larger number. 
For example, let's check the divisibility of 24273:

24273, 3x3 = 9 and 2427+9 = 2436
2436, 6x3 = 18 and 243+18 = 261
261, 1x3 = 3 and 26+3 = 29

Since 29 is divisible by 29, then 24273 is as well.

Division by 30:
Apply the rules for 2, 3, and 5. If the number passes all three tests, 
then it is divisible by 30.

Division by 31:
Multiply the last digit by 3 and subtract it from the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 31, then so is the larger number. 
If this smaller number is not divisible by 31, then neither is the larger number. 
For example, let's check the divisibility of 504273:

504273, 3x3 = 9 and 50427-9 = 50418
50418, 8x3 = 24 and 5041-24 = 5017
5017, 7x3 = 21 and 501-21 = 480
480, 0x3 = 0 and 48-0 = 48
Since 48 is not divisible by 31, then neither is 504273.

Division by 32:
Check the last 5 digits of the number. 
If the last 5 digits form an integer that is divisible by 32, 
then the original number is also divisible by 32. 
For instance, 31999968 is divisible by 32 since 99968 is a multiple of 32.

Division by 33:
Apply the rule for 3 and one of the rules for 11. 
If the number passes both tests, it is divisible by 33.

Division by 34:
Apply the rule for 2 and one of the rules for 17. 
If the number passes both tests, it is divisible by 34.

Division by 35:
Apply the rules for 5 and 7. If the number passes both tests, it is divisible by 35.

Division by 36:
Apply the rules for 4 and 9. If the number passes both tests, it is divisible by 36.

Division by 37
Take the last three digits of the number and add this to the number formed by 
the remaining digits. Repeat this process until you end up with a number that has 
at most three digits. If the remaining number is divisible by 37, then so is the larger 
number. For example, let's test the divisibility of 361975218:

361975218, 361975+218 = 362193
362193, 362+193 = 555
Since 555 is divisible by 37, then 361975218 is also divisible by 37.

Division by 38:
Apply the rules for 2 and 19. If the number passes both tests, it is divisible by 38.

Division by 39:
Apply the rule for 3 and one of the rules for 13. 
If the number passes both tests, it is divisible by 39.

Division by 40:
Apply the rules for 5 and 8. If the number passes both tests, it is divisible by 40.

Division by 41:
Multiply the last digit by 4 and subtract it from the number formed by the remaining digits. 
Repeat this process until you arrive at a smaller number whose divisiblity you know. 
If this smaller number is divisible by 41, then so is the larger number.
If this smaller number is not divisible by 41, then neither is the larger number. 
For example, let's check the divisibility of 142311:

142311, 1x4 = 4 and 14231-4 = 14227
14227, 7x4 = 28 and 1422-28 = 1394
1394, 4x4 = 16 and 139-16 = 123
123, 3x4 = 12 and 12-12 = 0
Since 0 is divisible by 41, then so is 142311.

http://en.wikipedia.org/wiki/Divisibility_rule#Beyond_20 (21..1000)
*/
?>
