@extends('layouts.base')
@section('title','Info')
    
@section('content')
{{-- Menu de navegacion --}}
@include('layouts._partials.nav')

<section class="container">

    <div class="card mt-5 mb-5 col-12 mx-auto d-block ">
        <div class="card-header p-3 info-title">
            <h4 class="title">INFORMACION</h4>
        </div>
        <div class="card-body bg-secondary ">

            <div class="card mt-3  col-8 mx-auto d-block ">
                <div class="card-header info-title p-3">
                    <h4 class="text-center">Informacion sobre la web</h4>
                </div>
                <div class="card-body ">
                    <p>
                        Esta aplicación web fue creada con el apoyo del framework PHP Laravel. 
                        En el ámbito del diseño y la interfaz de usuario, se adoptó Bootstrap
                        y se empleó SASS para una gestión de estilos más sofisticada,
                        asegurando una adaptabilidad fluida en diferentes dispositivos.
                        Además, se recurrió a JS para añadir interactividad a los comentarios.
                        Una de las características destacadas de la aplicación es la implementación de Livewire;
                        aunque su uso fue limitado, permitió el desarrollo de un componente "like" dinámico y reactivo,
                        eliminando la necesidad de recargas constantes en la página. 
                        El diseño monolítico del proyecto simplifica su mantenimiento y despliegue.
                        Dándole suma importancia a la seguridad, se integró Hash para el cifrado de contraseñas, 
                        garantizando la protección de la información de los usuarios. Adicionalmente, 
                        el middleware de autenticación de Laravel desempeña un papel esencial, resguardando rutas y 
                        asegurando que solo usuarios autorizados tengan acceso a áreas específicas. 
                        El propósito fundamental de esta plataforma es que los usuarios puedan compartir publicaciones sobre mascotas 
                        perdidas o encontradas, promoviendo su eventual reencuentro. Los usuarios tienen la capacidad de comentar 
                        en estas publicaciones, ofreciendo información o simplemente manifestando su apoyo. Cada usuario, por su parte, 
                        dispone de un perfil individual diseñado para ofrecer una descripción breve de sí mismo y proporcionar datos de contacto,
                        ideales para quienes deseen compartir información sobre una mascota en particular.
                    </p>
                </div>
            </div>

            <div class="card mt-4 mb-4  col-8 mx-auto d-block">
                <div class="card-header info-title p-3">
                    <h4 class="text-center">Quien soy?</h4>
                </div>
                <div class="card-body ">
                    <p> Mi nombre es Kevin Aranda y soy un apasionado programador. 
                        Mi principal objetivo con este proyecto ha sido adquirir experiencia y poner en práctica mis habilidades y conocimientos adquiridos. 
                        No solo buscaba enfrentar y superar retos, sino también tener una pieza de trabajo tangible que pueda presentar con orgullo en mi portafolio. 
                        Mi conocimientos abarcan diversas tecnologías y lenguajes, incluyendo HTML, CSS, SASS, Bootstrap, JS, React, PHP, Laravel y bases de datos MySQL. 
                        Estoy ansioso por seguir aprendiendo, mejorando y compartiendo mis proyectos con el mundo.
                    </p>
                </div>
            </div>


        </div>
        <div class="card-footer p-4 ">
            <div class="container-btn-contact">
                <ul>
                    <li><a href="https://www.linkedin.com/in/kevin-aranda-249429201/"><i class="bi bi-linkedin"></i>LinkedIn</a></li>
                    <li><a href="https://sage-medovik-01c946.netlify.app/index.html"><i class="bi bi-briefcase-fill"></i>Portafolio</a></li>
                    <li><a href="https://github.com/kevin-042000"><i class="bi bi-github"></i>GitHub</a></li>
                </ul>
            </div>
        </div>
    </div>


</section>

@endsection