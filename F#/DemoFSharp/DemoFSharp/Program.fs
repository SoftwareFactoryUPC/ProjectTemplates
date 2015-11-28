//Enteros
let Entero = 20
let Operacion = (Entero / 4 + 5 - 7) * 4
let Cuadrado = Entero * Entero

printfn "%A" Entero
printfn "%A" Operacion
System.Console.WriteLine(Cuadrado)
printfn "\n"

//funciones
let funcion n = n * n
let resultado = funcion 10
System.Console.WriteLine(resultado)

let funcion2 (x:int) = x * x
let resultado2 = funcion2(10 + 5)
System.Console.WriteLine(resultado2)

let funcion3 x =
    if x < 100.0 then
        2.0 * x
    else
        4.0 * x
let resultado3 = funcion3(150.0)
System.Console.WriteLine(resultado3)
printfn "\n"

//booleanos
let boolean = true
let boolean2 = false
let boolean3 = not boolean && (boolean2 || false)
printfn "%A" boolean3
printfn "\n"

//cadenas
let string1 = "Hello"
let string2 = "World"
let string3 = string1 + " " + string2
printfn "%s" string3
let string4 = @"C:\Program Files\"
printfn "%s" string4
printfn "\n"

//listas y tuplas
let enteroYCuadrado = (Entero, Cuadrado)
System.Console.WriteLine(enteroYCuadrado)

let amigos = [ "Diego"; "Pedro"; "Jose"]
System.Console.WriteLine(amigos)

let nuevoAmigo = "Jhonatan" :: amigos
System.Console.WriteLine(nuevoAmigo)

//matrices
let array1 = [| |]
let array2 = [| "hello"; "world"; "and"; "hello"; "world"; "again" |]
let array3 = [| 1 .. 100 |]

//clases
type Vector2D(dx:float, dy:float) =
    let length = sqrt (dx * dx + dy * dy)
    member this.DX = dx
    member this.DY = dy
    member this.Length = length
    member this.Scale(k) = Vector2D(k*this.DX, k*this.DY)

let vector1 = Vector2D(3.0, 4.0)
let vector2 = vector1.Scale(10.0)

printfn "Longitud del vector 1: %.2f       Longitud del vector 2: %.2f" vector1.Length vector2.Length
printfn "\n"

// clase genérica
type StateTracker<'T>(initialElement: 'T) =
    let mutable states = [initialElement]
    member this.UpdateState newState = states <- newState :: states
    member this.History = states
    member this.Current = states.Head

let tracker = StateTracker 10
System.Console.WriteLine(tracker.Current)
tracker.UpdateState 17
System.Console.WriteLine(tracker.Current)
printfn "\n"

//funcion recursiva
let rec factorial (n:int) =
    if n=0 then
        1
    else
        n*factorial(n-1)
let resultadoFactorial = factorial 3
printfn "%A" resultadoFactorial