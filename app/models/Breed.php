<?php

class Breed extends Eloquent {
    public $timestamps = false; // Laravel expects a created_at and updated_at timestamp - false disables this
    public function dogs() {
        return $this->hasMany('Dog');
    }
}

?>