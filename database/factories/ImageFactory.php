<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => substr(FakerPicsumImagesProvider::image('public/storage/products', 640, 480), 15)
        ];
    }
}
