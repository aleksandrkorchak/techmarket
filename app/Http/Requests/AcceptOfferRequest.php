<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AcceptOfferRequest extends FormRequest
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
    public function rules(Request $request)
    {
//        dd(Rule::exists('offers')->where('search_id', $request->search_id));
//        $search_id = $request->search_id;
//        dd(Rule::exists('offers')->where(function ($query) use ($search_id) {
//            $query->where('search_id', $search_id);
//        }));
//        dd($search_id);

        return [
//            'search_id' => 'required',
//            'search_id' => 'required|integer|exists:searches,id',
//            'offer_id' => [
//                'required',
//                'integer',
//                Rule::exists('offers')->where('search_id', $search_id)


//            ]
        ];
    }
}
