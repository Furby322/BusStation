<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeTransportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type =
            [
                [
                    'type' => 'Пассажирский',
                    'characteristic' => 'Вместимость'
                ],
                [
                    'type' => 'Грузовой',
                    'characteristic' => 'Грузоподъемность'
                ],
                [
                    'type' => 'Стороний',
                    'characteristic' => 'Транспорт обслуживания'
                ]
            ];

        $plots =
            [
                [
                    'name' => 'Севереный',
                    'name_manager' => 'Зубенко Михаил Петрович',
                ],
                [
                    'name' => 'Южный',
                    'name_manager' => 'Ниизар Салам Алейкум',
                ],
            ];

        $masters =
            [
                [
                    'name' => 'Демкин Михаил Викторович',
                    'id_plot' => '1'
                ],
                [
                    'name' => 'Халилов Эльмир Яшар',
                    'id_plot' => '1'
                ],

                [
                    'name' => 'Юрченко Даниил Владимирович',
                    'id_plot' => '2'
                ],
                [
                    'name' => 'Черников Александр Викторович',
                    'id_plot' => '2'
                ],
            ];

        $foremans =
            [
                [
                    'name' => 'Васюк Антон Павлович',
                    'id_master' => '1'
                ],
                [
                    'name' => 'Ковушкин Андрей Васильевич',
                    'id_master' => '1'
                ],

                [
                    'name' => 'Ковалев Дмитрий Михайлович',
                    'id_master' => '2'
                ],
                [
                    'name' => 'Бесхлебный Михаил Алексеевич',
                    'id_master' => '2'
                ],

                [
                    'name' => 'Яцков Даниил Валерьевич',
                    'id_master' => '3'
                ],
                [
                    'name' => 'Веревкин Сергей Артемович',
                    'id_master' => '3'
                ],

                [
                    'name' => 'Борисенко Никита Витальевич',
                    'id_master' => '4'
                ],
                [
                    'name' => 'Ефремов Никита Антонович',
                    'id_master' => '4'
                ],
            ];

        $workers =
            [
                [
                    'name' => 'Арутюнян Ашот Неязович',
                    'id_foreman' => '1'
                ],
                [
                    'name' => 'Урекин Дмитрий Сергеевич',
                    'id_foreman' => '1'
                ],

                [
                    'name' => 'Одинец Никита ергеевич',
                    'id_foreman' => '2'
                ],
                [
                    'name' => 'Яковенко Станислав Арменович',
                    'id_foreman' => '2'
                ],

                [
                    'name' => 'Мартынов Роман Евгеньевич',
                    'id_foreman' => '3'
                ],
                [
                    'name' => 'Якшин Дмитрий Максимович',
                    'id_foreman' => '3'
                ],

                [
                    'name' => 'Овсиенко Артем Олегович',
                    'id_foreman' => '4'
                ],
                [
                    'name' => 'Оленев Кирилл Данилович',
                    'id_foreman' => '4'
                ],

                [
                    'name' => 'Черкасов Дмитрий Владимирович',
                    'id_foreman' => '5'
                ],
                [
                    'name' => 'Абаев Сергей Старостович',
                    'id_foreman' => '5'
                ],

                [
                    'name' => 'Тепляков Дмитрий Алексеевич',
                    'id_foreman' => '6'
                ],
                [
                    'name' => 'Юник Антон Антонович',
                    'id_foreman' => '6'
                ],

                [
                    'name' => 'Горохов Алексей Петрович',
                    'id_foreman' => '7'
                ],
                [
                    'name' => 'Петров Игорь Владимирович',
                    'id_foreman' => '7'
                ],

                [
                    'name' => 'Козырев Николай Сергеевич',
                    'id_foreman' => '8'
                ],
                [
                    'name' => 'Скляров Виктор Витальевич',
                    'id_foreman' => '8'
                ],
            ];

        $service =
            [
                [
                    'name' => 'Цех №2',
                    'id_plot' => '1'
                ],

                [
                    'name' => 'Цех №1',
                    'id_plot' => '2'
                ],
                [
                    'name' => 'Цех №10',
                    'id_plot' => '2'
                ],
            ];

        $garages =
            [
                [
                    'name' => 'Гараж: "Северный"',
                    'id_plot' => '1'
                ],

                [
                    'name' => 'Гараж: "Южный"',
                    'id_plot' => '2'
                ],
            ];

        $brands =
            [
                [
                    'name' => 'Nissan'
                ],
                [
                    'name' => 'Toyota'
                ],
                [
                    'name' => 'ГАЗ'
                ],
                [
                    'name' => 'ПАЗ'
                ],
            ];

        $models =
            [
                [
                    'name' => 'Atlas',
                    'id_brand' => '1'
                ],
                [
                    'name' => 'Cabstar',
                    'id_brand' => '1'
                ],
                [
                    'name' => 'Hino',
                    'id_brand' => '2'
                ],
                [
                    'name' => 'Dyna',
                    'id_brand' => '2'
                ],
                [
                    'name' => '3221',
                    'id_brand' => '3'
                ],
                [
                    'name' => '3110',
                    'id_brand' => '3'
                ],
                [
                    'name' => 'NEXT',
                    'id_brand' => '3'
                ],
                [
                    'name' => '3205',
                    'id_brand' => '4'
                ],
                [
                    'name' => '3237',
                    'id_brand' => '4'
                ],
            ];

        $carpark =
            [
                [
                    'id_model' => '1',
                    'id_type' => '2',
                    'id_garage' => '1',
                    'id_service' => '1',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '2',
                    'id_type' => '2',
                    'id_garage' => '1',
                    'id_service' => '1',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '3',
                    'id_type' => '2',
                    'id_garage' => '1',
                    'id_service' => '1',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '4',
                    'id_type' => '2',
                    'id_garage' => '1',
                    'id_service' => '1',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '5',
                    'id_type' => '1',
                    'id_garage' => '2',
                    'id_service' => '2',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '6',
                    'id_type' => '3',
                    'id_garage' => '2',
                    'id_service' => '2',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '7',
                    'id_type' => '1',
                    'id_garage' => '2',
                    'id_service' => '2',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '8',
                    'id_type' => '1',
                    'id_garage' => '2',
                    'id_service' => '3',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ],
                [
                    'id_model' => '9',
                    'id_type' => '1',
                    'id_garage' => '2',
                    'id_service' => '3',
                    'date' => $faker->dateTimeBetween('-3 months','-2 months')
                ]
            ];

        $drivers =
            [
                [
                    'name' => 'Колесников Леонард Авксентьевич',
                    'id_car' => '1'
                ],
                [
                    'name' => 'Киселёв Емельян Владленович',
                    'id_car' => '2'
                ],
                [
                    'name' => 'Максимов Владислав Мэлсович',
                    'id_car' => '3'
                ],
                [
                    'name' => 'Абрамов Гордий Ярославович',
                    'id_car' => '4'
                ],
                [
                    'name' => 'Доронин Ким Константинович',
                    'id_car' => '5'
                ],
                [
                    'name' => 'Осипов Климент Германович',
                    'id_car' => '5'
                ],
                [
                    'name' => 'Мышкин Мирон Дамирович',
                    'id_car' => '6'
                ],
                [
                    'name' => 'Зимин Лев Матвеевич',
                    'id_car' => '7'
                ],
                [
                    'name' => 'Котов Азарий Иринеевич',
                    'id_car' => '7'
                ],
                [
                    'name' => 'Игнатов Давид Святославович',
                    'id_car' => '8'
                ],
                [
                    'name' => 'Романов Панкратий Артемович',
                    'id_car' => '8'
                ],
                [
                    'name' => 'Крюков Мирослав Львович',
                    'id_car' => '9'
                ],
                [
                    'name' => 'Сазонов Оскар Антонинович',
                    'id_car' => '9'
                ],

            ];

        $routes =
            [
                [
                    'id_car' => '5',
                    'number_rout' => '2'
                ],
                [
                    'id_car' => '7',
                    'number_rout' => '6'
                ],
                [
                    'id_car' => '8',
                    'number_rout' => '47'
                ],
                [
                    'id_car' => '9',
                    'number_rout' => '77'
                ],
            ];

        $transportations =
            [
                [
                    'id_car' => '1',
                    'type' => 'Крупногабаритная техника',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days')
                ],
                [
                    'id_car' => '3',
                    'type' => 'Крупногабаритная техника',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days')
                ],
                [
                    'id_car' => '2',
                    'type' => 'Малогабаритная техника',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days')
                ],
                [
                    'id_car' => '4',
                    'type' => 'Малогабаритная техника',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days')
                ]
            ];

        $repairs =
            [
                [
                    'id_car' => '1',
                    'id_worker' => '2',
                    'price' => '5000',
                    'detail' => 'Замена привода',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '2',
                    'id_worker' => '3',
                    'price' => '8000',
                    'detail' => 'Новая прокладка ГБЦ',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '4',
                    'id_worker' => '12',
                    'price' => '2000',
                    'detail' => 'Замена колодок',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '8',
                    'id_worker' => '6',
                    'price' => '3000',
                    'detail' => 'Плановое ТО',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '5',
                    'id_worker' => '14',
                    'price' => '700',
                    'detail' => 'Замена форсунки',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '6',
                    'id_worker' => '14',
                    'price' => '4000',
                    'detail' => 'Замена масла',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '5',
                    'id_worker' => '3',
                    'price' => '24000',
                    'detail' => 'Проточка блока двигателя',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '2',
                    'id_worker' => '16',
                    'price' => '8000',
                    'detail' => 'Смена резины',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
                [
                    'id_car' => '7',
                    'id_worker' => '16',
                    'price' => '12000',
                    'detail' => 'Смена резины',
                    'date' => $faker->dateTimeBetween('-2 months','-1 days'),
                ],
            ];

        $wrifeoffs =
            [
                [
                    'id_model' => '8',
                    'date' => $faker->dateTimeBetween('-6 months','-2 months')
                ],
                [
                    'id_model' => '8',
                    'date' => $faker->dateTimeBetween('-6 months','-2 months')
                ],
                [
                    'id_model' => '2',
                    'date' => $faker->dateTimeBetween('-6 months','-2 months')
                ],
                [
                    'id_model' => '4',
                    'date' => $faker->dateTimeBetween('-6 months','-2 months')
                ]
            ];



        DB::table('type_transports')->insert($type);
        DB::table('plots')->insert($plots);
        DB::table('masters')->insert($masters);
        DB::table('foremans')->insert($foremans);
        DB::table('workers')->insert($workers);
        DB::table('service_workshops')->insert($service);
        DB::table('garages')->insert($garages);
        DB::table('brands')->insert($brands);
        DB::table('models')->insert($models);
        DB::table('car_park')->insert($carpark);
        DB::table('drivers')->insert($drivers);
        DB::table('routes')->insert($routes);
        DB::table('transportations')->insert($transportations);
        DB::table('repairs')->insert($repairs);
        DB::table('write_offs')->insert($wrifeoffs);
    }
}
