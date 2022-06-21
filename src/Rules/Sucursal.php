<?php

namespace Juarismi\Base\Rules;

use Illuminate\Contracts\Validation\Rule;

class Sucursal implements Rule
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
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $sucursal = \Juarismi\Base\Models\Negocio\Sucursal::find($value);
        return $sucursal != NULL;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sucursal no encontrada';
    }
}
