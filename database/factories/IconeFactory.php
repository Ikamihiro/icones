<?php

namespace Database\Factories;

use App\Models\Icone;
use Illuminate\Database\Eloquent\Factories\Factory;

class IconeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Icone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'nacionalidade' => $this->faker->country,
            'data_nascimento' => $this->faker->date,
            'local_nascimento' => $this->faker->city,
            'data_falecimento' => $this->faker->date,
            'local_falecimento' => $this->faker->city,
            'contribuicao' => $this->faker->text(400),
            'foto_path' => $this->faker->uuid.".jpg",
        ];
    }
}
