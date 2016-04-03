<?php



$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Result::class, function (Faker\Generator $faker) {

    $ip = ['192.168.1.1', '192.168.1.2', '192.168.1.3'];
    $machine_id = ['111', '222', '333', '444'];
    $results_1 = unserialize("s:95:\"[\n    \"Ping: 15.197 ms\",\n    \"Download: 26.96 Mbyte\\/s\",\n    \"Upload: 12.63 Mbyte\\/s\",\n    \"\"\n]\";");
    $results_2 = unserialize("s:95:\"[\n    \"Ping: 20.197 ms\",\n    \"Download: 30.96 Mbyte\\/s\",\n    \"Upload: 13.63 Mbyte\\/s\",\n    \"\"\n]\";");
    $results_3 = unserialize("s:95:\"[\n    \"Ping: 21.197 ms\",\n    \"Download: 29.96 Mbyte\\/s\",\n    \"Upload: 11.63 Mbyte\\/s\",\n    \"\"\n]\";");
    $results_4 = unserialize("s:95:\"[\n    \"Ping: 16.197 ms\",\n    \"Download: 28.96 Mbyte\\/s\",\n    \"Upload: 10.63 Mbyte\\/s\",\n    \"\"\n]\";");

    $results = [$results_1, $results_2, $results_3, $results_4];

    return [
        'results' => $results[rand(0,3)],
        'machine_id' => $machine_id[rand(0,3)],
        'results_originally_created_at' => $faker->dateTime($max = 'now'),
        'ip' => $ip[rand(0,2)],
        'api_version' => 'v1',
        'tries' => rand(1,4)
    ];
});