<?php

namespace Juarismi\Base\Rules;

use Illuminate\Contracts\Validation\Rule;

class ComprobanteTipo implements Rule
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
        $comprobanteTipo = \Juarismi\Base\Models\Common\ComprobanteTipo::find(
            $value
        );
        return $comprobanteTipo != NULL;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tipo de Comprobante, no encontrado';
    }
}
