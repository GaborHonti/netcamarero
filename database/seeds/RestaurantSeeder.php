<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'name' => 'Oneils English Pub',
            'photo' => 'restaurantimgs/oneils.jpg',
            'city' => 1,
            'category' => 1,
            'likes' => 0,
            'phonenumber' => 693746840,
            'description' => 'Pub Inglés en San Miguel de Salinas. Ambiente muy familiar y acogedor, con eventos frecuentes y conciertos en vivo.
            Se Ofrece un Servicio de Transporte a Domicilio en tiempos de cuarentena. Menú diario de 10€, comida Irlandés tradicional.',
            'latitud' => 37.976483,
            'longitud' => -0.793203,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Ümer Döner Kebab',
            'photo' => 'restaurantimgs/kebab.jpg',
            'city' => 1,
            'category' => 2,
            'likes' => 0,
            'phonenumber' => 647985231,
            'description' => 'Mejores Kebabs en la zona de San Miguel de Salinas. Precios muy baratos y comida de calidad alta que te lleva a una
            experiencia de oriente único. Disfruta de nuestro servicio de transporte a domicilio. Abiertos de Lunes a Sábado desde las 9:00 a 23:00',
            'latitud' => 37.980306,
            'longitud' => -0.789024,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'La Cantina Tex-Mex',
            'photo' => 'restaurantimgs/lacantina.jpg',
            'city' => 2,
            'category' => 3,
            'likes' => 0,
            'phonenumber' => 687456329,
            'description' => '¿Buscas un auténtico restaurante mexicano con tacos picantes y comida tradicional de ese país? Disfruta de nuestra amplia
            selección de platos picantes y muy característicos de México. Ofrecemos servicio de transporte a domicilio. No hesites en llamarnos,
            estamos abiertos de Lunes a Sábado, de 12:00 a 23:00',
            'latitud' => 38.027884,
            'longitud' => -0.741466,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'JJ Pub Español',
            'photo' => 'restaurantimgs/jj.jpg',
            'city' => 1,
            'category' => 4,
            'likes' => 0,
            'phonenumber' => 852147963,
            'description' => 'Pub Español tradicional en San Miguel de Salinas, frecuente punto de reunión para ver partidos de fútbol o pasar un buen
            rato con los familiares. Ofrecemos la terraza abierta incluso en tiempos de cuarentena, no dudes en visitarnos y tomar unas cañas con nosotros!
            Abierto todos los días de 15:00 a 01:00',
            'latitud' => 37.977323,
            'longitud' => -0.789799,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Casa Pili',
            'photo' => 'restaurantimgs/casaPili.jpg',
            'city' => 2,
            'category' => 4,
            'likes' => 0,
            'phonenumber' => 693258741,
            'description' => 'El Restaurante Casa Pili es un restaurante ideal para disfrutar de lo mejor de la cocina mediterránea, tradicional y de
            mercado, situado en el centro de Los Montesinos, en Alicante.',
            'latitud' => 38.027649,
            'longitud' => -0.746982,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Casa Antonio',
            'photo' => 'restaurantimgs/casaantonio.jpg',
            'city' => 1,
            'category' => 5,
            'likes' => 0,
            'phonenumber' => 693258741,
            'description' => 'Pizzas Tradicionales, abierto los fines de semana, no dudes en visitarnos!',
            'latitud' => 37.976522,
            'longitud' =>  -0.788874,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Friends',
            'photo' => 'restaurantimgs/friends.jpg',
            'city' => 2,
            'category' => 1,
            'likes' => 0,
            'phonenumber' => 789456123,
            'description' => 'Bar Inglés muy acogedor con platos caseros, abierto todos los días de 11:00 hasta las 23:45, con varios eventos y
            conciertos en vivo.',
            'latitud' => 38.027877,
            'longitud' => -0.745852,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Poco Loco',
            'photo' => 'restaurantimgs/pocoloco.jpg',
            'city' => 3,
            'category' => 3,
            'likes' => 0,
            'phonenumber' => 654789321,
            'description' => 'Restaurante Mexicano en Campoamor, con eventos en vivo, organización de cumpleaños y un ambiente muy tradicional y
            acogedor. Siente como si estarías en México con nosotros!',
            'latitud' => 37.913372,
            'longitud' => -0.739294,
        ]);
    }
}
