function saludar2(){
    console.log("Hola desde Javascript")
}
function variables(){
    //1. var: Declara variables las cuales pueden ser redeclaradas
    var edad=20;
    edad = edad +1;
    var edad = 25;
    console.log("var edad = " + edad);
    //2. let: Declara variables pero no se pueden redeclarar
    let precio= 25.5;
    precio=30.5;
    //let precio = 50.99; //no se permite redeclarar
    console.log("let precio = " + precio);
    if(true){
        let precio=50.99;
        console.log("let precio = " + precio);
        //let precio= 50.99; no se puede redeclarar el mismo scope
       } console.log("let precio = " + precio);
       //const: declara constantes (el valor no cambia a excepcion
       //de declaracion de objetos)
       const PI= 3.1416;
       //PI=PI + 1; NO SE PUEDE modificar su valor
       console.log("const PI =" + PI);
       //const en objetos
       const equipos=[
        {"nombre": "Chivas"},
        {"nombre": "Cruz Azul"},
        {"nombre": "Necaxa"},
        {"nombre": "America"}
    ];
  console.log(equipos);
  
  equipos.push({"nombre":"Pumas"})
  equipos.push({"nombre":"Toluca"})
  console.log(equipos);
  let nuevo= prompt("Ingrese el nuevo equipo");
  equipos.push({"nombre": nuevo})
  console.log(equipos);
}