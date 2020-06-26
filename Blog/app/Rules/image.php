<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class image implements Rule
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
        $validExtansion = ['jpeg',"png","svg",'jpg'];
        $exten = explode(".",$value);
        $exten = end($exten);

        if(!in_array($exten,$validExtansion)){
            return false;
        }

        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The extension is not valid.';
    }
}
