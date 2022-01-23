<?php
$var=1;
$var1="hello";
echo $var1."<br>";
var_dump($var1)."<br>";
printf($var1)."<br>";
print_r($var1)."<br>";

//data type
//string
//integer
//float
//double
//boolean
//array
//object
//null
$string="Hello";
$integer=1;
$float=1.5;
$boolean=true;
$array=['name'=>'hlaing','age'=>'20'];
$array=['hlaing','20'];
echo $string."<br>";
echo $integer."<br>";
echo $boolean."<br>";
print_r($array)."<br>";

print_r($array[0]);
var_dump($array)."<br>";
echo "<br>";
//object
$object=new stdClass();
print_r($object);
echo "<br>";
$object->name='May';
var_dump($object->name);
echo "<br>";

//change array to object
$array=["name"=>"May",'age'=>'20'];
$objArray=(object) $array;
print_r($objArray);


//operation(+,-,*,%./,)
$var1=1;
$var2=2;
echo $var1+$var2."<br>";
echo $var1-$var2."<br>";
echo $var1*$var2."<br>";
echo $var1/$var2."<br>";
echo $var1%$var2."<br>";

//operators(<,>,==,<=,>=,===,!=,<>)

//= assign variable,set variable

// == check content, not data type
//=== check content & data type
//<> , != not equal
//>,<,>=,<=
//&& must
// || or

$var = 'hello';
if ('hello' == 'something') {
    echo 'same<br>';
} else {
    echo 'different<br>';
}
if (111 !== '111') {
    echo 'different<br>';
} else {
    echo 'same<br>';
}

//conditional statement
//if,else,elseif,

$var1=1;
$var2=2;

if ($var1>$var2) {
    echo  "greater<br>";
} else {
    echo "lesser<br>";
}
if ($var1==$var2) {
    echo  "same<br>";
} elseif ($var1>$var2) {
    echo "greater<br>";
} else {
    echo "different<br>";
}

switch ($var1) {
    case '1':
        echo '1';
        break;
    case '2':
        echo '2';
        break;
    case '3':
        echo '3';
        break;
    default: "this is default<br>";
        break;

    }
//looping
//forloop
for ($i=0; $i < 5; $i++) {
    echo "This is loop<br>".$i;
    $i=$i+1;
}

//while
$a=0;
echo "This is while loop<br>";
while ($a <= 10) {
    echo $a;
    $a++;
}

//dowhile loop
$a=0;
echo "This is do while loop<br>";
do {
    echo $a;
    if ($a == 5) {
        break;
    }
    $a++;
} while ($a <= 10);

//foreach loop

$arrayForEach=['name'=>"May","age"=>'30'];
echo "This is for each loop";
foreach ($arrayForEach  as $key => $value) {
    echo " $ key is =>".$key.' and $value is =>'. $value. "<br>";
}
foreach ($arrayForEach  as $value) {
    echo '$value is =>'. $value. "<br>";
}
echo "<br>";
//numeric array
$array=['val1','val2','val3'];
print_r($array);
echo "<br>";
//associated array
$array=array('name'=>'May Thazin Htun','age'=>'20','phone'=>'0983783939');
print_r($array);
echo "<br>";
//multidiemntional array
$array=array(
    "name" => array('student1' => "Mg Mg", 'student2' => "Hla Hla", 'student 3' => 'Aye Aye'),
    "age" => array('Mg Mg' => '20', 'Hla Hla' => '21', 'Aye Aye' => '30'),);

    print "<pre>";
    print_r($array);
    print_r($array['name']['student1']);
    print_r($array['age']['Mg Mg']);
//function
echo "<br>";
function getName($name)
{
    echo "my name is $name .";
}

getName("May");

//super golbal variable

//$_POSt
//$_Get
//$_SESSION
//$_COOKIE
//$_SERVER
echo "<br>";
setcookie('name', 'Mya', time()+60, '/');
print_r($_COOKIE);
print_r($_COOKIE['name']);
echo "<br>";
//session
$_SESSION['key1']='value1';
$_SESSION['key2']='value1';
print_r($_SESSION['key1']);

//file operation
$file = fopen("text.txt", "r");
echo file_get_contents("text.txt");
$file2 = fopen("text.txt", "w");
fwrite($file2, "Hello world from file opeartion code");//sudo chmod -R 777 text.txt
fclose($file2);
echo file_get_contents("text.txt");
