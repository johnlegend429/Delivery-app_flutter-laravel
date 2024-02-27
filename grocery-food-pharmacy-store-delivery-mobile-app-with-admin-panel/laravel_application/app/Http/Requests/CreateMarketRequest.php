<?php
/**
 * File name: CreateMarketRequest.php
 * Last modified: 2020.04.30 at 08:21:08
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Requests;

use App\Models\Market;
use Illuminate\Foundation\Http\FormRequest;

class CreateMarketRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (auth()->user()->hasRole('admin')) {
            return Market::$adminRules;
        } elseif (auth()->user()->hasAnyRole(['manager', 'client'])) {
            return Market::$managerRules;
        }
    }
}
