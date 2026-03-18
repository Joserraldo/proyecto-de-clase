# Amazon UNAB (Proyecto de Clase)

Aplicación web de comercio electrónico desarrollada con **Laravel** como parte del Taller Básico de Laravel - UNAB. Este proyecto simula las funcionalidades clave y el diseño premium de una plataforma líder B2C/B2B (similar a Amazon), incluyendo catálogo de productos, carrito de compras persistente, panel de administración de inventarios y notificaciones de ofertas en tiempo real.

---

## 🚀 Requisitos Previos

Antes de instalar el proyecto, asegúrate de tener instalado en tu computadora:

* **XAMPP / WAMP / MAMP**: (Se usará para el servidor web Apache y la base de datos MySQL/MariaDB).
* **PHP**: (Versión recomendada 8.2 o superior) - *Normalmente incluido en XAMPP*.
* **Composer**: (Gestor de dependencias de PHP) - Descárgalo desde [getcomposer.org](https://getcomposer.org/).
* **Git**: Para clonar el repositorio.

---

## 🛠️ Instalación y Configuración Paso a Paso

Sigue estas instrucciones detalladas para ejecutar el proyecto en tu entorno local:

### 1. Preparar el Servidor y Base de Datos (XAMPP)
1. Abre el **Panel de Control de XAMPP**.
2. Haz clic en el botón `Start` en las filas de **Apache** y **MySQL**. (Ambos deben iluminarse en verde).
3. Haz clic en el botón `Admin` de la fila de MySQL para abrir **phpMyAdmin** en tu navegador (usualmente en `http://localhost/phpmyadmin`).
4. Ve a la pestaña **Bases de datos**.
5. Crea una nueva base de datos llamada `proyecto_clase` (o el nombre que prefieras). Usa el cotejamiento `utf8mb4_unicode_ci`.

### 2. Clonar el Repositorio
Abre tu terminal (Símbolo del sistema, PowerShell o Git Bash) y navega a la carpeta donde deseas guardar el proyecto (por ejemplo, `htdocs` si usas XAMPP tradicional, o tu carpeta de Documentos). Ejecuta:

```bash
git clone https://github.com/joserraldo/taller-basico-laravel-unab.git
cd taller-basico-laravel-unab
```

### 3. Instalar Dependencias
Ejecuta el siguiente comando para instalar todas las librerías de PHP requeridas por Laravel:

```bash
composer install
```

### 4. Configurar el Entorno (.env)
1. Laravel requiere un archivo de entorno oculto. En la raíz del proyecto, haz una copia del archivo `.env.example` y renómbralo a `.env`. (En Windows puedes hacerlo copiando y pegando el archivo, o ejecutando `copy .env.example .env`).
2. Abre el nuevo archivo `.env` en tu editor de código.
3. Busca la sección de base de datos y configúrala para que apunte a la que creaste en el Paso 1:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proyecto_clase
DB_USERNAME=root
DB_PASSWORD=
```
*(Nota: En XAMPP, el usuario por defecto es `root` y la contraseña suele estar vacía).*

### 5. Generar la Clave de Aplicación
Ejecuta este comando para generar la clave de encriptación de Laravel:

```bash
php artisan key:generate
```

### 6. Migrar y Poblar la Base de Datos
Para crear las tablas necesarias en la base de datos y llenarlas con información de prueba (como el usuario administrador y productos iniciales), ejecuta:

```bash
php artisan migrate:fresh --seed
```

*(Nota: Ejecutar el seeder generará productos de prueba para poblar el catálogo de inmediato).*

### 7. Ejecutar el Servidor Local
Finalmente, levanta el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

La consola te indicará que el servidor está corriendo (normalmente en `http://127.0.0.1:8000`). ¡Abre ese enlace en tu navegador y disfruta de Amazon UNAB!

---

## 👨‍💻 Autor

<div align="left">
  <img src="https://unavatar.io/github/joserraldo" width="100" style="border-radius: 50%;" alt="Foto de José" />
  <p><strong>José</strong> – 2026<br>
  Desarrollo backend UNAB<br>
  GitHub: <a href="https://github.com/joserraldo">@joserraldo</a></p>
</div>
