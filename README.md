![](https://img.shields.io/badge/version-0.0.1-green.svg)

**Universal Transmission of Variables** - 
mini library which have make to possible transmission of variables in different order to function.

### Instalation
`$ git clone https://github.com/StanislavBaranuk/UToV.git`

### Using
- Install project
- Plug in abstract or object class indepennt at yor abilities
- Use by function `run([],[])`


    <?php
        function your_function ($properties = [] /** "default1" => "value1", ...,  "default..." = "value..." */) {
            echo $properties["default..."];
        }
    ?>
    