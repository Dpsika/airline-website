<?php

class TravelpayoutsSettingsFramework_Extension_osc_accordion_extended extends Redux_Travelpayouts_Extension_Abstract {
    private $c;
    public function __construct( $parent, $path, $ext_class ) {
        $this->c = $parent->extensions['osc_accordion'];
        // Add all the params of the Abstract to this instance.
        foreach( get_object_vars( $this->c ) as $key => $value ) {
            $this->$key = $value;
        }
        parent::__construct( $parent, $path );
    }
    // fake "extends Redux_Travelpayouts_Extension_Abstract\" using magic function
    public function __call( $method, $args ) {
        return call_user_func_array( array( $this->c, $method ), $args );
    }
}
