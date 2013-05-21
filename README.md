del-csv
=======

PHP Static Class which converts a CSV file to an Array Object

Usage:

Del_Csv::toArray($filename,$array_object = true);

You must supply a filename. Throws an Exception on not finding the file.
If you pass true(default second param, you don't need to) then it will return an ArrayObject
If you pass false then a plain PHP array will be returned
