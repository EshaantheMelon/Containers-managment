<?php

namespace App\Http\Requests;

use App\Container;

class PositionRequest extends Request
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
        $rules = [];
        if ($this->request->get('containers') == null) {
            return ['containers' => 'required'];
        }

        foreach($this->request->get('containers') as $key => $val)
        {
            $position = Container::find($val)->lastPosition();
            if ($position !=null  && !$position['end']) {
                $rules['containers.'.$key] = 'different:'.$val;
            }
        }

        if (!empty($rules)) {
            return $rules;
        }
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'containers' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'user.name.first' => 'required',
                    'user.name.last' => 'required',
                    'user.password' => 'required|confirmed',
                ];
            }
            default:
                break;
        }
    }

    public function messages()
    {
        $messages = [];
        if ($this->request->get('containers') != null)
            foreach($this->request->get('containers') as $key => $val)
            {
                $messages['containers.'.$key.'.different'] = 'The container ' . Container::find($val)->prefix .' is in cycle already.';
            }
        return $messages;
    }
}
