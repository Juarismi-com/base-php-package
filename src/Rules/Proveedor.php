<?php

namespace Juarismi\Base\Rules;

use Illuminate\Contracts\Validation\Rule;

class Proveedor implements Rule
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
        $proveedor = \Juarismi\Base\Models\Negocio\Proveedor::find($value);
        return $proveedor != NULL;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Proveedor no encontrado';
    }
}
