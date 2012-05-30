--TEST--
Check for Judy size() and count() method when two instances are declared
--SKIPIF--
<?php if (!extension_loaded("judy")) print "skip"; ?>
--FILE--
<?php 
/*
Ref. https://github.com/orieg/php-judy/issues/1
*/

echo "Instantiate first object: \$judy1\n";
$judy1 = new Judy(Judy::STRING_TO_MIXED);
echo "Instantiate second object: \$judy2\n";
$judy2 = new Judy(Judy::STRING_TO_MIXED);

echo "Test Size Zero\n";
echo "\$judy1->size(): ". $judy1->size()."\n";
echo "\$judy2->size(): ". $judy2->size()."\n";

echo "Test Size Consistent\n";
$judy1->offsetSet("foo", "bar");
$judy1->offsetSet("another", "value");

echo "\$judy1->size(): ". $judy1->size()."\n";
echo "\$judy2->size(): ". $judy2->size()."\n";

echo "Test Size Sum\n";
$judy2->offsetSet("third", "..");
echo "\$judy1->size(): ". $judy1->size()."\n";
echo "\$judy2->size(): ". $judy2->size()."\n";

unset($judy1);
unset($judy2);

?>
--EXPECT--
Instantiate first object: $judy1
Instantiate first object: $judy2
Test Size Zero
$judy1->size(): 0
$judy2->size(): 0
Test Size Consistent
$judy1->size(): 2
$judy2->size(): 0
Test Size Sum
$judy1->size(): 2
$judy2->size(): 1
