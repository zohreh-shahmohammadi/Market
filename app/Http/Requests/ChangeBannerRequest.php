<?php

namespace App\Http\Requests;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;

class ChangeBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
            return Banner::where([
                 'zip' => $this->zip,
                 'street' => $this->street,
                 'user_id' => auth()->user()->id,
         
             ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'photo' => 'required|mimes:jpg,png,bmp' 
        ];
    }
}
