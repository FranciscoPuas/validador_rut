# Validador de RUT Chileno

Este proyecto proporciona una página web para validar y formatear RUTs chilenos utilizando PHP y Bootstrap. Permite a los usuarios ingresar un RUT, validarlo y ver su formato correcto.

## Requisitos

- PHP 7.0 o superior
- Servidor web (por ejemplo, Apache, Nginx)
- Composer (opcional, para gestión de dependencias)

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/tu_usuario/validador-rut.git
    ```

2. Navega al directorio del proyecto:

    ```bash
    cd validador-rut
    ```

3. Asegúrate de que tu servidor web apunte al directorio del proyecto.

4. (Opcional) Instala las dependencias de Composer:

    ```bash
    composer install
    ```

## Uso

1. Inicia tu servidor web y asegúrate de que el proyecto esté accesible.

2. Abre tu navegador web y navega a la URL donde está alojado el proyecto (por ejemplo, `http://localhost/validador-rut`).

3. Ingresa un RUT en el campo de texto y haz clic en "Validar" para verificar si el RUT es válido o en "Formatear" para obtener el RUT en formato correcto.

## Estructura del Proyecto

El proyecto contiene los siguientes archivos:

- `index.php`: El archivo principal que contiene el formulario y la lógica para validar y formatear el RUT.
- `README.md`: Este archivo, que proporciona información sobre el proyecto.

## Tecnologías Utilizadas

- **PHP**: Utilizado para la lógica del servidor y la validación/formateo del RUT.
- **Bootstrap**: Utilizado para el diseño responsivo y moderno de la página web.
- **HTML/CSS**: Para la estructura y estilo básico de la página.

## Ejemplo de Uso

Al ingresar un RUT como `12.345.678-5` y hacer clic en "Validar", la página te indicará si el RUT es válido o no. Si haces clic en "Formatear", la página mostrará el RUT en formato `12.345.678-5` si es válido.

## Contribución

Las contribuciones son bienvenidas. Si deseas mejorar el proyecto, por favor realiza un fork del repositorio y envía un pull request con tus cambios.
