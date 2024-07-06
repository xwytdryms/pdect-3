<?php

namespace App\Http\Requests;
use App\Models\Device;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'device_name' => ['required', 'string', 'max:255'],
          'address' => ['required','string', 'max:255'],
          'longitude' => ['required', 'float'],
          'latitude' => ['required', 'float']
        ];
    }
}
