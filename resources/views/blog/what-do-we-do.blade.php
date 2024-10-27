<x-layouts.app>
    <section class="bg-cover bg-center h-96"
        style="background-image: url('{{Vite::asset('resources/img/img_banner_4.jpg') }}');">
        <div class="flex justify-center items-center h-full bg-black bg-opacity-40">
            <h1 class="text-white text-4xl font-bold">¿Qué hacemos?</h1>
        </div>
    </section>

    <section class="bg-secondary py-12">
        <article class="container max-w-7xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-yellow-800">La Importancia de las Abejas</h2>
                <p class="text-xl text-gray-700 mt-4">
                    Las abejas son esenciales para el equilibrio de los ecosistemas, asegurando la polinización de cultivos
                    y plantas que forman parte fundamental de nuestra vida diaria.
                </p>
            </div>

            <!-- Bloque 1 -->
            <div class="flex flex-col md:flex-row items-center mb-12">
                <div class="md:w-1/2 p-4">
                    <img src="{{ Vite::asset('resources/img/img_pollination.jpg') }}" alt="Polinización"
                        class="rounded-lg shadow-lg w-full">
                </div>
                <div class="md:w-1/2 p-4">
                    <h3 class="text-3xl font-semibold text-yellow-800">Polinización: El Motor de la Vida</h3>
                    <p class="mt-4 text-gray-700">
                        Las abejas juegan un rol vital en la polinización, un proceso que permite la reproducción de las
                        plantas. Aproximadamente el 75% de los cultivos que alimentan a la humanidad dependen de la
                        polinización por insectos, y las abejas son las principales polinizadoras. Sin ellas, la producción
                        de frutas, verduras y muchos otros alimentos disminuiría drásticamente.
                    </p>
                </div>
            </div>

            <!-- Bloque 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center mb-12">
                <div class="md:w-1/2 p-4">
                    <img src="{{ Vite::asset('resources/img/img_biodiversity.jpg') }}" alt="Biodiversidad"
                        class="rounded-lg shadow-lg w-full" loading="lazy">
                </div>
                <div class="md:w-1/2 p-4">
                    <h3 class="text-3xl font-semibold text-yellow-800">Biodiversidad: Protegiendo Nuestro Futuro</h3>
                    <p class="mt-4 text-gray-700">
                        Las abejas aseguran la reproducción de diversas especies vegetales, lo que mantiene la biodiversidad
                        en la naturaleza. Esto no solo beneficia al medio ambiente, sino que también garantiza la salud de
                        los ecosistemas agrícolas, permitiendo un equilibrio entre las plantas, los animales y el ser
                        humano.
                    </p>
                </div>
            </div>

            <!-- Bloque 3 -->
            <div class="flex flex-col md:flex-row items-center mb-12">
                <div class="md:w-1/2 p-4">
                    <img src="{{ Vite::asset('resources/img/img_ecosystems.jpg') }}" alt="Ecosistemas"
                        class="rounded-lg shadow-lg w-full" loading="lazy">
                </div>
                <div class="md:w-1/2 p-4">
                    <h3 class="text-3xl font-semibold text-yellow-800">Ecosistemas: El Pilar de la Naturaleza</h3>
                    <p class="mt-4 text-gray-700">
                        Sin las abejas, muchos ecosistemas colapsarían. La pérdida de estos polinizadores afectaría no solo
                        a las plantas que dependen de ellas, sino también a los animales que dependen de esas plantas para
                        alimentarse. En última instancia, toda la cadena alimentaria se vería afectada, provocando graves
                        consecuencias para la humanidad.
                    </p>
                </div>
            </div>
        </article>
    </section>

    <section class="bg-primary py-12">
        <article class="container max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-yellow-800">Concientizando sobre la Importancia de las Abejas</h2>
                <p class="text-xl text-gray-700 mt-4">
                    A través de preguntas clave y provocativas, estamos logrando que más personas reflexionen sobre el
                    impacto que tienen las abejas en nuestra vida diaria. Nuestro objetivo es generar cambios, ayudando a
                    que más personas comprendan la urgencia de protegerlas y cómo su bienestar afecta directamente nuestra
                    existencia.
                </p>
            </div>

            <!-- Bloque 1 -->
            <div class="flex flex-col md:flex-row items-center mb-12">
                <div class="md:w-1/2 p-4">
                    <img src="{{Vite::asset('resources/img/img_food.jpg')}}" alt="Desierto" class="rounded-lg shadow-lg w-full" loading="lazy">
                </div>
                <div class="md:w-1/2 p-4">
                    <h3 class="text-3xl font-semibold text-yellow-800">¿Sabías que las abejas polinizan más del 75% de
                        nuestros alimentos?</h3>
                    <p class="mt-4 text-gray-700">
                        Estamos concienciando a las personas sobre el impacto fundamental de las abejas en la producción de
                        nuestros alimentos. Esta simple pregunta ya ha logrado despertar el interés de cientos de personas,
                        que ahora entienden mejor el papel esencial de las abejas en la polinización y cómo su desaparición
                        podría afectar severamente nuestra seguridad alimentaria.
                    </p>
                </div>
            </div>

            <!-- Bloque 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center mb-12">
                <div class="md:w-1/2 p-4">
                    <img src="{{Vite::asset('resources/img/img_desert.jpg')}}" alt="Biodiversidad" class="rounded-lg shadow-lg w-full" loading="lazy">
                </div>
                <div class="md:w-1/2 p-4">
                    <h3 class="text-3xl font-semibold text-yellow-800">¿Qué pasaría si desaparecen las abejas?</h3>
                    <p class="mt-4 text-gray-700">
                        Hacemos preguntas como esta para que la gente piense en las consecuencias que tendría perder a las
                        abejas. Estas preguntas son una forma poderosa de generar cambios, porque invitan a la reflexión y
                        al cuestionamiento de la realidad. Muchas personas con las que nos hemos comunicado ahora están más
                        comprometidas a actuar y proteger a estos polinizadores cruciales.
                    </p>
                </div>
            </div>

            <!-- Bloque 3 -->
            <div class="flex flex-col md:flex-row items-center mb-12">
                <div class="md:w-1/2 p-4">
                    <img src="{{Vite::asset('resources/img/img_death.jpg')}}" alt="Ecosistemas" class="rounded-lg shadow-lg w-full" loading="lazy">
                </div>
                <div class="md:w-1/2 p-4">
                    <h3 class="text-3xl font-semibold text-yellow-800">¿Sabías que sin abejas los ecosistemas colapsarían?
                    </h3>
                    <p class="mt-4 text-gray-700">
                        Con preguntas como esta, estamos logrando que las personas comprendan la importancia de las abejas
                        más allá de la agricultura. Los ecosistemas dependen de ellas, y nuestra labor de concienciación
                        está empezando a generar cambios reales en la forma en que la gente percibe a estos pequeños pero
                        poderosos insectos. Cada vez más personas se están sumando a esta causa.
                    </p>
                </div>
                
            </div>

            <!-- Bloque 4 -->
            <div class="flex flex-col md:flex-row-reverse items-center mb-12">
                <div class="md:w-1/2 p-4">
                  <img src="{{Vite::asset('resources/img/img_communication.jpg')}}" alt="Comunicación y Acción" class="rounded-lg shadow-lg w-full" loading="lazy">
                </div>
                <div class="md:w-1/2 p-4">
                  <h3 class="text-3xl font-semibold text-yellow-800">Estamos llevando el mensaje más allá</h3>
                  <p class="mt-4 text-gray-700">
                    No solo formulamos preguntas, también estamos en contacto con comunidades y organizaciones, difundiendo esta información a través de múltiples canales. Nuestra meta es que más personas se unan a esta causa para proteger a las abejas y asegurar un futuro donde tanto ellas como nosotros podamos prosperar.
                  </p>
                </div>
              </div>
        </article>
    </section>
      



</x-layouts.app>