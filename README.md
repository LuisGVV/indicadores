Indicadores
===========

1. El proyecto es xAMP, se requiere de PHP 5.5+, ya que hay ciertas instrucciones que tirarán error.
2. La base de datos que utiliza el proyecto hasta este commit es la que se encuentra en el servidor de MySQL de CONARE. No vuelva a ingresar los datos, hasta el momento están cargados los datos para los años 2011, 2012, 2013.
3. Este fue primer proyecto solo, por lo que observará algunos **terrores** y trucos para el HTML

##Bugs a corregir:

- En el BeforeFilter hay que refactorizar el código de forma que al presionar la acción de "atrás" en el explorador el servidor responda con error de autorización.
- Que no se muestren los datos de universidades y los años que hacen falta
- Corregir el tamaño de los gráficos ya que en algunos al querer graficar muchos elementos ya sea para el eje X ó Y el ajuste automático del tamaño del gráfico hace que sólo se vea una línea
- Crear tests para los componentes y los gráficos (existen varios los cuales no recuerdo si tenían posibilidad de tirar error de división entre 0)
- Proteger y validar campos para evitar vulnerabilidad de Cross-site scripting (algo que no sabía de seguridad en el momento que yo empecé a elaborar el sitio)

##Otras tareas:

- Crear un mensaje de error cuando se genera un request de error.
- Ordenar, minificar, el CSS + Javascript y colocarlos donde se deben!
- Agregar un botón o funcionalidad para descargar las imágenes ya que son de interés.


