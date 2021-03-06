<?php
/*
 * NeutrinoAPI
 *
 * This file was automatically generated for NeutrinoAPI by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace NeutrinoAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ConvertResponse implements JsonSerializable
{
    /**
     * Was the coversion successful and produced a valid result
     * @required
     * @var bool $valid public property
     */
    public $valid;

    /**
     * The result of the conversion
     * @required
     * @var string $result public property
     */
    public $result;

    /**
     * The value being converted from
     * @required
     * @var string $fromValue public property
     */
    public $fromValue;

    /**
     * The type being converted to
     * @required
     * @var string $toType public property
     */
    public $toType;

    /**
     * The type of the value being converted from
     * @required
     * @var string $fromType public property
     */
    public $fromType;

    /**
     * Constructor to set initial or default values of member properties
     * @param bool   $valid     Initialization value for $this->valid
     * @param string $result    Initialization value for $this->result
     * @param string $fromValue Initialization value for $this->fromValue
     * @param string $toType    Initialization value for $this->toType
     * @param string $fromType  Initialization value for $this->fromType
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->valid     = func_get_arg(0);
            $this->result    = func_get_arg(1);
            $this->fromValue = func_get_arg(2);
            $this->toType    = func_get_arg(3);
            $this->fromType  = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['valid']     = $this->valid;
        $json['result']    = $this->result;
        $json['fromValue'] = $this->fromValue;
        $json['toType']    = $this->toType;
        $json['fromType']  = $this->fromType;

        return $json;
    }
}
