<?php

// Create a new file: database/factories/providers/FoodProvider.php

namespace Database\Factories\Providers;

use Faker\Provider\Base;

class FoodProvider extends Base
{
  protected static $foods = [
    'quinoa', 'kale', 'avocado', 'almonds', 'salmon', 'blueberries', 'spinach', 'chia seeds', 'sweet potato', 'broccoli',
  ];

  protected static $drinks = [
    'green tea', 'kombucha', 'smoothie with kale and berries', 'water infused with cucumber and mint', 'matcha latte', 'golden milk', 'fresh vegetable juice', 'coconut water', 'herbal tea', 'almond milk',
  ];

  public function healthFood()
  {
    return $this->randomElement(static::$foods);
  }

  public function healthDrink()
  {
    return $this->randomElement(static::$drinks);
  }
}
