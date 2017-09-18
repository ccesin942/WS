# WS
prueba conexion web service SAT

Aquí te dejo la información necesaria para el análisis.

Video explicativo

Publicacion del Gobierno donde detalla las modificaciones a realizar sobre la Facturacion Electronica:

http://www.sat.gob.mx/informacion_fiscal/factura_electronica/Paginas/Anexo_20_version3.3.aspx

mas información importante:

https://www.forbes.com.mx/paso-paso-facturar-la-nueva-version/

http://www.sat.gob.mx/informacion_fiscal/factura_electronica/Paginas/CFDI_Factura.aspx

Ejemplo de elaboración de una factura del sector empresarial:
http://www.sat.gob.mx/informacion_fiscal/factura_electronica/Documents/cfdi/Ejemplos%20de%20facturas%2033/ejemplo_activ_empresarial.pdf

Requisitos que deben cumplir las facturas:
http://www.sat.gob.mx/informacion_fiscal/factura_electronica/Paginas/requisitos_factura_electronica_cfdi.aspx

Link y ejemplo del txt que me hacen llegar de sicofi para actualizar el WS para la emisión de las nuevas facturas por imposición del SAT.

https://cfd.sicofi.com.mx/SicofiWS33/Digifact.asmx

Ejemplos de modelo 3.3:

https://www.youtube.com/watch?v=gFBWFHZ3B3w

http://www.sat.gob.mx/informacion_fiscal/factura_electronica/Documents/cfdi/Ejemplos%20de%20facturas%2033/Eje_Arrenda_Casa.pdf

https://contadormx.com/2017/05/31/ejemplo-del-cfdi-version-3-3-nuevos-cambios-del-anexo-20/

Datos de acceso al servidor donde debe desarrollarse el sistema:
ssh: ec2-54-80-39-183.compute-1.amazonaws.com
user: blac
pass: bl@c123

Git repo:
blac@ec2-54-80-39-183.compute-1.amazonaws.com:/var/www/auxiliarBlac
Pass: bl@c123

http://54.80.39.183/auxiliarBlac
user: soportetecnico@blacsol.com
pass: sop15tec3

------------------------------- Actualización -------------------------
Datos de autenticación del web service: 
- url demo: https://demo.sicofi.com.mx/SicofiWS33/Digifact.asmx
- url productiva: https://cfd.sicofi.com.mx/SicofiWS33/Digifact.asmx
- email: ws@carsystem.mx
- pass: Ws5n6(asterisco)cwq(asterisco)1

También se puede acceder directamente al sitio que ofrece el servicio sin tener que hacerlo desde el web service, con los mismos datos. Más que todo para pruebas.

url: http://www.sicofi.com.mx
P.D.: No hagas pruebas con ningún cliente existente, ni productos ni nada, voy a reunirme con el cliente, crearemos uno, lo probaremos y ese será usado


---------------------------------------- NUEVA ACTUALIZACIÓN ---------------

Vídeo explicativo de como generar una factura con el cliente de pruebas que se usará: https://youtu.be/9hj5ov3afnk

FIN ACTUALIZACIÓN ---------------------

SUPER IMPORTANTE
es necesario que todo lo que hagas, lo vayas documentando aparte, ya que al final me debes pasar una guía de instalación/deploy, porque yo soy el que administra el servidor de producción y no se hace por git ni nada. Por tanto, debo subir los archivos necesarios o lineas de código necesarias o correr los query sql necesarios.

Revisa sin clonar (aún no configuro git para este sistema, está ubicado en /var/www/auxiliarBlac necesitas acceso root cuya clave es la misma (con sudo). La modificación es en la facturación, cualquier opción de facturación dentro del sistema, conecta a un webservice

P.D.: Seleccionar un sólo cliente y facturar en base a ese cliente no más (al cliente cambiar el correo para uno propio de manera de recibir ahí las facturas).

Calcula el tiempo que te llevará. 

Todo el trabajo debes ir documentando su instalación, ya que la final debo pasarlo a producción, y eso es, poner cada archivo nuevo o con codigo nuevo o líneas de código nuevas donde deben ir, cualquier nuevo campo o tabla en la Base de Datos, etc., con sumo detalle y cuidado.



Es importante trabajar con git-flow ya que yo estoy trabajando en otros proyectos dentro del mismo repositorio.

----------------------------------------------------------------------
Sobre cómo funciona el sistema en esencia para poder trabajarlo:

0.- DocuAuxiliarBlac (1).odt (Adjunto).

1.- https://www.youtube.com/watch?v=13gybIkC9wc

2.- https://www.youtube.com/watch?v=ostpsXJ2sAI

3.- https://www.youtube.com/watch?v=4KKfSSTPjpU

