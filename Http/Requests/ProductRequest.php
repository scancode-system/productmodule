<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Product\Events\ProductRequestRulesEvent;


class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge([
            'sku' => 'required|string|max:255',
            'barcode' => 'required|string|max:255|unique:products,barcode'.(isset($this->id)?','.$this->id.',id':''),
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'min_qty' => 'integer|min:1',
            'discount_limit' => 'numeric|between:0,100|regex:/^\d+(\.\d{1,2})?$/',
            'multiple' => 'integer|min:1',
            'product_category_id' => 'integer|min:1',
        ], $this->getRulesFromEvent());
    }


    private function getRulesFromEvent(){
        $rules = [];
        $event_rules = event(new ProductRequestRulesEvent());
        foreach ($event_rules as $event_rule) {
            $rules = array_merge($rules, $event_rule);
        }
        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
