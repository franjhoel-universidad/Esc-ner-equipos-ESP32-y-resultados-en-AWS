# Escáner de Equipos Electrónicos con ESP32 y Resultados en AWS

## Descripción

Este proyecto implementa un escáner de equipos electrónicos utilizando un dispositivo ESP32 para detectar redes WiFi y dispositivos Bluetooth Low Energy (BLE) en tiempo real. Los datos recopilados se procesan y almacenan en la nube utilizando servicios de Amazon Web Services (AWS), permitiendo un monitoreo remoto y escalable de dispositivos electrónicos en entornos públicos o privados.

El sistema combina hardware embebido con una arquitectura en la nube para proporcionar una solución completa de escaneo y visualización de datos inalámbricos.

## Características

- **Escaneo de WiFi**: Detección automática de redes WiFi disponibles, capturando SSID, BSSID, canal, RSSI, distancia estimada y timestamp.
- **Escaneo de BLE**: Identificación de dispositivos Bluetooth Low Energy, incluyendo nombre, dirección MAC, fabricante, RSSI, distancia y timestamp.
- **Integración con AWS**: Almacenamiento y procesamiento de datos en la nube utilizando servicios como S3, DynamoDB o Lambda para escalabilidad y acceso remoto.
- **Interfaz Web**: Dashboard web para visualizar los datos en tiempo real, alojado potencialmente en AWS (ej. EC2 o S3 static website).
- **Actualización en Tiempo Real**: Los datos se actualizan automáticamente en la interfaz para un monitoreo continuo.
- **Compatibilidad con ESP32**: Optimizado para microcontroladores ESP32 con capacidades WiFi y BLE.

## Requisitos

- **Hardware**:
  - ESP32 o módulo compatible.
  - Conexión a internet para enviar datos a AWS.

- **Software**:
  - Arduino IDE o PlatformIO para programar el ESP32.
  - Cuenta de AWS con servicios configurados (ej. API Gateway, Lambda, S3).
  - PHP (si se usa un backend local antes de AWS) o Node.js para el procesamiento en la nube.
  - Bibliotecas: WiFi.h, BLEScan.h para ESP32.

- **Servicios AWS** (ejemplos):
  - **S3**: Para almacenamiento de archivos JSON o logs.
  - **DynamoDB**: Base de datos NoSQL para almacenar datos de escaneo.
  - **Lambda**: Funciones serverless para procesar y filtrar datos.
  - **API Gateway**: Para exponer endpoints seguros.

## Instalación

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/tu-usuario/Escaner-Equipos-Electronicos-ESP32-AWS.git
   cd Escaner-Equipos-Electronicos-ESP32-AWS
   ```

2. **Configura AWS**:
   - Crea una cuenta en AWS y configura los servicios necesarios (S3 bucket, DynamoDB table, Lambda function, etc.).
   - Obtén las claves de API y configura IAM roles para acceso seguro desde el ESP32.

3. **Programa el ESP32**:
   - En el directorio `Arduino/`, agrega el código para ESP32.
   - Implementa el escaneo de WiFi y BLE.
   - Envía los datos a un endpoint de AWS (ej. API Gateway) usando HTTP POST con JSON.
   - Ejemplo de flujo:
     - Escanea redes WiFi con `WiFi.scanNetworks()`.
     - Escanea dispositivos BLE con `BLEScan`.
     - Serializa los datos en JSON y envíalos a AWS.

4. **Configura el Backend**:
   - Si usas un servidor intermedio (como en los archivos PHP), colócalo en EC2 o Lambda.
   - Los archivos `save_wifi.php` y `Save_ble.php` pueden adaptarse para enviar datos a AWS en lugar de guardar localmente.

5. **Despliega la Interfaz Web**:
   - Usa S3 static website hosting o CloudFront para servir la página `index.php` (convertida a HTML/JS si es necesario).
   - Asegúrate de que la interfaz lea datos desde AWS (ej. vía API calls).

## Uso

1. **Inicia el ESP32**: Carga el código y conecta el dispositivo. Comenzará a escanear y enviar datos a AWS automáticamente.

2. **Monitorea los Datos**: Accede al dashboard web alojado en AWS para ver las redes WiFi y dispositivos BLE detectados en tiempo real.

3. **Análisis**: Utiliza herramientas de AWS como CloudWatch o Athena para analizar los datos históricos.

## Estructura del Proyecto

```
Escaner-Equipos-Electronicos-ESP32-AWS/
├── Arduino/              # Código fuente para ESP32 (agregar aquí)
├── index.php             # Interfaz web para visualizar datos (adaptar para AWS)
├── save_wifi.php         # Script para guardar datos WiFi (local, adaptar para AWS)
├── Save_ble.php          # Script para guardar datos BLE (local, adaptar para AWS)
├── wifi_data.json        # Ejemplo de datos WiFi (generado dinámicamente)
├── ble_data.json         # Ejemplo de datos BLE (generado dinámicamente)
└── README.md             # Este archivo
```

## Contribución

¡Las contribuciones son bienvenidas! Para contribuir:
1. Haz un fork del proyecto.
2. Crea una rama para tu mejora (`git checkout -b mejora/nueva-feature`).
3. Realiza tus cambios y commit (`git commit -m 'Descripción de la mejora'`).
4. Push a tu rama (`git push origin mejora/nueva-feature`).
5. Abre un Pull Request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## Notas Adicionales

- **Seguridad**: Asegúrate de usar HTTPS y autenticación en AWS para proteger los datos.
- **Costos**: Monitorea los costos de AWS, especialmente en Lambda y DynamoDB para escaneos frecuentes.
- **Escalabilidad**: El diseño permite escalar horizontalmente en AWS para manejar grandes volúmenes de datos.
- **Personalización**: Adapta el código según tus necesidades específicas de escaneo y análisis.</content>
</xai:function_call"> 

<xai:function_call name="attempt_completion">
<parameter name="result">He actualizado el README.md con la nueva descripción del proyecto como "Escáner de Equipos Electrónicos con ESP32 y Resultados en AWS". El archivo ahora incluye detalles sobre la integración con AWS, requisitos actualizados y instrucciones de instalación adaptadas para la nube.
