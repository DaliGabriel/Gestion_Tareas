<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">Gestión de Tareas</h1>
<p>Gestión de tareas es una aplicación sencilla en donde puedes agregar, editar y ver las tareas creadas</p>
<h1 align="center">Funcionalidades</h1>
<ul>
<li >Login<br>
<img src="./readmeFiles/login.PNG"alt="Login"/><br>El login esta creado con el paquete de inicio <a href="https://laravel.com/docs/9.x/starter-kits#laravel-breeze" target="_blank">breeze</a>, el cual es proporcionado por <a href="https://laravel.com" target="_blank">laravel.</a><br>
Se le agrego el enlace de "No tienes cuenta?" con el objetivo de permitir una facil creacion de usuario.
</li>
<br>
<li >Registro<br>
<img src="./readmeFiles/registro.PNG"alt="Registro"/>
<br>
El registro esta creado con el paquete de inicio <a href="https://laravel.com/docs/9.x/starter-kits#laravel-breeze" target="_blank">breeze</a>, el cual es proporcionado por <a href="https://laravel.com" target="_blank">laravel.</a> Por lo que unicamente se cambio el logo por defecto al igual que la traduccion de elementos.
</li>
<br>
<li >Recuperar Contraseña<br>
<img src="./readmeFiles/recuperarContraseña.PNG"alt="Recuperar Contraseña"/>
<br>
Para poder usar la recuperacion de contraseña es necesario ingresar las credenciales necesarias en .env para motivos de prueba usamos <a href="https://www.mailgun.com/" target="_blank">Mailgun</a>, seleccionamos la opcion smtp e ingresamos las credenciales.
</li>
<br>
<li >Ver Tareas<br>
<img src="./readmeFiles/verTareas.PNG"alt="Ver Tareas"/>
<br>
Al ingresar tendremos esta vista en la cual podremos ver las tareas que hemos agregado. Tendremos un buscador el cual podremos utilizar para encontrar las tareas de nuestro interes.
</li>
<br>
<li >Crear Tarea<br>
<img src="./readmeFiles/agregarTareas.PNG"alt="Crear Tarea"/>
<br>
Aqui podremos crear las tareas, las cuales tendran un titulo, descripcion, tags, prioridad y fecha de realizacion.
<br>
Si añadimos nuestro servidor smtp y el recipiente seguro(en caso de usar mailgun en la version de prueba), nos llegaria el siguiente correo
<img src="./readmeFiles/correoTarea.PNG"alt="Crear Tarea"/>
</li>
<br>
<li >Editar Tareas<br>
<img src="./readmeFiles/editarTarea.PNG"alt="Editar Tareas"/>
<br>
Tanto en crear tarea como en ver tarea tendremos la opcion de editar la tarea seleccionada tanto como de borrarla.
</li>
<br>
<li >Calendario<br>
<img src="./readmeFiles/calendario.PNG"alt="Editar Tareas"/>
<br>
Tambien tendremos la opcion de ver un calendario, en donde nos marcara con un puntito azul la fecha actual y de color rojo la tarea en la fecha asignada.
</li>
<br>
</ul>
<p>Esto seria todo espero les haya gustado este pequeño proyecto para administrar sus tareas si tienen alguna duda o sugerencia no duden en contactarse conmigo.</p>

<h3>Es necesario crear una base de datos llamada tareas</h3>

<a href="https://gist.github.com/hootlex/da59b91c628a6688ceb1">Como correr laravel local</a>

