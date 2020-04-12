<?php

namespace App\Models;

use Illuminate\Validation\ValidationException;
use Validator;

class Model extends \Illuminate\Database\Eloquent\Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $rules = [];
    protected $messages = [];

    public static function validateOrFail($resource)
    {
        if($resource->rules) {

            $validator = Validator::make($resource->toArray(), $resource->rules, $resource->messages);

            if ($validator->fails()) {

                throw ValidationException::withMessages($validator->errors()->toArray());
            }

        }

        return $resource;
    }

    public static function createOrFail($data)
    {
        $resource = new static($data);

        self::validateOrFail($resource);

        $resource->save();

        return $resource->refresh();
    }

    public static function updateOrFail($id, $data)
    {
        $resource = static::findOrFail($id);

        $resource->fill((array) $data);

        self::validateOrFail($resource);

        $resource->save();

        return $resource->refresh();
    }

    public static function deleteOrFail($id, $softDelete = false)
    {
        $resource = static::findOrFail($id);

        if(!$softDelete) {
            $resource->delete();
        } else {
            $resouce->status = self::STATUS_INACTIVE;
            $resource->save();
        }

        return [];
    }


}
