<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ninja
 * Date: 2016-11-29
 * Time: 15:59
 */

namespace App\Bgmenu\Services\Order;


class CreateValidator extends \App\Bgmenu\Services\AbstractValidator {
    public function getAfter($data) {
        return function (\Illuminate\Validation\Validator $validator) use ($data) {
            $product = \App\Product::find($data['product_id']);
            if ($data['quantity'] > $product->amount) {
                $validator->errors()->add('quantity', 'This quantity is not available in stock');
                throw new \App\Bgmenu\Exceptions\ValidationException($this->getErrorMessage(), $this->getErrorCode(), null, $validator->errors()->messages());
            }
        };
    }

    public function getErrorMessage()
    {
        return 'Invalid input';
    }
}