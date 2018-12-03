![](https://img.shields.io/badge/version-develop%200.0.3-green.svg)

    In this version
    - Add character case

**Universal Transmission of Variables** - 
mini library which have make to possible transmission of variables in different order to function with saving of the default values of variables.

### Instalation
 `$ git clone https://github.com/StanislavBaranuk/UToV.git`

### Using
- Install project
- Plug in abstract or object class dependent at yor abilities
    - `require_once "UToV/utov/index.php";` connect "UToV" default version
    - `require_once "UToV/utov.min/index.php";` connect "UToV" minimized version
- Use without object creation by `UtovA::run([],[],int,boolean)`
- Use with object creation by `$object = new UtovB(); $object->run([],[]int,boolean)`


### Configuration

> `run([default],[input],logger, reg)`

- `default` : [ASSOCIATIVE ARRAY]() : set default values here
- `input` : [ASSOCIATIVE ARRAY]() : set input values here
- `logger` : [INTEGER]() : set logging type 
    - `0` logger off
    - `1` logger will show warnings when will getting non existent variables
    - `2` logger will show error when will getting non existent variables
- `reg` : [INTEGER]() : user will can transfer to function's variables regardless of the registry
    - `true` variables will using looking at their character case
    - `true` variables will using despite at their character case

### Try this `abstract` example in your project
```php
    <?php
        function utov_example ($properties = []) {
            /** default values will :
             * a = 1
             * b = 1
             */
            $properties = UtovA::run(["a" => 1, "b" => 1], $properties);
        
            echo "a : ".$properties["a"]." + b : ".$properties["b"]." = ".($properties["a"] + $properties["b"])."\n";
        }
        
        utov_example(); // a : 1 + b : 1 = 2
        utov_example(["b" => 2]); // a : 1 + b : 2 = 3
        utov_example(["a" => 5, "b" => 2]); // a : 5 + b : 2 = 7
    ?>
```    
### Try this `object` example in your project
```php
    <?php
        function utovo_example ($properties = []) {
            /** default values will :
            * a = 1
            * b = 1
            */
            $ob = new UtovO();
            $properties = $ob->run(["a" => 1, "b" => 1], $properties, 0);
        
            echo "a : ".$properties["a"]." + b : ".$properties["b"]." = ".($properties["a"] + $properties["b"])."\n";
        }
        
        utovo_example(); // a : 1 + b : 1 = 2
        utovo_example(["b" => 2]); // a : 1 + b : 2 = 3
        utovo_example(["a" => 5, "b" => 2]); // a : 5 + b : 2 = 7
    ?>
```   
### Try this for `Logger` test
```php
    <?php
        function utov_logger_example_warning ($properties = []) {
            $properties = UtovA::run(["a" => 1, "b" => 1], $properties, 1);
        }
    
        utov_logger_example_warning(["a" => 2, "ERROR" => 1, "ERROR2" => 5]); 
        // Warning: "ERROR" with value = "1" undefined; "ERROR2" with value = "5" undefined;
        // a : 2 + b : 1 = 3
        
        function utov_logger_example_error ($properties = []) {
                    $properties = UtovA::run(["a" => 1, "b" => 1], $properties, 2);
                }
            
        utov_logger_example_error(["a" => 2, "ERROR" => 1, "ERROR2" => 5]); 
        //Fatal error:  "ERROR" with value = "1" undefined; in <link in your project> on line <number of line>
    
    ?>
```

### Try this for `reg` test
```php
    <?php
        function utov_example ($properties = []) {
            /** default values will :
             * a = 1
             * b = 1
             */
            $properties = UtovA::run(["a" => 1, "b" => 1], $properties, 0, false);
        
            echo "a : ".$properties["a"]." + b : ".$properties["b"]." = ".($properties["a"] + $properties["b"])."\n";
        }
        
        utov_example(); // a : 1 + b : 1 = 2
        utov_example(["a" => 2]); // a : 2 + b : 1 = 3
        utov_example(["A" => 5, "B" => 2]); // a : 5 + b : 2 = 7
    ?>
```
