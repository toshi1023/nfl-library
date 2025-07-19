<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * ファクトリの対応するモデル名
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * モデルのデフォルト状態を定義する
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthday' => $this->faker->date('Ymd', '2000-01-01'),
            'height' => $this->faker->randomFloat(1, 160.0, 210.0),
            'weight' => $this->faker->randomFloat(1, 60.0, 150.0),
            'college' => $this->faker->optional()->company . ' University',
            'drafted_team' => $this->faker->optional()->city . ' ' . $this->faker->optional()->word,
            'drafted_round' => $this->faker->optional()->numberBetween(1, 7) . 'rd',
            'drafted_rank' => $this->faker->optional()->numberBetween(1, 256) . 'th',
            'drafted_year' => $this->faker->optional()->numberBetween(1990, date('Y')),
            'image_file' => $this->faker->optional()->uuid . '.jpg',
        ];
    }

    /**
     * プレイヤーが最小限の必要データのみを持つことを示す
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function minimal()
    {
        return $this->state(function (array $attributes) {
            return [
                'height' => null,
                'weight' => null,
                'college' => null,
                'drafted_team' => null,
                'drafted_round' => null,
                'drafted_rank' => null,
                'drafted_year' => null,
                'image_file' => null,
            ];
        });
    }

    /**
     * プレイヤーがクォーターバックであることを示す
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function quarterback()
    {
        return $this->state(function (array $attributes) {
            return [
                'height' => $this->faker->randomFloat(1, 180.0, 200.0),
                'weight' => $this->faker->randomFloat(1, 90.0, 110.0),
            ];
        });
    }

    /**
     * プレイヤーがランニングバックであることを示す
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function runningBack()
    {
        return $this->state(function (array $attributes) {
            return [
                'height' => $this->faker->randomFloat(1, 170.0, 185.0),
                'weight' => $this->faker->randomFloat(1, 80.0, 100.0),
            ];
        });
    }

    /**
     * プレイヤーがワイドレシーバーであることを示す
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function wideReceiver()
    {
        return $this->state(function (array $attributes) {
            return [
                'height' => $this->faker->randomFloat(1, 175.0, 195.0),
                'weight' => $this->faker->randomFloat(1, 75.0, 95.0),
            ];
        });
    }

    /**
     * プレイヤーがラインマンであることを示す
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function lineman()
    {
        return $this->state(function (array $attributes) {
            return [
                'height' => $this->faker->randomFloat(1, 190.0, 210.0),
                'weight' => $this->faker->randomFloat(1, 120.0, 150.0),
            ];
        });
    }

    /**
     * プレイヤーが最近ドラフトされたことを示す
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function recentDraft()
    {
        return $this->state(function (array $attributes) {
            return [
                'drafted_year' => $this->faker->numberBetween(2020, date('Y')),
                'drafted_round' => $this->faker->numberBetween(1, 3) . 'rd',
                'drafted_rank' => $this->faker->numberBetween(1, 100) . 'th',
            ];
        });
    }
}