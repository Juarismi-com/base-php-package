<?php

namespace Juarismi\Base\Rules;

use Illuminate\Contracts\Validation\Rule;

class Producto implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Si producto es distinto de nulo, significa que el mismo existe
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $producto = \Juarismi\Base\Models\Negocio\Producto::find($value);
        return $producto != NULL;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Producto no encontrado';
    }
}
