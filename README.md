4.1. Arquitectura general de UNIMAX
UNIMAX
│
├── Controller
│   ├── ClienteController
│   ├── SolicitudController
│   ├── UsuarioController
│   ├── Empleadocontroller
│   └── ...
│
├── Model
│   ├── Usuario
│   ├── Solicitud
│   ├── Servicio
│   ├── Empleado
│   └── Categoria
│
├── Repository
│   ├── UsuarioRepository
│   ├── SolicitudRepository
│   ├── ServicioRepository
│   ├── EmpleadoRepository
│   └── ...
│
├── Service
│   ├── EmailService
│   └── VerificacionService
│
└── resources
    ├── templates
    │   ├── cliente
    │   ├── empleado
    │   ├── admin
    │   └── ...
    │
    └── static
        ├── css
        ├── js
        └── images
4.2 Descripcion General
El sistema UNIMAX fue desarrollado utilizando el framework Spring Boot, siguiendo una arquitectura basada en capas. La aplicación integra una capa de presentación mediante plantillas Thymeleaf, una capa de control mediante controladores Spring MVC y REST, una capa de persistencia utilizando Spring Data JPA y una base de datos MariaDB.
La aplicación permite gestionar usuarios, servicios, solicitudes de servicios, empleados, categorías y procesos de comunicación mediante correo electrónico
