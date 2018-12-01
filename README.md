![](https://img.shields.io/badge/version-0.0.1-green.svg)

**Universal Transmission of Variables** - 
mini library which have make to possible transmission of variables in different order to function.

### Instalation
`$ git clone https://github.com/StanislavBaranuk/UToV.git`

### Using
- Install project
- Plug in abstract or object class indepennt at yor abilities
- Use without object creation by `UtovA::run([],[])`
- Use with object creation by `$object = new UtovB; $object->run([],[])`

### Try this in your project

    <?php
        include "./utov.min/index.php";
        
        function utov_example ($properties = []) {
            /** default values will :
             * a = 1
             * b = 1
             */
            $properties = UtovA::run(["a" => 1, "b" => 1], $properties);
        
            echo "a : ".$properties["a"]." + b : ".$properties["b"]." = ".($properties["a"] + $properties["b"])."\n";
        }
        
        utov_example(); // a : 1 + b : 1 = 2
        utov_example(["a" => 2]); // a : 2 + b : 1 = 3
        utov_example(["a" => 5, "b" => 2]); // a : 5 + b : 2 = 7
    ?>
    