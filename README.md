# store
Sistema de Ventas en PHP

El sistema de Ventas esta en lengaje de programación con PHP POO mediante la metodologia PDO.

La inerface sera con Bootstrap.

La funcionalidad sera con el uso de las tecnologas jQuery, Node.js.

Los paquetes de node.js se llevan con npm.


Procesos:

01. Instalación y configuración
02. Contrucción de la BD 
03. Estructura y Conexión PDO
04. Tlabla Usuarios
05. Procedimientos para registrar
06. Archivo .htaccess
07. Creando el Routing System
09. Ruteo de controlador y metodo
10. Retornando vistas
11. Pasando datos del controlador a la Vista
12. Getters y Setters Magicos
13. Creando ORM
13.1 Creando ORM Continuación
14. ORM Método where()
15. ORM Metodo find()
16. ORM Método all()
17. ORM Método eliminar()
18. ORM registrar() y listar() ventas con procedimientos almacenados
	Se concluye la parte del ORM, Routting System, los modelos.
19. Descargando dashboard
	Inica el diseño y BackEnd con interfaz del sistema
	Login. - Plantillas de intranets.
	Bootstrap Ver. White, and Black desde:
		startbootstrap.com/template-categories/admin-dashboard/
20. Instalando Dashboard de Bootstrap
	bower_components cambia a data 
	Font Awsome: http://fontawesome.io/
		http://fontawesome.io/get-started/
			se vincula de la siguiente manera:
			<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
21. Diseño de la vista principal
22. Diseño del formulario de login
	Vincular el formulario con la aplicación
23. Programación del login
24. Validación csrf para formularios
	validacion CSRF, url: https://www.funcion13.com/preven-falsificacion-peticion-sitios-cruzados-csrf/
25. Complementando Login	
	Libreria de validación url: https://github.com/colosa/processmaker/blob/master/gulliver/system/class.inputfilter.php 
26. Sesiones y accesos con el Login 
27. Implementando clase Redirecciona
28. Implementando clase Session
29. Mostrando mensaje al Redireccionar	
30. Instalación y configuración del sistemas
31. Instalar el panel de administración
	Inicio url: http://localhost/dev/store/assets/temporal-web-page/pages/panels-wells.html
32. Personalizando Panel de Administración
33. Listado de Usuarios en el panel de administración
34. Registrar Usuarios
35. Actualizar Usuarios
36. Eliminar un Usuario
	Uso de Plugin url: https://craftpip.github.io/jquery-confirm/
37. Listar Productos
38. Mantenimiento completo de productos
	a) Crear boton nuevo
	b) Crear metodo en el controlador del producto
	c) Se crea la vista de nuevo producto
		- de admin.usuario.crear -> nuevo-producto (Formulario)
		- Se agregan los metodos en el controlador de productos (nuevo, editar, guardar, eliminar)
		- Se modifica la vista o el formulario de la vista (nuevo)
	d) Test Modelo-Vista-Controlador
39.Registrar una venta
40. Generando estructura para agregar productos con AJAX
	Angular JS url: https://angularjs.org
41. Creando AJAX con AngularJS
42. Mostrando modal con productos   AJAX   
	JavaScript  url: http://getbootstrap.com/
43. Agregando productos Angularjs 
44. Evitando productos duplicados y obteniendo total 
45. Registro de detalles de ventas
46. Eliminar productos de la venta
47. Correcciones de CSRF e INPUT FILTER